<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class SchedulesController extends Controller
{
    public function index_Schedules(){
        $query = "select * from schedules order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.schedules.index_schedules')->with('row',$rows);  
    }
    public function create_Schedules(Request $request){
        //return $request->all(); 
        $validatedData = $request->validate([
            'nombre_horario' => 'required|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'horario_descripcion' => 'required'
        ]);       
        DB::table('schedules')->insert([
            'name_schedules' => $request->nombre_horario,
            'schedules_start' => $request->hora_inicio,
            'schedules_end' => $request->hora_fin,
            'description' => $request->horario_descripcion
        ]);
        return redirect()->action(
            'SchedulesController@index_schedules'
        );
    }
    public function darBajaSchedule(Request $request){
        //return $request->all();
        $query2 = "select state from schedules where id_schedule = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id));
        //return $rows;
        if(($rows2[0]->state)==='activo'){
            $baja_schedules = DB::table('schedules')
            ->where('id_schedule', '=', $request->id)
            ->update([
                'state' => 'inactivo'
            ]);    
        }else{
            $baja_schedules = DB::table('schedules')
            ->where('id_schedule', '=', $request->id)
            ->update([
                'state' => 'activo'
            ]);
        }
        return redirect()->action(
            'SchedulesController@index_schedules'
        );
    }
    public function edit_Schedule(Request $request){
        //return $request->all();
        $query2 = "select * from schedules where id_schedule = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_Schedules));
        return $rows2;
    }
    public function save_Schedule(Request $request){
        //return $request->all();
        $edit_schedule = DB::table('schedules')
            ->where('id_schedule', '=', $request->id_schedule)
            ->update([
                'name_schedules' => $request->name_schedules,
                'schedules_start' => $request->hour_start ,
                'schedules_end' => $request->hour_end,
                'description' => $request->hour_description
            ]);

        return redirect()->action(
            'SchedulesController@index_schedules'                   
        );
    }
}