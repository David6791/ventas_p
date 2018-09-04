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
        $query = "select r.name rol_name, pr.created_at, p.name name_permission from permission_role pr
        inner join permissions p
        on p.id=pr.permission_id
        inner join roles r
        on r.id = pr.role_id
        where pr.role_id = :id";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_rol));
        return $row;
    }
    public function load_dates_roles_permission(Request $request){
        $query2 = "SELECT * FROM roles WHERE id = :id ";
        $row2=\DB::select(\DB::raw($query2),array('id'=>$request->id_rol));
        $query = "SELECT pr.permission_id,pr.role_id,id_per_rol,r.name name_rol, p.name name_per, pr.created_at  FROM permission_role pr
            INNER JOIN roles r
            ON r.id = pr.role_id
            INNER JOIN permissions p
            ON p.id = pr.permission_id
        WHERE pr.role_id = :id";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_rol));
        //return $row;
        $query1 = "select * from permissions where id NOT IN (select permission_id from permission_role where role_id = :id)";
        $row1=\DB::select(\DB::raw($query1),array('id'=>$request->id_rol));
        //return $row1;
        return view('admin.permission.partials.view_roles_permission')->with('row',$row)->with('row1',$row1)->with('dates',$row2);
    }
    public function add_permissions_roles(Request $request){
        //return $request->all();
        if( ! empty($request['add_permission'])){
            foreach($request->add_permission as $add){
                \DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [                
                $add,
                $request->id_user_role
                ]);
            }
        }
        if( ! empty($request['delete_permission'])){
            foreach($request->delete_permission as $delete){
                //return $delete;
                \DB::table('permission_role')->where('id_per_rol', '=', $delete)->delete();
            }
        }
        /*return redirect()->action(
            'Role@index_roles_roles' 
            //'UserRoleController@load_dates_roles_users'                   
        );*/
    }
}