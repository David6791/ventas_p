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
        //return 'asdasdsad';
        $query = "select * from patologias where estado_patologia = 'activo'";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from datos_medicos where estado_dato_medico = 'activo'";
        $rows1=\DB::select(\DB::raw($query1));
        return view('admin.patients.form_patients')->with('row',$rows)->with('rows',$rows1);        
    }
    public function store_patient(Request $request){
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
            'localidad_nacimiento' => $request->localidad
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
    }
    public function index_patients(){
        $query = "SELECT * FROM pacientes";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.patients.index_patients')->with('list_patients',$rows);
    }   
    public function load_dates_patient_edit(Request $request){
        
        $query = "SELECT * FROM pacientes p
                    WHERE p.id_paciente = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_patient));
        $query2 = "SELECT * FROM pacientes_patologias  pp                        
                        LEFT JOIN patologias pt
                        ON pt.id_patologia = pp.id_patologia
                    WHERE pp.id_paciente = :id AND pp.estado_pac_pat = 'activo'";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_patient));
        $query1 = "SELECT * FROM patients_dates_medic pdm
                        INNER JOIN datos_medicos dm
                        ON pdm.id_date_medic = dm.id_dato_medico
                    WHERE id_patient = :id";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_patient));
        //return $rows;
        return view('admin.patients.view_patients_details')->with('pat',$rows2)->with('dates',$rows)->with('dates_medic',$rows1);
    }     
    public function load_dates_medic_edit_patient(Request $request){
        $query = "SELECT * FROM patients_dates_medic pmd 
                        INNER JOIN datos_medicos dm
                        ON dm.id_dato_medico = pmd.id_date_medic
                    WHERE pmd.id_patent_date_medic = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_date_medic_patient));
        return $rows;
    }
    public function edit_date_medic_patient(Request $request){
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
    }
    public function load_dates_edit_pat_patient(Request $request){
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
    }
    public function edit_pat_patient(Request $request){
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
    }
}