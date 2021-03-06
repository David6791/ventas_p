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
        if(\Entrust::hasRole('estadisticas')){
        return view('admin.statistics.index_statistics');
        }else{
            return view('error.user_not_permission');
        }
    }
    public function view_day(){
        return view('admin.statistics.load_pages.calendar');
    }
    public function statistic_for_days(Request $request){
        //return $request->all();


        //return $row;
        $query = "select dg.abbreviation,dg.color,dg.name_group, ma.type_disease, count (*) as id_ from medical_appointments ma
                    inner join disease_group dg
                        on dg._id = ma.type_disease
                where ma.type_disease != 1 and ma.date_appointments = :fecha group by dg.abbreviation, dg,color,ma.type_disease, dg.name_group order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->fecha));
        //return $row;
        //return $labels  = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $labels = [];
        $cant = [];
        foreach ($row as $as) {
            $labels[] = $as->name_group;
            $cant[] = $as->id_;
        }
        //return $var=['datos'=>$row, 'datos1'=>$rows1, 'id'=>$request->id_patient];
        $asd1 = ['rows'=>$row,'label'=>$labels,'can'=>$cant];
        return view('admin.statistics.load_pages.statistic_day1')->with('asd',$row)->with('dat',$request->fecha);
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
                where ma.type_disease != 1 and ma.type_disease is not NULL  and ma.date_appointments BETWEEN :f1 and :f2 group by ma.type_disease, dg.name_group order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('f1'=>$as[0],'f2'=>$as[1]));
        return view('admin.statistics.load_pages.statistic_range')->with('asd',$row);
    }
    public function index_statistics_medics(){
        if(\Entrust::hasRole('estadisticas')){

        $query = "SELECT us.id, us.name,us.apellidos FROM medical_assignments mass
                	INNER JOIN users us
                		ON us.id = mass.id_user
                WHERE state_assignments = 'activo'";
        $row=\DB::select(\DB::raw($query));
        return view('admin.statistics.index_statistics_medics_menu')->with('medics',$row);
    }else{
        return view('error.user_not_permission');
    }
    }
    public function load_datas_graphic(Request $request){
        //return $request->all();
        $query = "select dg.name_group, ma.type_disease, count (*) as id_ from medical_appointments ma
                    inner join disease_group dg
                        on dg._id = ma.type_disease
                where ma.type_disease != 1 and ma.date_appointments = :fecha group by ma.type_disease, dg.name_group order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->date));
        //return $row;
        //return $labels  = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $labels = [];
        $cant = [];
        foreach ($row as $as) {
            $labels[] = $as->name_group;
            $cant[] = $as->id_;
        }
        //return $var=['datos'=>$row, 'datos1'=>$rows1, 'id'=>$request->id_patient];
        return $asd1 = ['label'=>$labels,'can'=>$cant];
    }
    public function load_datas_graphic_da(Request $request){
        //return $request->all();
        $query = "SELECT count (*) as value,dg.color,dg.color as highlight,dg.name_group as label from medical_appointments ma
                    inner join disease_group dg
                        on dg._id = ma.type_disease
                where ma.type_disease != 1 and ma.date_appointments = :fecha group by ma.type_disease, dg.name_group,dg.color order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->date));

        /*$query = "select dg.name_group, ma.type_disease, count (*) as id_ from medical_appointments ma
                    inner join disease_group dg
                        on dg._id = ma.type_disease
                where ma.type_disease != 1 and ma.date_appointments = :fecha group by ma.type_disease, dg.name_group order by ma.type_disease";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->date));
        //return $row;
        //return $labels  = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $labels = [];
        $cant = [];
        foreach ($row as $as) {
            $labels[] = $as->name_group;
            $cant[] = $as->id_;
        }*/
        //return $var=['datos'=>$row, 'datos1'=>$rows1, 'id'=>$request->id_patient];
        return $row;
        return $asd1 = ['label'=>$labels,'can'=>$cant];
    }
    public function url_statistics_medics(Request $request){
        //return $request->all();
        $query = "SELECT concat(us.name, ' ' ,us.apellidos) as label, count(*) as value,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS color,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS highlight
            		FROM medical_assignments mass
            	INNER JOIN medical_appointments map
            		ON map.id_medical_assignments = mass.id_medical_assignments
            	INNER JOIN users us
            		ON us.id = mass.id_user
            WHERE mass.state_assignments = 'activo' AND map.date_appointments = :fecha AND map.state_appointments = 1 GROUP BY mass.id_user,us.name,us.apellidos";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->date));
        return view('admin.statistics.load_pages.table_medics')->with('medics',$row);
    }
    public function load_datas_graphic_da_mdeics(Request $request){
        //return $request->all();
        $query = "SELECT concat(us.name, ' ' ,us.apellidos) as label, count(*) as value,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS color,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS highlight
            		FROM medical_assignments mass
            	INNER JOIN medical_appointments map
            		ON map.id_medical_assignments = mass.id_medical_assignments
            	INNER JOIN users us
            		ON us.id = mass.id_user
            WHERE mass.state_assignments = 'activo' AND map.date_appointments = :fecha AND map.state_appointments = 1 GROUP BY mass.id_user,us.name,us.apellidos";
        $row=\DB::select(\DB::raw($query),array('fecha'=>$request->date));
        return $row;
    }
    public function url_statistics_medics_range(Request $request){
        //return $request->all();
        $query = "SELECT concat(us.name, ' ' ,us.apellidos) as label, count(*) as value,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS color,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS highlight
            		FROM medical_assignments mass
            	INNER JOIN medical_appointments map
            		ON map.id_medical_assignments = mass.id_medical_assignments
            	INNER JOIN users us
            		ON us.id = mass.id_user
            WHERE mass.state_assignments = 'activo' AND map.date_appointments BETWEEN :f1 AND :f2 AND map.state_appointments = 1 GROUP BY mass.id_user,us.name,us.apellidos";
        $row=\DB::select(\DB::raw($query),array('f1'=>$request->date1,'f2'=>$request->date2));
        return view('admin.statistics.load_pages.table_medics')->with('medics',$row);
    }
    public function load_datas_graphic_da_mdeics_range(Request $request){
        $query = "SELECT concat(us.name, ' ' ,us.apellidos) as label, count(*) as value,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS color,
            	       '#' ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) ||
                    b10_b16(trunc(random() * 255)::INTEGER,2) AS highlight
            		FROM medical_assignments mass
            	INNER JOIN medical_appointments map
            		ON map.id_medical_assignments = mass.id_medical_assignments
            	INNER JOIN users us
            		ON us.id = mass.id_user
            WHERE mass.state_assignments = 'activo' AND map.date_appointments BETWEEN :f1 AND :f2 AND map.state_appointments = 1 GROUP BY mass.id_user,us.name,us.apellidos";
        $row=\DB::select(\DB::raw($query),array('f1'=>$request->date,'f2'=>$request->date1));
        return $row;
    }
}
