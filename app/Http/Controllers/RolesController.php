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
}