<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
    public function create_role(Request $request){
        //return $request->all();
        
        $validatedData = $request->validate([
            'rol' => 'required|max:10',
            'name_rol' => 'required',
            'description_rol' => 'required'
        ]);
        DB::insert('insert into roles (name, display_name, description) values (?, ?, ?)', [
            $request->rol,
            $request->name_rol,
            $request->description_rol
            ]);
        return '$validatedData->fails()';
        /*if ($validatedData->fails())
        {
            return redirect()->back()->withErrors($validatedData->errors());
        }else{
        return 'termino';}*/
        //return $request->all();
    }    
}