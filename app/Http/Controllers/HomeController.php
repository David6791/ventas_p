<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::where('name', '=', 'Joaquin Manrique')->first();
        //return dd($user->hasRole('super_admin'));
        //return $user;
        $fecha=date("m-d-Y");
        ///return $fecha;
        $query1 = "SELECT count(*) FROM medical_appointments mapp
                	INNER JOIN medical_assignments mass
                		ON mass.id_medical_assignments = mapp.id_medical_assignments
                WHERE mapp.emergency = 'N' AND mapp.state_appointments = 3 AND mass.id_user = :id AND date_trunc('day', mapp.date_appointments) = :day";
        $rows1=\DB::select(\DB::raw($query1),array('id'=>Auth::user()->id,'day'=>$fecha));
        //Citas medicas no atendidas
        $q_no_ate = "SELECT count(*) FROM medical_appointments mapp
                	INNER JOIN medical_assignments mass
                		ON mass.id_medical_assignments = mapp.id_medical_assignments
                WHERE mapp.emergency = 'N' AND mapp.state_appointments = 3 AND mass.id_user = :id AND date_trunc('day', mapp.date_appointments) < :day";
        $r_no_ate=\DB::select(\DB::raw($q_no_ate),array('id'=>Auth::user()->id,'day'=>$fecha));
        //return $rows;
        $query = "SELECT count(*) FROM medical_appointments WHERE emergency = 'S' AND state_appointments = 3";
        $rows=\DB::select(\DB::raw($query));
        $emer = "SELECT * FROM medical_appointments mapp
                	INNER JOIN pacientes p
                		  ON p.id_paciente = mapp.id_patient
                    INNER JOIN hour_turns ht
		                  ON ht.id_hour_turn = mapp.id_turn_hour
                WHERE mapp.emergency = 'S' AND mapp.state_appointments = 3
";
        $emergencies_list=\DB::select(\DB::raw($emer));
        //return $rows;
        $resum = "select * from view_list_appoinments(:id_user, :date)";
        $resum_rows=\DB::select(\DB::raw($resum),array('id_user'=>Auth::user()->id,'date'=>$fecha));
        //return $resum_rows;
        $resum_1 = "SELECT pa.ci_paciente, map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, map.date_appointments, map.emergency, map.type_appoinment, ta.name_type FROM medical_appointments map
                            INNER JOIN pacientes pa
                        ON pa.id_paciente = map.id_patient
                            INNER JOIN medical_assignments mass
                        ON mass.id_medical_assignments = map.id_medical_assignments
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                            INNER JOIN hour_turns ht
                        ON ht.id_hour_turn = map.id_turn_hour
                            INNER JOIN state_appointments sap
                        ON sap.id_state_appointments = map.state_appointments
			    INNER JOIN types_appointsment ta
			ON ta.id_type_appointments = map.type_appoinment
                    WHERE  mass.id_user = :id_user AND state_appointments = 1
                        ORDER BY map.emergency desc, map.id_medical_appointments";
        $resum_rows_1=\DB::select(\DB::raw($resum_1),array('id_user'=>Auth::user()->tipo_usuario));
        $resum_1_1 = "SELECT count(*) FROM medical_appointments map
                            INNER JOIN medical_assignments mass
                                ON mass.id_medical_assignments = map.id_medical_assignments
                    WHERE  mass.id_user = :id_user AND state_appointments = 1";
        $resum_rows_1_1=\DB::select(\DB::raw($resum_1_1),array('id_user'=>Auth::user()->tipo_usuario));
        //return $resum_rows_1_1;
        //return $fecha;
        //return $resum_rows;
        return view('home')->with('r_no_ate',$r_no_ate)->with('resum_app_1_1',$resum_rows_1_1)->with('resum_app_1',$resum_rows_1)->with('resum_app',$resum_rows)->with('emergencies',$rows)->with('appointments',$rows1)->with('emergencies_list',$emergencies_list);
    }
}
