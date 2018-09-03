<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Permission extends Controller
{
    public function index_permission(){
        $query = "select * from permissions order by id asc";
        $row=\DB::select(\DB::raw($query));
        return view('admin.permission.index_permission')->with('row',$row);
    }
    public function index_roles_permission(){
        $query = "select * from roles order by id asc";
        $row=\DB::select(\DB::raw($query));
        return view('admin.permission.roles_permissions')->with('row',$row);
    }
    public function load_dates_view_permisos(Request $request){
        $query = " select r.name rol_name, pr.created_at, p.name name_permission from permission_role pr
        inner join permissions p
        on p.id=pr.permission_id
        inner join roles r
        on r.id = pr.role_id
        where pr.role_id = :id";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_rol));
        return $row;
    }
}