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
        DB::table('pacientes')->insert([
            'ci_paciente' => $request->ci,
            'ap_paterno' => $request->apellido_pat,
            'ap_materno' => $request->apellido_mat,
            'nombres' => $request->nombres,
            'sexo' => $request->sexo,
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
}