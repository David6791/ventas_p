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
        $query = "SELECT * FROM USERS ORDER BY ID";
        $row=\DB::select(\DB::raw($query));
        return view('admin.roles.index_role_user')->with('row',$row);
    }
    public function create_role(Request $request){
        //return $request->all();
        
        $validatedData = $request->validate([
            'rol' => 'required|max:20',
            'name_rol' => 'required',
            'description_rol' => 'required'
        ]);
        DB::insert('insert into roles (name, display_name, description) values (?, ?, ?)', [
            $request->rol,
            $request->name_rol,
            $request->description_rol
            ]);
        return redirect()->action(
            'Role@index_role'                   
        );
        /*if ($validatedData->fails())
        {
            return redirect()->back()->withErrors($validatedData->errors());
        }else{
        return 'termino';}*/
        //return $request->all();
    }    
}