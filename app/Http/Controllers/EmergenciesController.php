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
        //return "Holas Como estas";
        return view('admin.emergencies.index_emergencies');
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
        $query1 = "select public.register_emergency(:id_patient,:ci_patient,:name_patient,:apaterno,:amaterno,:f_nacimiento,:direccion,:sexo,:descryption)";
        $rows2 = \DB::select(\DB::raw($query1),array('id_patient'=>$request->id_patient,'ci_patient'=>$request->ci_patient,'name_patient'=>$request->name_patient,'apaterno'=>$request->apaterno_patient,'amaterno'=>$request->amaterno_patient,'f_nacimiento'=>$request->fnacimiento_patient,'direccion'=>$request->direccion_patient,'sexo'=>$request->sexo,'descryption'=>$request->descryption_emergecy));
        return redirect()->action(
            'MedicalAppointmentController@index_Appointment'
        );
    }
}