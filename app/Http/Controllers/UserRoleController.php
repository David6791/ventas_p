<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller{
    public function load_dates_roles_users(Request $request){
        //return $request->id_user;
        $query2 = "SELECT * FROM users WHERE id = :id ";
        $row2=\DB::select(\DB::raw($query2),array('id'=>$request->id_user));
        $query = "SELECT us.id id_user, us.name, ru.user_id r_user_id, ru.role_id r_role_id, ru.id_role_user, ru.created_at ru_created_at, ro.id rol_id, ro.name rol_name FROM users us
                        INNER JOIN role_user ru
                        ON ru.user_id = us.id
                        INNER JOIN roles ro
                        ON ru.role_id = ro.id
                    WHERE us.id = :id ";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_user));
        //return $row;
        
        $query1 = "select * from roles where id NOT IN (select role_id from role_user where user_id = :id)";
        $row1=\DB::select(\DB::raw($query1),array('id'=>$request->id_user));
        return view('admin.roles.partials.users_roles')->with('row',$row)->with('rol',$row1)->with('dates',$row2);
    }    
    public function add_role_user(Request $request){
        //return $request->all();
        if( ! empty($request['add_role'])){
            foreach($request->add_role as $add){
                DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [
                $request->id_user_role,
                $add
                ]);
            }
        }
        if( ! empty($request['delete_role'])){
            foreach($request->delete_role as $delete){
                //return $delete;
                DB::table('role_user')->where('role_id', '=', $delete)->delete();
            }
        }
        return redirect()->action(
            'Role@index_roles_roles' 
            //'UserRoleController@load_dates_roles_users'                   
        );
    }
    public function load_dates_view_rol(Request $request){
        //return $request->all();
        $query = "SELECT us.id id_user, us.name, ru.user_id r_user_id, ru.role_id r_role_id, ru.id_role_user, ru.created_at ru_created_at, ro.id rol_id, ro.name rol_name, ro.display_name FROM users us
                        INNER JOIN role_user ru
                        ON ru.user_id = us.id
                        INNER JOIN roles ro
                        ON ru.role_id = ro.id
                    WHERE us.id = :id ";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_rol));
        return $row;
    }
}