<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DiseaseGroupController extends Controller{
    public function index_group_disease(){
        $query = "select * from disease_group order by _id asc";
        $row=\DB::select(\DB::raw($query));
        return view('admin.disease_group.index_disease_group')->with('row',$row);
    }
    public function create_group_disease(Request $request){
        //return $request->all();
        $validatedData = $request->validate([
            'nombre_grupo' => 'required|max:30',
            'descripcion_grupo' => 'required'
        ]);
        DB::insert('insert into disease_group (name_group,  description_group, user_register) values (?, ?, ?)', [
            $request->nombre_grupo,
            $request->descripcion_grupo,
            1
            ]);
        return redirect()->action(
            'DiseaseGroupController@index_group_disease'                   
        );
    }
    public function baja_group_disease(Request $request){
        $query2 = "select state_group from disease_group where _id = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id));
        //return $rows;
        if(($rows2[0]->state_group)==='activo'){
            $baja_schedules = DB::table('disease_group')
            ->where('_id', '=', $request->id)
            ->update([
                'state_group' => 'inactivo'
            ]);    
        }else{
            $baja_schedules = DB::table('disease_group')
            ->where('_id', '=', $request->id)
            ->update([
                'state_group' => 'activo'
            ]);
        }
        return redirect()->action(
            'DiseaseGroupController@index_group_disease' 
        );
    }
    public function load_dates_edit_group(Request $request){
        //return $request->all();
        $query = "select * from disease_group WHERE _id = :id order by _id asc";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id));
        return $row;
    }
    public function edit_group(Request $request){
        $validatedData = $request->validate([
            'nombre_grupo' => 'required|max:30',
            'descripcion_grupo' => 'required'
        ]);
        DB::table('disease_group')
            ->where('_id', $request->_id)
            ->update(['name_group' => $request->nombre_grupo,
                        'description_group' => $request->descripcion_grupo
            ]);
        return redirect()->action(
            'DiseaseGroupController@index_group_disease'                  
        );
    }
}