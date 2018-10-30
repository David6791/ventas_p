<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class ReportsController extends Controller
{
    public function index_reports(){
        return view('admin.reports.index_reports');
    }
    public function index_reports_general(){
        return view('admin.reports.index_reports_general');
    }
    public function view_day_reports(){
        return view('admin.reports.load_page.calendar');
    }
    public function view_general_reports(){
        return view('admin.reports.load_page.calendar_general');
    }
    public function view_range_general_report(){
        return view('admin.reports.load_page.calendar_range_general');
    }
    public function view_range_reports(){
        return view('admin.reports.load_page.calendar_range_general');
    }
    public function report_for_day(Request $request){
        //return $request->all();
        //este de aqui es el que da para los medicos
        $query = "SELECT * FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
		                    ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments = :fecha AND mass.id_user = :id_user";
        /*$query = "SELECT p.ci_paciente, p.nombres, p.ap_paterno, p.ap_materno,ht.start_time, sapp.name_state_appointments, mapp.appointment_description FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
                            ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments = current_date";*/
        //$rows=\DB::select(\DB::raw($query));          
        $rows=\DB::select(\DB::raw($query),array('fecha'=>$request->fecha,'id_user'=>Auth::user()->id));
        //return (Auth::user()->id);
       /// return $rows;
        return view('admin.reports.load_page.index_list_daily')->with('list_daily',$rows);
    }
    public function view_list_report_month(){
        return view('reports.insert_date_range');
    }
    public function ver_info_report_ranges(Request $request){
        //return $request->all();
        $as = explode('-',($request->fecha), 2);
        $query = "SELECT p.ci_paciente, p.nombres, p.ap_paterno, p.ap_materno,ht.start_time, sapp.name_state_appointments, mapp.appointment_description FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
                            ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments BETWEEN :date_start AND :date_end AND mass.id_user = :id_user";
        //$rows=\DB::select(\DB::raw($query));            
        $rows=\DB::select(\DB::raw($query),array('date_start'=>$as[0],'date_end'=>$as[1],'id_user'=>Auth::user()->id));
        //return $rows;
        //return (Auth::user()->id);
        $var1 = [$as[0],$as[1]];
        //return $var1;
        return view('admin.reports.load_page.index_list_range_dates')->with('list_daily',$rows)->with('dates',$var1);
    }
    public function ver_info_report_general(Request $request){
        $query = "SELECT p.ci_paciente, concat(p.nombres, ' ', p.ap_paterno, ' ', p.ap_materno) pac, ht.start_time, sapp.name_state_appointments, concat(us.name, ' ', us.apellidos) doc FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
                            ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments = :fecha";
        $rows=\DB::select(\DB::raw($query),array('fecha'=>$request->fecha));
        //return $rows;
        return view('admin.reports.load_page.index_list_attentions_full_users')->with('list_daily',$rows);
    }
    public function view_list_report_range_daily_all(){
        return view('reports.insert_date_range_full');
    }
    public function ver_info_report_range_full(Request $request){
        //return $request->all();
        $as = explode('-',($request->fecha), 2);
        $query = "SELECT p.ci_paciente, p.nombres, p.ap_paterno, p.ap_materno,ht.start_time, sapp.name_state_appointments, mapp.appointment_description, mapp.date_appointments FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
                            ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments BETWEEN :date_start AND :date_end";
        //$rows=\DB::select(\DB::raw($query));            
        $rows=\DB::select(\DB::raw($query),array('date_start'=>$as[0],'date_end'=>$as[1]));
        //return $rows;
        //return (Auth::user()->id);
        $var1 = [$as[0], $as[1]];
        //return $var1;
        return view('admin.reports.load_page.index_list_range_dates_full_users')->with('list_daily',$rows)->with('dates',$var1);
    }
}