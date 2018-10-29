<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller{
    public function create_permission(Request $request){
        $validatedData = $request->validate([
            'permission' => 'required|max:30',
            'name_permission' => 'required',
            'description_permission' => 'required'
        ]);
        DB::insert('insert into permissions (name, display_name, description) values (?, ?, ?)', [
            $request->permission,
            $request->name_permission,
            $request->description_permission
            ]);
        return redirect()->action(
            'Permission@index_permission'                   
        );
    }
    public function load_dates_edit_permission(Request $request){
        //return $request->all();
        $query = "SELECT * FROM permissions WHERE id = :id order by id asc";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_permission));
        return $row;
    }
    public function edit_permission(Request $request){
        //return $request->all();
        $validatedData = $request->validate([
            'permission_edit' => 'required|max:10',
            'name_permission_edit' => 'required',
            'description_permission_edit' => 'required'
        ]);
        DB::table('permissions')
            ->where('id', $request->id_permission_edit)
            ->update(['name' => $request->permission_edit,
                        'display_name' => $request->name_permission_edit,
                        'description' => $request->description_permission_edit
            ]);
        return redirect()->action(
            'Permission@index_permission'                   
        );
    }
    public function delete_permission(Request $request){
        //return $request->all();
        DB::table('permissions')->where('id', '=', $request->id_permission)->delete();
        return redirect()->action(
            'Permission@index_permission'                   
        );
    }
}