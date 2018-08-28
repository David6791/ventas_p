<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller{
    public function load_dates_edit_roles(Request $request){
        //return $request->all();
        $query = "SELECT * FROM roles WHERE id = :id order by id asc";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_rol));
        return $row;
        return view('admin.roles.index_role')->with('row',$row);
    }   
    public function save_edit_roles(Request $request){
        //return $request->all();
        $validatedData = $request->validate([
            'rol' => 'required|max:10',
            'name_rol' => 'required',
            'description_rol' => 'required'
        ]);
        DB::table('roles')
            ->where('id', $request->id_rol)
            ->update(['name' => $request->rol,
                        'display_name' => $request->name_rol,
                        'description' => $request->description_rol
            ]);
        return redirect()->action(
            'Role@index_role'                   
        );
    }
    public function delete_roles(Request $request){
        //return $request->all();
        DB::table('roles')->where('id', '=', $request->id_rol)->delete();
        return redirect()->action(
            'Role@index_role'                   
        );
    }
}