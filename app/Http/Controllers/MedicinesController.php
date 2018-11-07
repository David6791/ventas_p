<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicinesController extends Controller
{
    public function index_view_medicines(){
        $query = "select * from medicines";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.medicines.index_medicines')->with('list',$rows);
    }
    public function create_medicine(Request $request){
        DB::table('medicines')->insert([
            'name_medicine' => $request->name_medicine,
            'description_medicine' => $request->medicine_description,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'MedicinesController@index_view_medicines'
        );
    }
    public function view_stock_medicine(){
        $query = "SELECT * FROM stock_medicines sm
                    INNER JOIN medicines m
                        ON sm.id_medicine = m.id_medicines";
        $rows=\DB::select(\DB::raw($query));
        /*$query1 = "SELECT *
                        FROM medicines m
                        WHERE m.id_medicines  NOT IN
                            (
                                SELECT id_medicine 
                                FROM stock_medicines
                                
                            )";*/
        $query1 = "SELECT *
                    FROM medicines m
                    WHERE m.state_medicine = 'activo'";
        $rows1=\DB::select(\DB::raw($query1));
        return view('admin.medicines.index_stock_medicines')->with('list_stock',$rows)->with('list_no_stock',$rows1);
    }
    public function create_stock_medicines(Request $request){
        //return $request->all();
        DB::table('stock_medicines')->insert([
            'id_medicine' => $request->name_medicine,
            'quantity_medicine' => $request->quantity_medicine,
            'date_expiration' => $request->date_expiration,
            'lote'=> $request->numero_lote,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'MedicinesController@view_stock_medicine'
        );
    }
}