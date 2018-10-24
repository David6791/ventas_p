<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AttentionsController extends Controller
{
    public function view_attention_list(){
        $fecha=date("m-d-Y");
        $query = "select * from view_list_appoinments(:id_user, :date)";
        $rows=\DB::select(\DB::raw($query),array('id_user'=>Auth::user()->id,'date'=>$fecha));
        //return $rows;
        return view('admin.attentions.view_appoinments_list')->with('list',$rows);
    }
    public function start_appointment_dates(Request $request){
        //return $request->all();
        $quer = "SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id";
        $id=\DB::select(\DB::raw($quer),array('id'=>$request->id_appointments));
        //return $id;
        $pat = "SELECT * FROM pacientes pa
                        INNER JOIN pacientes_patologias pap
                            ON pa.id_paciente = pap.id_paciente
                        INNER JOIN patologias pat
                            ON pat.id_patologia = pap.id_patologia
                    WHERE pa.id_paciente = :id_patient";
        $patologias=\DB::select(\DB::raw($pat),array('id_patient'=>$id[0]->id_patient));
        $query = "SELECT pa.filiacion_completa, pa.id_paciente, pa.ci_paciente, pa.ap_paterno, pa.ap_materno, pa.nombres, pa.sexo, pa.direccion, pa.telefono, pa.celular, pa.fecha_nacimento, pa.pais_nacimiento, pa.ciudad_nacimiento, pa.provincia, pa.localidad_nacimiento, pa.fecha_creacion, pa.esta_paciente FROM medical_appointments  map
                        INNER JOIN pacientes pa
                            ON pa.id_paciente = map.id_patient
                    WHERE map.id_medical_appointments = :id_appoinments";
        $rows=\DB::select(\DB::raw($query),array('id_appoinments'=>$request->id_appointments));
        $querys = "SELECT map.id_medical_appointments, map.id_patient, map.id_turn_hour, ta.name_type, map.appointment_description, map.date_appointments, map.data_creation_appointments, sap.name_state_appointments, sch.name_schedules, ht.start_time from medical_appointments map
                            INNER JOIN state_appointments sap
                                ON sap.id_state_appointments = map.state_appointments
                            INNER JOIN medical_assignments mass
                                ON mass.id_medical_assignments = map.id_medical_assignments
                            INNER JOIN schedules sch
                                ON sch.id_schedule = mass.id_schedul
                            INNER JOIN hour_turns ht
                                ON ht.id_hour_turn = map.id_turn_hour
                            INNER JOIN types_appointsment ta
                                ON ta.id_type_appointments = map.type_appoinment
                        WHERE id_patient =(
                    SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appoinments
                    ) ORDER BY data_creation_appointments";
        $row=\DB::select(\DB::raw($querys),array('id_appoinments'=>$request->id_appointments));
        $query = "SELECT * FROM public.view_notes_medics(:id_ap)";
        $rows2=\DB::select(\DB::raw($query),array('id_ap'=>$request->id_appointments));
        $no = array();
        for($i = 0 ; $i < count($rows2); $i++){
            $asd = json_encode($rows2[$i]->j);
            $asdd = json_decode($asd);
            $no[]=json_decode($asdd,true);
        }
        
        $query3 = "SELECT * FROM medical_appointments map
                    INNER JOIN types_appointsment ta
                        on ta.id_type_appointments = map.type_appoinment
                    where id_medical_appointments = :id_appoinments AND state_appointments = 3";
        $rows3=\DB::select(\DB::raw($query3),array('id_appoinments'=>$request->id_appointments));

        $query4 = "SELECT * FROM stock_medicines sm
                        INNER JOIN medicines m
                            ON m.id_medicines = sm.id_medicine
                    WHERE sm.quantity_medicine > 1 AND sm.date_expiration > now() AND m.state_medicine = 'activo'";
        $rows4=\DB::select(\DB::raw($query4));
        $query5 = "SELECT * FROM view_examens_medics(:id)";
        $rows5=\DB::select(\DB::raw($query5),array('id'=>$request->id_appointments));
        //return $rows5;
        $data2 = array();
        for($i = 0 ; $i < count($rows5) ; $i++){
            $asd = json_encode($rows5[$i]->j);
            $asdd = json_decode($asd);

            

            //return $asdd;
            //return $asdd;
            /*$data2[] = [
                'j' => $asd
            ];*/
            //json_decode($data2[1],true)
            // aqui ya tienes que poner un json_decode para que se guarde directo en tu array
            $data2[]=json_decode($asdd,true);
        }
        //$asd = json_encode($rows5[1]->j);
        //$aps = json_encode($data2);
        /*$aux=json_encode($data2[1]);
        $aux=json_decode($data2[1]);
        */
        //return $data2;
        //return var_dump(json_decode($data2[1],true)["name_medical_exam"]);
        //return ['id_medical_exam'];
        $query9 = "SELECT * FROM pacientes pa
                        INNER JOIN patients_dates_medic ptm
                            ON pa.id_paciente = ptm.id_patient
                        INNER JOIN datos_medicos dm
                            ON dm.id_dato_medico = ptm.id_date_medic
                    WHERE pa.id_paciente = :id_patient";
        $rows9=\DB::select(\DB::raw($query9),array('id_patient'=>$id[0]->id_patient));
        //return $rows9;
        $query6 = "SELECT * FROM view_transfers_medics(:id)";
        $rows6=\DB::select(\DB::raw($query6),array('id'=>$request->id_appointments));

        $data3 = array();
        for($i = 0 ; $i < count($rows6) ; $i++){
            $asd = json_encode($rows6[$i]->j);
            $asdd = json_decode($asd);
            $data3[]=json_decode($asdd,true);
        }
        //return $data3;
        $query7 = "SELECT count(id_treatment) FROM treatment_patients WHERE id_medical_appointments = :id_appointments";
        $rows7=\DB::select(\DB::raw($query7),array('id_appointments'=>$request->id_appointments));

        $query8 = "SELECT * FROM treatment_patients tp
                    INNER JOIN treatment_details td
                        ON tp.id_treatment = td.id_treatment
                    INNER JOIN medicines m
                        ON m.id_medicines = td.id_medicine
                WHERE tp.id_medical_appointments = :id_appointments";
        $rows8=\DB::select(\DB::raw($query8),array('id_appointments'=>$request->id_appointments));
        $queryy = "SELECT * FROM notes_medic_dates_appoinments nmd WHERE id_medical_appoinments = :id_a";
        $rowss=\DB::select(\DB::raw($queryy),array('id_a'=>$request->id_appointments));
        //return $rows7[0]->count;
        if($rows7[0]->count === 0){
            //return $rows7;
            $array1 = ["detalle"=>'si'];
            //return $array1['detalle'];
            return view('admin.attentions.view_dates_patient')->with('datos_1',$rowss)->with('pat',$patologias)->with('datos_medicos',$rows9)->with('dates_patient',$rows)->with('list_app',$row)->with('dat_register',$no)->with('dates_cita_end',$rows3)->with('list_mecines_disponibles',$rows4)->with('ex_medics',$data2)->with('types_transfer',$data3)->with('control',$array1);
        }else{
            $array1 = ["detalle"=>'no'];
            return view('admin.attentions.view_dates_patient')->with('datos_1',$rowss)->with('pat',$patologias)->with('datos_medicos',$rows9)->with('dates_patient',$rows)->with('list_app',$row)->with('dat_register',$no)->with('dates_cita_end',$rows3)->with('list_mecines_disponibles',$rows4)->with('ex_medics',$data2)->with('types_transfer',$data3)->with('control',$array1)->with('view_treatment',$rows8);
        }
        return $rows7;
        //return view('attentions.view_dates_patient')->with('dates_patient',$rows)->with('list_app',$row)->with('dat',$rows2)->with('dates_cita_end',$rows3)->with('list_mecines_disponibles',$rows4)->with('ex_medics',$data2)->with('types_transfer',$data3);
    }
    public function load_dates_appoinment(Request $request){
        //return $request->all();
        $query = "SELECT ma.reconsulta_register, ma.id_medical_appointments, ma.date_appointments, sc.name_schedules, ht.start_time, us.name, us.apellidos, ta.name_type, ma.appointment_description FROM medical_appointments ma 
                        INNER JOIN medical_assignments mas
                            ON mas.id_medical_assignments = ma.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mas.id_user
                        INNER JOIN schedules sc
                            ON sc.id_schedule = mas.id_schedul
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = ma.id_turn_hour
                        INNER JOIN types_appointsment ta
                            ON ta.id_type_appointments = ma.type_appoinment
                    WHERE ma.id_medical_appointments = :id_appointments";
        $rows=\DB::select(\DB::raw($query),array('id_appointments'=>$request->id_appointments));
        //return $rows;
        $query1 = "SELECT * FROM details_dates_register dr 
                        INNER JOIN dates_of_register dof
                            ON dof.id_date_register = dr.id_dates_register
                    WHERE dr.id_appointmetns_ = :id_a";
        $rows1=\DB::select(\DB::raw($query1),array('id_a'=>$request->id_appointments));
        $query2 = "SELECT * FROM notes_medic_dates_appoinments nmd WHERE id_medical_appoinments = :id_a";
        $rows2=\DB::select(\DB::raw($query2),array('id_a'=>$request->id_appointments));
        $query3 = "SELECT * FROM treatment_patients tp
                        INNER JOIN treatment_details td
                            ON tp.id_treatment = td.id_treatment
                        INNER JOIN medicines m
                            ON m.id_medicines = td.id_medicine
                    WHERE tp.id_medical_appointments = :id_appointments";
        $rows3=\DB::select(\DB::raw($query3),array('id_appointments'=>$request->id_appointments));
        $query4 = "SELECT mep.id_medical_exam_patient, mep.id_appoinments, mep.reason_medical_examn, mep.observation_medical_exam, mep.date_creation, mass.id_user, us.name, us.apellidos,
                        p.nombres, p.ap_paterno, p.ap_materno, p.fecha_nacimento, p.ci_paciente, mee.name_medical_exam
                        FROM medical_exam_patients mep
                        INNER JOIN medical_appointments mapp 
                            ON mep.id_appoinments = mapp.id_medical_appointments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN pacientes p
                            ON p.id_paciente = mep.id_patient
                        INNER JOIN medical_exam mee
                            ON mee.id_medical_exam = mep.id_medical_exam
                    WHERE id_medical_appointments = :id_appoinments
                        ORDER BY id_medical_exam_patient ASC LIMIT 1";
        $rows4=\DB::select(\DB::raw($query4),array('id_appoinments'=>$request->id_appointments));
        $query5 = "SELECT * FROM transfer_patients tp
                        INNER JOIN pacientes p
                            ON p.id_paciente = tp.id_patient_trasfer
                        INNER JOIN types_transfer tt
                            ON tt.id_type_transfer = tp.id_type_trasnfer
                        INNER JOIN medical_appointments mapp
                            ON mapp.id_medical_appointments = tp.id_appoinments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                    WHERE id_appoinments = :id_appo";
        $rows5=\DB::select(\DB::raw($query5),array('id_appo'=>$request->id_appointments));
        return view('admin.attentions.load_view_dates_appointments')->with('dates_cita',$rows)->with('notes_medic',$rows1)->with('datos_1',$rows2)->with('treat',$rows3)->with('exam_medic',$rows4)->with('transfer_medic',$rows5);

    }
    public function load_dates_filiation_full(Request $request){
        $query = "SELECT * FROM pacientes pa
                        INNER JOIN pacientes_patologias pap
                            ON pa.id_paciente = pap.id_paciente
                        INNER JOIN patologias pat
                            ON pat.id_patologia = pap.id_patologia
                    WHERE pa.id_paciente = :id_patient";
        $rows=\DB::select(\DB::raw($query),array('id_patient'=>$request->id_patient));
        $query1 = "SELECT * FROM pacientes pa
                        INNER JOIN patients_dates_medic ptm
                            ON pa.id_paciente = ptm.id_patient
                        INNER JOIN datos_medicos dm
                            ON dm.id_dato_medico = ptm.id_date_medic
                    WHERE pa.id_paciente = :id_patient";
        $rows1=\DB::select(\DB::raw($query1),array('id_patient'=>$request->id_patient));
        //return json_encode($rows1);
        return view('attentions.view_filiation_dates_full')->with('patologias',$rows)->with('datos_medicos',$rows1);
    }
    public function save_dates_appoinments_date(Request $request){
        //return $request->all();
        /* Modificar los datos de aqui para cer que se puede insertar. */
        $al = $request->all();
        foreach($al as $row =>$val) {
            if(is_numeric($row)){
                /*$data2[] = [
                    $row => $val
                ];*/
                //json_decode($data2);
                DB::table('details_dates_register')->insert([
                    'id_appointmetns_' => $request->id_appoinments,
                    'id_dates_register' => $row,
                    'observations' => $val
                ]);
            }
        }
        $query = "SELECT * FROM details_dates_register dr 
                        INNER JOIN dates_of_register dof
                            ON dof.id_date_register = dr.id_dates_register
                    WHERE dr.id_appointmetns_ = :id_a";
        $rows=\DB::select(\DB::raw($query),array('id_a'=>$request->id_appoinments));
        if(isset($request->observations_appointments)){
            DB::table('notes_medic_dates_appoinments')->insert([
                'id_medical_appoinments' => $request->id_appoinments,
                'observation_medical_appoinments' => $request->observation_appointment_dates,
                'observation_re_medical_consusltation' => $request->observations_appointments,
                're_medical_consultation' => 'S'
            ]);
            /*$add_re = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_appoinments)
            ->update([
                'reconsulta_register' => 'S',
                'state_appointments' => 1
            ]);*/
        }else{
            DB::table('notes_medic_dates_appoinments')->insert([
                'id_medical_appoinments' => $request->id_appoinments,
                'observation_medical_appoinments' => $request->observation_appointment_dates,
            ]);
        }
        $query1 = "SELECT * FROM notes_medic_dates_appoinments nmd WHERE id_medical_appoinments = :id_a";
        $rows1=\DB::select(\DB::raw($query1),array('id_a'=>$request->id_appoinments));
        return view('admin.attentions.load_notes_medic')->with('notes_medic',$rows)->with('datos_1',$rows1);
        //return json_encode( $data2);
        /*DB::table('notes_medic_dates_appoinments')->insert([
            'id_medical_appoinments' => $request->id_appoinments,
            'observation_medical_appoinments' => $request->observation_appointment_dates,
            'dates_register_appoinments' => json_encode($data2) 
        ]);*/
        if(isset($request->observations_appointments)){
            DB::table('notes_medic_dates_appoinments')->insert([
                'id_medical_appoinments' => $request->id_appoinments,
                'observation_medical_appoinments' => $request->observation_appointment_dates,
                'observation_re_medical_consusltation' => $request->observations_appointments,
                're_medical_consultation' => 'S'
            ]);
            /*$add_re = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_appoinments)
            ->update([
                'reconsulta_register' => 'S',
                'state_appointments' => 1
            ]);*/
        }else{
            DB::table('notes_medic_dates_appoinments')->insert([
                'id_medical_appoinments' => $request->id_appoinments,
                'observation_medical_appoinments' => $request->observation_appointment_dates,
            ]);
        }
        $query = "SELECT * FROM notes_medic_dates_appoinments";
        $rows=\DB::select(\DB::raw($query));
        return json_decode($rows[0]->dates_register_appoinments);

    }
    public function load_medicine_table(Request $request){
        //return $request->all();
        $query = "SELECT * FROM medicines                        
                    WHERE id_medicines = :id_medicines";
        $rows=\DB::select(\DB::raw($query),array('id_medicines'=>$request->id_medicine));
        return $rows;
    }
    public function save_dates_treatment(Request $request){
        //return $request->all();
        DB::table('treatment_patients')->insert([
            'date_start_treatment' => $request->treatment_start,
            'date_end_treatment' => $request->treatment_end,
            'id_medical_appointments' => $request->id_appoinments,
            'description_treatment' => $request->indications_treatment,
            'id_users_register' => Auth::user()->id
        ]);
        $query = "SELECT id_treatment FROM treatment_patients                        
                    ORDER BY id_treatment DESC LIMIT 1";
        $rows2=\DB::select(\DB::raw($query));        
        $tam = count($request->id_medicine);
        for($i  = 0; $i<$tam ; $i++){
            DB::table('treatment_details')->insert([
                'id_treatment' => $rows2[0]->id_treatment,
                'id_medicine' => $request->id_medicine[$i],
                'quantity_medicine' => $request->cantidad[$i]
            ]);
            $query2 = "SELECT update_stock(:id_medicine, :quantity)";
            $rows=\DB::select(\DB::raw($query2),array('id_medicine'=>$request->id_medicine[$i],'quantity'=>$request->cantidad[$i]));    
        }
        $query1 = "SELECT * FROM treatment_patients tp
                        INNER JOIN treatment_details td
                            ON tp.id_treatment = td.id_treatment
                        INNER JOIN medicines m
                            ON m.id_medicines = td.id_medicine
                    WHERE tp.id_medical_appointments = :id_appointments";
        $rows1=\DB::select(\DB::raw($query1),array('id_appointments'=>$request->id_appoinments));
        return view('admin.attentions.medical_treatment')->with('treat',$rows1);     
    }
    public function register_medical_exam(Request $request){
        //return $request->all();
        $query = "SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appoinments";
        $rows2=\DB::select(\DB::raw($query),array('id_appoinments'=>$request->id_appoinments));  
        DB::table('medical_exam_patients')->insert([
            'id_patient' => $rows2[0]->id_patient,
            'id_appoinments' => $request->id_appoinments,
            'id_medical_exam' => $request->id_medical_exam,
            'reason_medical_examn' => $request->reason_medical_exam,
            'observation_medical_exam' => $request->observations_medical_exam,
            'id_user_creator' => Auth::user()->id
        ]);
        $query1 = "SELECT mep.id_medical_exam_patient, mep.id_appoinments, mep.reason_medical_examn, mep.observation_medical_exam, mep.date_creation, mass.id_user, us.name, us.apellidos,
                        p.nombres, p.ap_paterno, p.ap_materno, p.fecha_nacimento, p.ci_paciente, mee.name_medical_exam
                        FROM medical_exam_patients mep
                        INNER JOIN medical_appointments mapp 
                            ON mep.id_appoinments = mapp.id_medical_appointments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN pacientes p
                            ON p.id_paciente = mep.id_patient
                        INNER JOIN medical_exam mee
                            ON mee.id_medical_exam = mep.id_medical_exam
                    WHERE id_medical_appointments = :id_appoinments
                        ORDER BY id_medical_exam_patient ASC LIMIT 1";
        $rows1=\DB::select(\DB::raw($query1),array('id_appoinments'=>$request->id_appoinments));
        //return $rows1;
        return view('admin.attentions.medical_exam')->with('exam_medic',$rows1);
    }
    public function store_patients_transfer(Request $request){
        //return $request->all();
        DB::table('transfer_patients')->insert([
            'id_patient_trasfer' => $request->id_patient,
            'id_appoinments' => $request->id_appoinments,
            'id_type_trasnfer' => $request->type_transfer,
            'diagnostic' => $request->diagnostic,
            'justified_transfer' => $request->justifi_transfer,
            'origin_transfer' => $request->origin_trasnfer,
            'destini_transfer' => $request->destyni_trasnfer,
            'id_user_register' => Auth::user()->id
        ]);
        $query1 = "SELECT * FROM transfer_patients tp
                        INNER JOIN pacientes p
                            ON p.id_paciente = tp.id_patient_trasfer
                        INNER JOIN types_transfer tt
                            ON tt.id_type_transfer = tp.id_type_trasnfer
                        INNER JOIN medical_appointments mapp
                            ON mapp.id_medical_appointments = tp.id_appoinments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                    WHERE id_appoinments = :id_appo";
        $rows1=\DB::select(\DB::raw($query1),array('id_appo'=>$request->id_appoinments));
        return view('admin.attentions.medical_transfer')->with('transfer_medic',$rows1);
    }
    public function end_medical_appointment(Request $request){
        //return $request->all();
        $add_re = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_appointments)
            ->update([
                'reconsulta_register' => 'S',
                'state_appointments' => 1
            ]);
            return redirect()->action(
                'AttentionsController@view_attention_list'
            );
    }
    public function view_attention_lists_full_medic(){
        $query = "select * from view_list_appoinments_atendidos(:id_user)";
        $rows=\DB::select(\DB::raw($query),array('id_user'=>Auth::user()->id));
        //return $rows;
        return view('attentions.view_appoinments_list_completo')->with('list',$rows);
    }
}