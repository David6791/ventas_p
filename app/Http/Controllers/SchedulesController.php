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
    public function index_turns(){
        $query = "select * from schedules where state = 'activo' order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.schedules.index_schedules_turn')->with('sche',$rows);
    }
    public function view_turns_schedul(Request $request){
        $query = "select ht.id_schedul, ht.id_hour_turn, ht.start_time, ht.end_time, ht.state state_turn, ht.date_creation date, sc.name_schedules  from hour_turns ht 
            inner join schedules sc
                on sc.id_schedule = ht.id_schedul
        where ht.id_schedul = :id order by ht.id_hour_turn";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_sche));
        //return $rows;
        $query1 = "select * from schedules where id_schedule = :d";
        $rows1=\DB::select(\DB::raw($query1),array('d'=>$request->id_sche));
        $da = [$request->id_sche, $rows1[0]->name_schedules];
        //return $da;
        return view('admin.schedules.index_turns_hours_schedule')->with('horas',$rows)->with('sche',$da);
    }
    public function baja_turn(Request $request){
        //return $request->all();
        $query = "select * from public.eliminar_turn(:id)";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_turn));
        $query1 = "select ht.id_schedul, ht.id_hour_turn, ht.start_time, ht.end_time, ht.state state_turn, ht.date_creation date, sc.name_schedules  from hour_turns ht 
                        inner join schedules sc
                            on sc.id_schedule = ht.id_schedul
                    where ht.id_schedul = :id order by ht.id_hour_turn";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_hour));
        return $rows1;
    }
    public function save_turn(Request $request){
        $validatedData = $request->validate([
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);
        DB::insert('insert into hour_turns (start_time, end_time, id_schedul) values (?, ?, ?)', [
            $request->hora_inicio,
            $request->hora_fin,
            $request->id_schedule
            ]);
        $query1 = "select ht.id_schedul, ht.id_hour_turn, ht.start_time, ht.end_time, ht.state state_turn, ht.date_creation date, sc.name_schedules  from hour_turns ht 
                        inner join schedules sc
                            on sc.id_schedule = ht.id_schedul
                    where ht.id_schedul = :id order by ht.id_hour_turn";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_schedule));
        return $rows1;
    }
}