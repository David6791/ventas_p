<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller{
    public function load_dates_roles_users(Request $request){
        $query = "SELECT us.id id_user, us.name, ru.user_id r_user_id, ru.role_id r_role_id, ru.id_role_user, ru.created_at ru_created_at, ro.id rol_id, ro.name rol_name FROM users us
                        INNER JOIN role_user ru
                        ON ru.user_id = us.id
                        INNER JOIN roles ro
                        ON ru.role_id = ro.id
                    WHERE us.id = :id ";
        $row=\DB::select(\DB::raw($query),array('id'=>$request->id_user));
        //return $row;
        
        $query1 = "select * from roles where id NOT IN (select role_id from role_user)";
        $row1=\DB::select(\DB::raw($query1));
        return view('admin.roles.partials.users_roles')->with('row',$row)->with('rol',$row1);
    }    
    public function add_role_user(Request $request){
        return $request->all();
    }
}