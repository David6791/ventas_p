<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;


class PatientsController extends Controller
{
    public function form_patients(){
        if(\Entrust::hasRole('admin_pacientes')){
        //return 'asdasdsad';
        $qp = "select * from pais";
        $pais=\DB::select(\DB::raw($qp));
        $query = "select * from patologias where estado_patologia = 'activo'";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from datos_medicos where estado_dato_medico = 'activo'";
        $rows1=\DB::select(\DB::raw($query1));
        return view('admin.patients.form_patients')->with('row',$rows)->with('rows',$rows1)->with('paises',$pais);
    }else{
        return view('error.user_not_permission');
    }
    }
    public function store_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request->all();
        //return base64_encode(\QrCode::format('png')->size(200)->generate($request->ci_paciente));
        $validatedData = $request->validate([
            'apellido_materno' => 'required|max:20',
            'apellido_paterno' => 'required',
            'celular' => 'required',
            'ci_paciente' => 'unique:pacientes|required|max:20|alpha_dash',
            'ciudad' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'localidad' => 'required',
            'nacionalidad' => 'required',
            'nombre' => 'required',
            'provincia' => 'required',
            'telefono' => 'required'
        ]);
        DB::table('pacientes')->insert([
            'ci_paciente' => $request->ci,
            'ap_paterno' => $request->apellido_paterno,
            'ap_materno' => $request->apellido_materno,
            'nombres' => $request->nombre,
            'sexo' => $request->genero,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'fecha_nacimento' => $request->fecha_nacimiento,
            'pais_nacimiento' => $request->pais,
            'ciudad_nacimiento' => $request->ciudad,
            'provincia' => $request->provincia,
            'localidad_nacimiento' => $request->localidad,
            //'qr_code_patient' => base64_encode(\QrCode::format('png')->size(200)->generate($request->ci_paciente))

        ]);
        $query = "select id_paciente from pacientes order by id_paciente desc limit 1";
        $rows=\DB::select(\DB::raw($query));
        if($request->patologias != null){
            //return 'lleno';
            foreach($request->patologias as $pat){
                DB::table('pacientes_patologias')->insert([
                    'id_paciente' => $rows[0]->id_paciente,
                    'id_patologia' => $pat
                ]);
            }
        }
        if($request->patologias != null){
            //return 'lleno';
            foreach($request->patologias as $pat){
                DB::table('pacientes_patologias')->insert([
                    'id_paciente' => $rows[0]->id_paciente,
                    'id_patologia' => $pat
                ]);
            }
        }
        $al = $request->all();
        foreach($al as $row =>$val) {
            if(is_numeric($row)){
                DB::table('patients_dates_medic')->insert([
                    'id_patient' => $rows[0]->id_paciente,
                    'id_date_medic' => $row,
                    'descripcion' => $val
                ]);
            }

        }
        return redirect()->action(
            'PatientsController@index_patients'
        );
    }else{
        return view('error.user_not_permission');
    }
    }
    public function index_patients(){
        if(\Entrust::hasRole('admin_pacientes')){
        //return Auth::roles();
        $query = "SELECT * FROM pacientes p
        INNER JOIN pais pa
            ON pa.id_pais = cast(p.pais_nacimiento  as int)
        INNER JOIN departamentos de
            ON de.id_departamento = cast(p.ciudad_nacimiento  as int)
        INNER JOIN provincias pro
            ON pro.id_provincia = cast(p.provincia  as int)
        INNER JOIN localidades lo
            ON lo.id_localidad = cast(p.localidad_nacimiento  as int)
    WHERE p.id_paciente != 0 ";
    $rows=\DB::select(\DB::raw($query));
        return view('admin.patients.index_patients')->with('list_patients',$rows);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function load_dates_patient_edit(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
            $query = "SELECT * FROM pacientes p
        	INNER JOIN pais pa
        		ON pa.id_pais = cast(p.pais_nacimiento  as int)
        	INNER JOIN departamentos de
        		ON de.id_departamento = cast(p.ciudad_nacimiento  as int)
        	INNER JOIN provincias pro
        		ON pro.id_provincia = cast(p.provincia  as int)
        	INNER JOIN localidades lo
        		ON lo.id_localidad = cast(p.localidad_nacimiento  as int)
        WHERE p.id_paciente = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_patient));
        $qp = "select * from pais";
        $pais=\DB::select(\DB::raw($qp));
        /*$query2 = "SELECT * FROM pacientes_patologias  pp
                        LEFT JOIN patologias pt
                        ON pt.id_patologia = pp.id_patologia
                    WHERE pp.id_paciente = :id AND pp.estado_pac_pat = 'activo'";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_patient));
        $query1 = "SELECT * FROM patients_dates_medic pdm
                        INNER JOIN datos_medicos dm
                        ON pdm.id_date_medic = dm.id_dato_medico
                    WHERE id_patient = :id";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_patient));*/
        //return $rows;
        return view('admin.patients.view_patients_details')->with('dates',$rows)->with('paises',$qp);
    }else{
        return view('error.user_not_permission');
    }
    }
    public function edit_dates_patients_form(Request $request){
        //return $request->all();
        if(\Entrust::hasRole('admin_pacientes')){
        $query = "SELECT * FROM pacientes p
    	INNER JOIN pais pa
    		ON pa.id_pais = cast(p.pais_nacimiento  as int)
    	INNER JOIN departamentos de
    		ON de.id_departamento = cast(p.ciudad_nacimiento  as int)
    	INNER JOIN provincias pro
    		ON pro.id_provincia = cast(p.provincia  as int)
    	INNER JOIN localidades lo
    		ON lo.id_localidad = cast(p.localidad_nacimiento  as int)
        WHERE p.id_paciente = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_patient));
        //return $rows;
        /*$query2 = "SELECT * FROM pacientes_patologias  pp
                        LEFT JOIN patologias pt
                        ON pt.id_patologia = pp.id_patologia
                    WHERE pp.id_paciente = :id AND pp.estado_pac_pat = 'activo'";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_patient));
        */
        $query1 = "SELECT * FROM pais";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "SELECT * FROM pacientes where id_paciente = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_patient));
        //return $rows2;
        return view('admin.patients.view_patients_details_formulario')->with('dates_paciente',$rows2)->with('dates',$rows)->with('paises',$rows1);
    }else{
        return view('error.user_not_permission');
    }
    }
    public function load_dates_medic_edit_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        $query = "SELECT * FROM patients_dates_medic pmd
                        INNER JOIN datos_medicos dm
                        ON dm.id_dato_medico = pmd.id_date_medic
                    WHERE pmd.id_patent_date_medic = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_date_medic_patient));
        return $rows;
        }else{
            return view('error.user_not_permission');
        }
    }
    public function edit_date_medic_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request->all();
        DB::table('patients_dates_medic')
            ->where('id_patent_date_medic', $request->id_date_medic)
            ->update(['descripcion' => $request->rol_edit
            ]);
            $query = "SELECT * FROM patients_dates_medic pmd
                        INNER JOIN datos_medicos dm
                        ON dm.id_dato_medico = pmd.id_date_medic
                    WHERE pmd.id_patent_date_medic = :id";
            $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_date_medic));
            return $rows;
        }else{
            return view('error.user_not_permission');
        }
    }
    public function load_dates_edit_pat_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request->all();
        $query = "SELECT * FROM pacientes_patologias pp
                        INNER JOIN patologias p
                    ON pp.id_patologia = p.id_patologia
                        WHERE pp.id_paciente = :id and pp.estado_pac_pat = 'activo'";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_patient));
        $query1 = "SELECT * FROM patologias p WHERE p.estado_patologia = 'activo' and p.id_patologia NOT IN(
                        SELECT id_patologia FROM pacientes_patologias WHERE id_paciente = :id  AND estado_pac_pat = 'activo'
                    )";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_patient));
        //return $rows1;
        //$id = $request->$request->id_patient;
        return $var=['datos'=>$rows, 'datos1'=>$rows1, 'id'=>$request->id_patient];
        //return $var=['datos'=>$rows, 'datos1'=>$rows1];
        //return view('admin.patients.index_patients')->with('list_pat_asig',$rows);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function edit_pat_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request->all();
        if(! empty($request->pat_add)){
            foreach($request->pat_add as $esp){
                //return $esp;
                if($esp!=0)
                {
                    $query = "select public.agregar_patologie(:id, :id_pat)";
                    $rows = \DB::select(\DB::raw($query),array('id'=>$request->id_patient,'id_pat'=>$esp));
                }
            }
        }
        if(! empty($request->pat_delete)){
            foreach($request->pat_delete as $esp){
                //return $esp;
                if($esp!=0)
                {
                    $query = "select public.eliminar_patologie_patient(:id, :id_pat)";
                    $rows = \DB::select(\DB::raw($query),array('id'=>$request->id_patient,'id_pat'=>$esp));
                }
            }
        }
        $query = "SELECT * FROM pacientes_patologias pp
                        INNER JOIN patologias p
                    ON pp.id_patologia = p.id_patologia
                        WHERE pp.id_paciente = :id and pp.estado_pac_pat = 'activo'";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_patient));
        return $rows;
        }else{
            return view('error.user_not_permission');
        }
    }
    public function filiation_completing(Request $request){
        //if(\Entrust::hasRole('admin_pacientes')){
        $query = "SELECT * FROM pacientes pa
                        INNER JOIN pacientes_patologias pap
                            ON pa.id_paciente = pap.id_paciente
                        INNER JOIN patologias pat
                            ON pat.id_patologia = pap.id_patologia
                    WHERE pa.id_paciente = :id_patient and pap.estado_pac_pat = 'activo'";
        $rows=\DB::select(\DB::raw($query),array('id_patient'=>$request->id));
        $query1 = "SELECT * FROM pacientes pa
                        INNER JOIN patients_dates_medic ptm
                            ON pa.id_paciente = ptm.id_patient
                        INNER JOIN datos_medicos dm
                            ON dm.id_dato_medico = ptm.id_date_medic
                    WHERE pa.id_paciente = :id_patient";
        $rows1=\DB::select(\DB::raw($query1),array('id_patient'=>$request->id));
        $query2 = "SELECT * FROM pacientes p
                        WHERE p.id_paciente =  :id_patient";
        $rows2=\DB::select(\DB::raw($query2),array('id_patient'=>$request->id));
        //return $rows2;
        return view('admin.patients.completing_dates.form_completing_dates')->with('pat',$rows)->with('dates_medic',$rows1)->with('dates_patient',$rows2);
        /*}else{
            return view('error.user_not_permission');
        }*/
    }
    public function add_date_new_medic_url(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request->all();
        $query1 = "SELECT * FROM datos_medicos dm WHERE dm.estado_dato_medico = 'activo' and dm.id_dato_medico NOT IN(
            SELECT id_date_medic FROM patients_dates_medic WHERE id_patient = :id  AND estate = 'activo'
        )";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id));
        //return $rows1;
        return $var=['datos'=>$rows1, 'id'=>$request->id];
        }else{
            return view('error.user_not_permission');
        }
    }
    public function completing_dates_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request;
        $val = $request->dates_medic_add;
        $id = $request->id_patient_dates;
        foreach($val as $row) {
            DB::table('patients_dates_medic')->insert([
                'id_patient' => $request->id_patient_dates,
                'id_date_medic' => $row
            ]);
        }
        //return $id;
        $query1 = "SELECT * FROM patients_dates_medic ptm
                    INNER JOIN datos_medicos dm
                        ON dm.id_dato_medico = ptm.id_date_medic
                    WHERE ptm.id_patient = :id_patient";
        $rows1=DB::select(DB::raw($query1),array('id_patient'=>$id));
        $query2 = "SELECT * FROM pacientes p
                        WHERE p.id_paciente =  :id_patient";
        $rows2=\DB::select(\DB::raw($query2),array('id_patient'=>$request->id_patient_dates));
        //return $rows1;
        return view('admin.patients.completing_dates.table_new_dates_medic')->with('dates_medic',$rows1)->with('dates_patient',$rows2);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function delete_dates_medic_patient(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        $query = "select public.delete_date_medic(:id, :id_pat)";
        $rows = \DB::select(\DB::raw($query),array('id'=>$request->id_patient,'id_pat'=>$request->id));
        $query1 = "SELECT * FROM patients_dates_medic pdm
                        INNER JOIN datos_medicos dm
                        ON pdm.id_date_medic = dm.id_dato_medico
                    WHERE id_patient = :id";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_patient));
        $query2 = "SELECT * FROM pacientes p
                        WHERE p.id_paciente =  :id_patient";
        $rows2=\DB::select(\DB::raw($query2),array('id_patient'=>$request->id_patient));
        //return $rows2;
        return view('admin.patients.completing_dates.table_new_dates_medic')->with('dates_medic',$rows1)->with('dates_patient',$rows2);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function update_patients_dates(Request $request){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $request->all();
        $validatedData = $request->validate([
            'apellido_materno' => 'required|max:20',
            'apellido_paterno' => 'required',
            'celular' => 'required',
            'ci' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'localidad' => 'required',
            'nacionalidad' => 'required',
            'nombre' => 'required',
            'provincia' => 'required',
            'telefono' => 'required'
        ]);
        $modify_appointments = DB::table('pacientes')
            ->where('id_paciente', $request->id_patient)
            ->update([
            'ci_paciente' => $request->ci,
            'ap_paterno' => $request->apellido_paterno,
            'ap_materno' => $request->apellido_materno,
            'nombres' => $request->nombre,
            'sexo' => $request->genero,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'fecha_nacimento' => $request->fecha_nacimiento,
            'pais_nacimiento' => $request->nacionalidad,
            'ciudad_nacimiento' => $request->ciudad,
            'provincia' => $request->provincia,
            'localidad_nacimiento' => $request->localidad,
            'filiacion_completa' => 's'
            //'qr_code_patient' => QrCode::format('png')->size(200)->generate($request->ci)
        ]);
        $query = "SELECT * FROM pacientes pa
                    WHERE pa.id_paciente = :id_patient";
        $patient=\DB::select(\DB::raw($query),array('id_patient'=>$request->id_patient));
        $query1 = "SELECT * FROM pacientes pa
                        INNER JOIN pacientes_patologias pap
                            ON pa.id_paciente = pap.id_paciente
                        INNER JOIN patologias pat
                            ON pat.id_patologia = pap.id_patologia
                    WHERE pa.id_paciente = :id_patient and pap.estado_pac_pat = 'activo'";
        $rows1=\DB::select(\DB::raw($query1),array('id_patient'=>$request->id_patient));
        $query2 = "SELECT * FROM patients_dates_medic pdm
                        INNER JOIN datos_medicos dm
                        ON pdm.id_date_medic = dm.id_dato_medico
                    WHERE id_patient = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_patient));
        //return $patient;
        //return $rows1;
        return view('admin.patients.completing_dates.load_dates_full')->with('dates_patient',$patient)->with('datos_medicos',$rows2)->with('patologias',$rows1);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function view_list_patients(){
        if(\Entrust::hasRole('activar_editar')){
        //return 'asdsad sad sad sad ';
        $query = "SELECT * FROM pacientes WHERE esta_paciente = 'activo' ORDER BY id_paciente";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.patients.view_dates_activate')->with('patients',$rows);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function hability_dates_patients(Request $request){
        if(\Entrust::hasRole('activar_editar')){
        $query = "SELECT * FROM public.hability_patients(:id)";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_patients));
        return redirect()->action(
            'PatientsController@view_list_patients'
        );
        }else{
            return view('error.user_not_permission');
        }
    }
    public function view_list_patients_credential(){
        if(\Entrust::hasRole('imprimir_credencial')){
        $query = "SELECT * FROM pacientes WHERE esta_paciente = 'activo' ORDER BY id_paciente";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.patients.view_dates_list_print')->with('patients',$rows);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function print_credential($id_){
        if(\Entrust::hasRole('admin_pacientes')){
        //return $id_;
        $query = "SELECT * FROM pacientes WHERE esta_paciente = 'activo' AND id_paciente = :id ORDER BY id_paciente";
        $rows=\DB::select(\DB::raw($query),array('id'=>$id_));
        //return $rows;
        $view =  \View::make('admin.patients.credential', compact('rows'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0,300,200));
        $pdf->loadHTML($view);
        return $pdf->stream();
        }else{
            return view('error.user_not_permission');
        }
    }
    public function print_record_medic($id_){
        if(\Entrust::hasRole('admin_pacientes')){
        $q1 = "SELECT * FROM pacientes p
                    WHERE id_paciente = (SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appointments)";
        $paciente=\DB::select(\DB::raw($q1),array('id_appointments'=>$id_));
        $q2 = "SELECT * FROM pacientes_patologias pp
        INNER JOIN patologias pa
            ON pa.id_patologia = pp.id_patologia
                WHERE pp.id_paciente = (SELECT mapp.id_patient FROM medical_appointments mapp where mapp.id_medical_appointments = :id_appointments) ORDER BY id_pac_pat ASC";
        $pato=\DB::select(\DB::raw($q2),array('id_appointments'=>$id_));

        $dj = "select * from medical_appointments ma
                    inner join patients_dates_medic ptm
                        on ptm.id_patient = ma.id_patient
                    inner join datos_medicos dm
                                on dm.id_dato_medico = ptm.id_date_medic
                where ma.id_medical_appointments = :id_appointments";
        $dr=\DB::select(\DB::raw($dj),array('id_appointments'=>$id_));
        $not = "SELECT * FROM details_dates_register dr
            INNER JOIN dates_of_register dof
                    ON dof.id_date_register = dr.id_dates_register
            WHERE dr.id_appointmetns_ = :id_appointments";
        $notes=\DB::select(\DB::raw($not),array('id_appointments'=>$id_));
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
        $transfer_medic=\DB::select(\DB::raw($query4),array('id_appointments'=>$id_));
        $query1 = "SELECT * FROM medical_exam_patients mep
                        INNER JOIN medical_exam me
                            ON me.id_medical_exam = mep.id_medical_exam
                        INNER JOIN medical_appointments ma
                ON ma.id_medical_appointments = mep.id_appoinments
                INNER JOIN medical_assignments mes
                ON mes.id_medical_assignments = ma.id_medical_assignments
                INNER JOIN users us
                ON us.id = mes.id_user
                WHERE mep.id_appoinments = :id_appointments ORDER BY id_medical_exam_patient ASC";
        $exam_medics=\DB::select(\DB::raw($query1),array('id_appointments'=>$id_));

        $view =  \View::make('admin.patients.medical_record_print', compact('paciente','pato','dr','notes','transfer_medic','exam_medics','id_'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("letter", "portrait");
        $pdf->loadHTML($view);
        return $pdf->stream();
    }else{
        return view('error.user_not_permission');
    }
    }
    public function charge_depa_b(Request $request){
        //return $request->all();
        $depa = "SELECT * FROM departamentos WHERE id_pais = :id_pais";
        $depas=\DB::select(\DB::raw($depa),array('id_pais'=>$request->id));
        return $depas;
    }
    public function charge_provincia(Request $request){
        //return $request->all();
        $depa = "SELECT * FROM provincias WHERE id_departamento = :id_depa";
        $depas=\DB::select(\DB::raw($depa),array('id_depa'=>$request->id));
        return $depas;
    }
    public function charge_localidad(Request $request){
        //return $request->all();
        $depa = "SELECT * FROM localidades WHERE id_provincia = :id_provincia";
        $depas=\DB::select(\DB::raw($depa),array('id_provincia'=>$request->id));
        return $depas;
    }
    public function ver_historial($ci){
        $paciente = "SELECT * FROM pacientes WHERE ci_paciente = :ci_paciente";
        $pa=\DB::select(\DB::raw($paciente),array('ci_paciente'=>$ci));
        //return $pa;
        $cita_medica = "SELECT * FROM pacientes p
            	INNER JOIN medical_appointments mapp
            		ON mapp.id_patient = p.id_paciente
            	INNER JOIN medical_assignments mass
            		ON mass.id_medical_assignments = mapp.id_medical_assignments
            	INNER JOIN schedules sc
            		ON sc.id_schedule = mass.id_schedul
            	INNER JOIN hour_turns ht
            		ON ht.id_hour_turn = mapp.id_turn_hour
                INNER JOIN users us
		            ON us.id = mass.id_user
                WHERE p.ci_paciente = :ci_paciente AND mapp.state_appointments = 3";
        //return $cita_medica;
        $r_cita_medica=\DB::select(\DB::raw($cita_medica),array('ci_paciente'=>$ci));
        $historial = "SELECT * FROM pacientes p
                	INNER JOIN medical_appointments mapp
                		ON mapp.id_patient = p.id_paciente
                	INNER JOIN details_dates_register ddr
                		ON ddr.id_appointmetns_ = mapp.id_medical_appointments
                	INNER JOIN dates_of_register dof
                		ON dof.id_date_register = ddr.id_dates_register
                WHERE p.ci_paciente =  :ci_paciente ORDER BY mapp.id_medical_appointments DESC, ddr.id_dates_register LIMIT 4";
        //return $cita_medica;
        $r_historial=\DB::select(\DB::raw($historial),array('ci_paciente'=>$ci));
        //return $r_historial;
        return view('admin.menu_phone.view_menu')->with('pa',$pa)->with('r_cita',$r_cita_medica)->with('r_historial_medico',$r_historial);
    }
}
