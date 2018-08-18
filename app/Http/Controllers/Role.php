<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Role extends Controller
{
    public function index_role(){
        $query = "select * from roles order by id asc";
        $row=\DB::select(\DB::raw($query));
        return view('admin.roles.index_role')->with('row',$row);
    }
    public function index_roles_roles(){
        //return 'asdasdas';
        $query = "SELECT us.name usname, r.name rname, ru.created_at asi_created, ru.state_role_user, ru.id_role_user, us.id id_user, r.id id_rol FROM role_user ru
                    INNER JOIN users us
                    ON ru.user_id = us.id
                    INNER JOIN roles r
                    ON r.id = role_id order by us.id asc";
        $row=\DB::select(\DB::raw($query));
        return view('admin.roles.index_role_user')->with('row',$row);
    }
}