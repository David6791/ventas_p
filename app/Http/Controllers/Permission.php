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
}