<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class ManageDatesController extends Controller
{
    public function index_pathologie(){
        $query = "select * from patologias order by id_patologia";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.manage_dates.index_phatologies')->with('list',$rows);
    }
    public function create_phatologies(Request $request){
        //return $request->all();
        DB::table('patologias')->insert([
            'nombre_patologia' => $request->name_phatologie,
            'descripcion_patologia' => $request->phatologie_description,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'ManageDatesController@index_pathologie'
        );
    }   

    public function index_medical_date(){
        $query = "select * from datos_medicos order by id_dato_medico";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.manage_dates.view_medical_dates')->with('list',$rows);
    }
    public function create_medical_date(Request $request){
        DB::table('datos_medicos')->insert([
            'nombre_dato_medico' => $request->name_medical_date,
            'pregunta_dato_medico' => $request->mesage_answer_yes,
            'pregunta_mostrar' => $request->question_view,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'ManageDatesController@index_medical_date'
        );
    }

    public function index_data_medical_appointment(){
        $query = "select * from schedules order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return '$rows';
        return view('manage_dates.data_medical_appointment')->with('list',$rows);
    }

    public function index_register_data_medical_appointment(){
        $query = "select * from dates_of_register order by id_date_register";
        $rows=\DB::select(\DB::raw($query));
        return view('manage_dates.dates_register_appointment')->with('list',$rows);
    }
    public function edit_patologies_charge(Request $request){
        //return $request->all();
        $query = "SELECT * FROM patologias WHERE id_patologia = :idp";
        $rows=\DB::select(\DB::raw($query),array('idp'=>$request->id_patologie));
        return $rows;
        //return view('manage_dates.dates_register_appointment')->with('list',$rows);
    }
    public function edit_phatologies(Request $request){
        //return $request->all();
        $edit_patologies = DB::table('patologias')
            ->where('id_patologia', '=', $request->id_pathologie)
            ->update([
                'nombre_patologia' => $request->name_phatologie,
                'descripcion_patologia' => $request->phatologie_description
            ]);
        return redirect()->action(
            'ManageDatesController@index_pathologie'
        );
    }
    public function darBajaPatologie(Request $request){
        //return $request->all(); eliminar_patologie
        $query = "select * from eliminar_patologie(:pat,:us)";
        $rows=\DB::select(\DB::raw($query),array('pat'=>$request->id,'us'=>Auth::user()->id));
        return redirect()->action(
            'ManageDatesController@index_pathologie'
        );
    }
    public function edit_medical_charge(Request $request){
        //return $request->all();
        $query = "select * from datos_medicos where id_dato_medico = :id_med";
        $rows=\DB::select(\DB::raw($query),array('id_med'=>$request->id_date_medic));
        return $rows;
    }
    public function edit_medical_dates(Request $request){
        $edit_dates_medics = DB::table('datos_medicos')
            ->where('id_dato_medico', '=', $request->id_date_medic)
            ->update([
                'nombre_dato_medico' => $request->name_medical_date,
                'pregunta_dato_medico' => $request->mesage_answer_yes,
                'pregunta_mostrar' => $request->question_view
            ]);
        return redirect()->action(
            'ManageDatesController@index_medical_date'
        );
    }
    public function get_BajaDatemedics(Request $request){
        $query = "select * from eliminar_date_medic(:pat,:us)";
        $rows=\DB::select(\DB::raw($query),array('pat'=>$request->id,'us'=>Auth::user()->id));
        return redirect()->action(
            'ManageDatesController@index_medical_date'
        );
    }
    public function index_dates_register(){
        $query = "SELECT * FROM dates_of_register  ORDER BY id_date_register";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.manage_dates.index_dates_register')->with('list',$rows);
    }
    public function darBajaDates_register(Request $request){
        $query = "select * from eliminar_date_register_cita(:pat,:us)";
        $rows=\DB::select(\DB::raw($query),array('pat'=>$request->id,'us'=>Auth::user()->id));
        return redirect()->action(
            'ManageDatesController@index_dates_register'
        );
    }
    public function edit_date_register_functions(Request $request){
        $query = "select * from dates_of_register where id_date_register = :id_med";
        $rows=\DB::select(\DB::raw($query),array('id_med'=>$request->id));
        return $rows;
    }
    public function edit_dates_register(Request $request){        
        $validatedData = $request->validate([
            'nombre_dato' => 'required|max:30',
            'descripcion_dato' => 'required'
        ]);
        DB::table('dates_of_register')
            ->where('id_date_register', $request->_id)
            ->update(['name_date' => $request->nombre_dato,
                        'description_dates' => $request->descripcion_dato
            ]);
        return redirect()->action(
            'ManageDatesController@index_dates_register'                   
        );
    }
    public function create_date_register(Request $request){
        $validatedData = $request->validate([
            'nombre_dato' => 'required|max:30',
            'descripcion_dato' => 'required'
        ]);
        DB::insert('insert into dates_of_register (name_date, description_dates, id_user_register) values (?, ?, ?)', [
            $request->nombre_dato,
            $request->descripcion_dato,
            Auth::user()->id
            ]);
        return redirect()->action(
            'ManageDatesController@index_dates_register'                   
        );
    }
}