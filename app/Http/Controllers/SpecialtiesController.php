<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class SpecialtiesController extends Controller
{
    public function index_especialidad(){
        if(\Entrust::hasRole('admin_datos')){
        $query = "select id_tipo, nombre_tipo from tipo_usuarios where id_tipo != 1";
        $rows=\DB::select(\DB::raw($query));
        $query2 = "select es.id_especialidad, es.nombre_especialidad, es.descripcion_especialidad, es.estado_especialidad, tp.nombre_tipo from especialidades es
                    inner join tipo_usuarios tp
                    on tp.id_tipo = es.tipo_usuario order by es.id_especialidad asc";
        $rows2=\DB::select(\DB::raw($query2));

        return view('admin.specialties.index_specialties')->with('row',$rows2)->with('rows',$rows);

        }else{
            return view('error.user_not_permission');
        }
    }
    public function crear_especialidad(Request $request){
        //return $request->all();
        DB::table('especialidades')->insert([
            'nombre_especialidad' => $request->nombre_especialidad,
            'descripcion_especialidad' => $request->descripcion_esp,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        return redirect()->action(
            'SpecialtiesController@index_especialidad'
        );
    }
    public function darBajaSpecialty(Request $request){
        //return $request->all();
        //return $request->estado_especialidad;
        $query2 = "select estado_especialidad from especialidades where id_especialidad = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id));
        if(($rows2[0]->estado_especialidad)==='Activo'){
            $baja_specialties = DB::table('especialidades')
            ->where('id_especialidad', '=', $request->id)
            ->update([
                'estado_especialidad' => 'Inactivo'
            ]);
        }else{
            $baja_specialties = DB::table('especialidades')
            ->where('id_especialidad', '=', $request->id)
            ->update([
                'estado_especialidad' => 'Activo'
            ]);
        }
        return redirect()->action(
            'SpecialtiesController@index_especialidad'
        );
    }
    public function editSpecialtie(Request $request){
        $query2 = "select * from especialidades where id_especialidad = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id_specialties));
        return $rows2;
    }
    public function saveSpecialtie(Request $request){
        //return $request->all();
        $save_edit_specialties = DB::table('especialidades')
            ->where('id_especialidad', '=', $request->id_specialties)
            ->update([
                'nombre_especialidad' => $request->nombre_especialidad,
                'descripcion_especialidad' => $request->descripcion_esp,
                'tipo_usuario' => $request->tipo_usuario
        ]);
        return redirect()->action(
            'SpecialtiesController@index_especialidad'
        );
    }
}
