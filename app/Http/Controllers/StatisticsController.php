<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class StatisticsController extends Controller
{
    public function index_statistics(){
        return view('admin.statistics.index_statistics');
    }
    public function view_day(){
        return view('admin.statistics.load_pages.calendar');
    }
    public function statistic_for_days(Request $request){
        $query = "select dg.name_group, ma.type_disease, count (*) as id_ from medical_appointments ma
                    inner join disease_group dg
                        on dg._id = ma.type_disease
                where ma.date_appointments = :fecha group by ma.type_disease, dg.name_group order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->fecha));
        //return $row;
        return view('admin.statistics.load_pages.statistic_day1')->with('asd',$row);
    }
    public function view_range(){
        return view('admin.statistics.load_pages.calendar_range');
    }
    public function statistic_for_range(Request $request){
        $as = explode('-',($request->fecha), 2);
        //return $as[0];
        $query = "select dg.name_group, ma.type_disease, count (*) as id_ from medical_appointments ma
                    left join disease_group dg
                        on dg._id = ma.type_disease
                where ma.date_appointments BETWEEN :f1 and :f2 group by ma.type_disease, dg.name_group order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('f1'=>$as[0],'f2'=>$as[1]));
        return view('admin.statistics.load_pages.statistic_range')->with('asd',$row);
    }
}