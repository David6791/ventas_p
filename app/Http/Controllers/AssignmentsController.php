<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AssignmentsController extends Controller
{
    public function index_Assignments(){
        /*$query = "SELECT mass.id_medical_assignments, us.name, us.apellidos, tus.nombre_tipo, sch.name_schedules, mass.date_creation FROM medical_assignments mass
                            INNER JOIN users us
                        ON mass.id_user = us.id	
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul ORDER BY mass.id_medical_assignments";*/
        $query = "SELECT  us.name, mass.id_user, us.apellidos, tus.nombre_tipo, array_agg(sch.name_schedules)::varchar[] as cx
                        --mass.date_creation 
                        FROM medical_assignments mass
                            INNER JOIN users us
                            ON mass.id_user = us.id	
                            INNER JOIN tipo_usuarios tus
                            ON tus.id_tipo = us.tipo_usuario
                            INNER JOIN schedules sch
                            ON sch.id_schedule = mass.id_schedul group by  us.name, mass.id_user, us.apellidos, tus.nombre_tipo ORDER BY mass.id_user";
        $rows=\DB::select(\DB::raw($query));
        
        //return $rows;

        /*for ($i = 0; $i < count($rows->cx); $i++){
            dd($rows[$i]->cx);
        }
        return $rows->cx[0];*/



        //$b= preg_split("/[,]/",$a);
        //print_r($b);
        //return var_dump($rows[1]->cx);
        //$b= preg_split("/[,]/",$rows->cx);
        //$explode = implode("," ,$rows->cx);
        //return $explode;
        $query1 = "SELECT us.id, us.name, us.apellidos, tus.nombre_tipo FROM users us
                            LEFT JOIN medical_assignments mass
                        ON mass.id_user = us.id
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                    WHERE us.estado_user = 1 AND mass.id_user is NULL AND us.tipo_usuario != 1";
        $users=\DB::select(\DB::raw($query1));
        $query2 = "SELECT * FROM schedules WHERE state = 'activo'";
        $schedul = \DB::select(\DB::raw($query2));
        return view('admin.assignments_user.index_assignments')->with('rows',$rows)->with('users',$users)->with('schedul',$schedul);
    }
    public function create_Assignments(Request $request){
        //return $request->all();
        foreach($request->add_schedule as $esp){
            //return $esp;
            DB::table('medical_assignments')->insert([
                'id_user' => $request->id_user,
                'id_schedul' => $esp
            ]);
        }
        return redirect()->action(
            'AssignmentsController@index_Assignments'                   
        );
    }
    public function view_Assignment(Request $request){
        $query = "SELECT tus.nombre_tipo, us.name, us.apellidos, sch.name_schedules, sch.schedules_start, sch.schedules_end, sch.state FROM medical_assignments mass 
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN tipo_usuarios tus
                        ON us.tipo_usuario = tus.id_tipo
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                    WHERE id_user = :id AND state_assignments = 'activo'";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_user));
        return $rows;
    }
    public function edit_Assignment(Request $request){
        $query2 = "SELECT * FROM users us 
                    INNER JOIN tipo_usuarios tus
                            ON us.tipo_usuario = tus.id_tipo
                    where us.id = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_user));
        $query = "SELECT sch.id_schedule, mass.id_user, tus.nombre_tipo, us.name, us.apellidos, sch.name_schedules, sch.schedules_start, sch.schedules_end, mass.state_assignments FROM medical_assignments mass 
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN tipo_usuarios tus
                        ON us.tipo_usuario = tus.id_tipo
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                    WHERE id_user = :id AND mass.state_assignments = 'activo'";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_user));
        $query1 = "SELECT sch.id_schedule, sch.name_schedules FROM schedules sch 
        WHERE  sch.state = 'activo' AND  sch.id_schedule NOT IN(
            SELECT mass.id_schedul
            FROM medical_assignments mass
            WHERE mass.id_user = :id and state_assignments = 'activo')";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>$request->id_user));
        return $var=['datos'=>$rows, 'datos1'=>$rows1,'us'=>$rows2];
    }
    public function save_edit_assignment(Request $request){
        //return $request->all();
        //Terminar de hacer aqui llamando las funciones de DB eliminar_schedul
        if(isset($request->schedul_remove)){
            foreach($request->schedul_remove as $esp){
                //return $esp;
                if($esp!=0)
                {
                    $query1 = "select public.agregar_horario(:id, :id_espe)";
                    $rows2 = \DB::select(\DB::raw($query1),array('id'=>$request->id_user,'id_espe'=>$esp));        
                }
            }
        }
        /*foreach($request->schedul_remove as $esp){
            //return $esp;
            if($esp!=0)
            {
                $query1 = "select public.agregar_horario(:id, :id_espe)";
                $rows2 = \DB::select(\DB::raw($query1),array('id'=>$request->id_user,'id_espe'=>$esp));        
            }
        }*/
        if(isset($request->schedul_add)){
            foreach($request->schedul_add as $esp){
                //return $esp;
                if($esp!=0)
                {
                    $query2 = "select public.eliminar_schedul(:id, :id_espe)";
                    $rows3 = \DB::select(\DB::raw($query2),array('id'=>$request->id_user,'id_espe'=>$esp));
                }
            }
        }
        return redirect()->action(
            'AssignmentsController@index_Assignments'                   
        );
    }
}