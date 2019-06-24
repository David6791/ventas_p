<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class EmergenciesController extends Controller
{
    public function index_emergency(){
        if((\Entrust::hasRole('panel_control') or (\Entrust::hasRole('citas_medicas')))){
        //return "Holas Como estas";
        return view('admin.emergencies.index_emergencies');
        }else{
            return view('error.user_not_permission');
        }
    }
    public function search_patient(Request $request){
        //return $request->all();
        $query = "select * from pacientes where ci_paciente = :ci_patient";
        $rows=\DB::select(\DB::raw($query),array('ci_patient'=>$request->ci_patient));
        if(empty($rows)){
            return false;
        }else{
            return $rows;
        }
    }
    public function store_emergency(Request $request){
        $validatedData = $request->validate([
            'ci_paciente' => 'required|max:30|min:7',
            'nombre_paciente' => 'required|max:30',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required|max:40',
            'genero' => 'required',
        ]);
        $query1 = "select public.register_emergency(:id_patient,:ci_patient,:name_patient,:apaterno,:amaterno,:f_nacimiento,:direccion,:sexo,:descryption)";
        $rows2 = \DB::select(\DB::raw($query1),array(
            'id_patient'=>$request->id_patient,
            'ci_patient'=>$request->ci_paciente,
            'name_patient'=>$request->nombre_paciente,
            'apaterno'=>$request->apellido_paterno,
            'amaterno'=>$request->apellido_materno,
            'f_nacimiento'=>$request->fecha_nacimiento,
            'direccion'=>$request->direccion_patient,
            'sexo'=>$request->genero,
            'descryption'=>$request->descryption_emergecy));
        return redirect()->action(
            'MedicalAppointmentController@index_Appointment'
        );
    }
}
