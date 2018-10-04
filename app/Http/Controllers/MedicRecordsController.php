<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicRecordsController extends Controller
{
    public function view_medical_record(){
        $query = "SELECT * FROM pacientes ORDER BY id_paciente ASC";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.record_medics.index_patients')->with('list',$rows);
    }
    public function load_dates_record_medic_full(Request $request){
        //return $request->all();
        $query = "SELECT * FROM view_record_medic_full_patients(:id_patient)";
        $rows=\DB::select(\DB::raw($query),array('id_patient'=>$request->id_patient));
        $data3 = array();
        for($i = 0 ; $i < count($rows) ; $i++){
            $asd = json_encode($rows[$i]->j);
            $asdd = json_decode($asd);
            $data3[]=json_decode($asdd,true);
        }
        //return $data3;   
        return view('admin.record_medics.load_pages_record.view_record_patients_full')->with('list_record',$data3);
    }
    public function load_dates_record_medic_full_appoinment(Request $request){
        //return $request->all();
        /* Datos Medicos del paciente */
        $query = "SELECT * FROM dates_medic_patients_record(:id_appointments)";
        $rows=\DB::select(\DB::raw($query),array('id_appointments'=>$request->id_appointments));
        $data = array();
        for($i = 0 ; $i < count($rows) ; $i++){
            $asd = json_encode($rows[$i]->j);
            $asdd = json_decode($asd);
            $data[]=json_decode($asdd,true);
        }
        //return $data;
        /* Examenes Medicos de la consulta medica */
        $query1 = "SELECT * FROM medical_exam_patients mep
                        INNER JOIN medical_exam me
                            ON me.id_medical_exam = mep.id_medical_exam
                    WHERE mep.id_appoinments = :id_appointments ORDER BY id_medical_exam_patient ASC";
        $rows1=\DB::select(\DB::raw($query1),array('id_appointments'=>$request->id_appointments));        
        /* patologias de Paciente registrados al momento de la filiacion */
        $query2 = "SELECT * FROM patologies_medic_patients_record(:id_appointments)";
        $rows2=\DB::select(\DB::raw($query2),array('id_appointments'=>$request->id_appointments));
        $data2 = array();
        for($i = 0 ; $i < count($rows2) ; $i++){
            $asd = json_encode($rows2[$i]->j);
            $asdd = json_decode($asd);
            $data2[]=json_decode($asdd,true);
        }
        /* Notas Medicas en el Momento de la Atencion Medica */
        $query3 = "SELECT * FROM notes_medic_dates_appoinments nmda
                    WHERE nmda.id_medical_appoinments = :id_appointments ORDER BY id_medical_appoinments ASC";
        $rows3=\DB::select(\DB::raw($query3),array('id_appointments'=>$request->id_appointments)); 
        /* Trasnferencias medicas que tuvo el paciente en la cita medica */
        $query4 = "SELECT * FROM transfer_patients trp
                        INNER JOIN medical_appointments mapp
                            ON mapp.id_medical_appointments = trp.id_appoinments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN types_transfer tp
		                    ON trp.id_type_trasnfer = tp.id_type_transfer
                    WHERE trp.id_appoinments = :id_appointments ORDER BY id_transfer_patient ASC";
        $rows4=\DB::select(\DB::raw($query4),array('id_appointments'=>$request->id_appointments));
        /* Tratamientos del Paciente */
        $query5 = "SELECT * FROM treatment_patients trp
                        INNER JOIN treatment_details td
                            ON td.id_treatment = trp.id_treatment
                        INNER JOIN medicines m
                            ON m.id_medicines = td.id_medicine
                    WHERE id_medical_appointments = :id_appointments ORDER BY trp.id_treatment ASC";
        $rows5=\DB::select(\DB::raw($query5),array('id_appointments'=>$request->id_appointments));
        /* Datos del Paciente */
        $query6 = "SELECT * FROM pacientes p
                    WHERE id_paciente = (SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appointments)";
        $rows6=\DB::select(\DB::raw($query6),array('id_appointments'=>$request->id_appointments));
        /*$asd =  json_decode($rows3[0]->dates_register_appoinments);*/
        //return $rows1;
        return view('admin.record_medics.load_pages_record.view_record_patients_full_details')->with('date_medic',$data)->with('exam_medics',$rows1)->with('patologies_medic',$data2)->with('notes_medic',$rows3)->with('transfer_medic',$rows4)->with('treatment_medic',$rows5)->with('paciente',$rows6);
    }
}