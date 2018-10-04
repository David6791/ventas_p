<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicalAppointmentController extends Controller
{
    public function index_Appointment(){
        $query = "SELECT map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, map.date_appointments, ta.name_type FROM medical_appointments map
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
                        ORDER BY map.id_medical_appointments DESC";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "SELECT * FROM state_appointments";
        $rows1=\DB::select(\DB::raw($query1));
        return view('admin.medical_appointment.index_medical_appointments')->with('row',$rows)->with('row1',$rows1);
    }
    public function create_Medical_Appointment(Request $request){
        return view('admin.create_medical_appointsments');
    }
    public function create_medical_appointments_a(){
        $query = "SELECT mass.id_medical_assignments, us.id, us.name, us.apellidos, sch.id_schedule, sch.name_schedules, tp.nombre_tipo FROM medical_assignments mass
                        INNER JOIN users us
                        ON us.id = mass.id_user
                        INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                        INNER JOIN tipo_usuarios tp
                        ON us.tipo_usuario = tp.id_tipo
                    WHERE state_assignments = 'activo'";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.load_pages.reservation_medic')->with('medics',$rows);
    }
    public function create_date_appointment_a(){
        $query = "select * from schedules order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.load_pages.reservation_date')->with('schedul',$rows);
    }
    public function view_turns_day_date(Request $request){
        //return $request->all();
        $query = "SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_schedul = :id_schedul AND ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map  
                    WHERE date_trunc('day', map.date_appointments) = :date)";
        $rows=\DB::select(\DB::raw($query),array('date'=>$request->fecha,'id_schedul'=>$request->id_turno));
        //return $rows;
        return view('admin.load_pages.reservation_turns_date')->with('turns',$rows);
    }
    public function create_assignments_view_user_medic(Request $request){
        //return $request->all();
        $query = "SELECT * FROM hour_turns ht 
                        INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE id_hour_turn = :id_hour_turn";
        $rows=\DB::select(\DB::raw($query),array('id_hour_turn'=>$request->id));
        $query1 = "SELECT * FROM medical_assignments mass
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                    WHERE id_schedul = :id_schedul";
        $rows1=\DB::select(\DB::raw($query1),array('id_schedul'=>$request->id_turno));
        $datos = $request->fecha;
        $query2 = "SELECT * FROM types_appointsment";
        $rows2=\DB::select(\DB::raw($query2));
        //return $rows1;
        return view('admin.load_pages.load_date_reservation')->with('dates',$datos)->with('turno',$rows)->with('medic',$rows1)->with('types',$rows2);
    }
    public function load_patient_date(Request $request){
        //return $request->all();
        $query = "SELECT * FROM pacientes WHERE ci_paciente = :ci";
        $row = \DB::select(\DB::raw($query),array('ci'=>$request->ci_patient));
        //return $row;
        return view('admin.load_pages.load_dates_patient')->with('dates_patient',$row);
    }
    public function insert_appointsment(Request $request){
        //return $request->all();
        $query = "SELECT id_medical_assignments FROM medical_assignments WHERE id_user = :id_medic AND id_schedul = :id_schedul";
        $row = \DB::select(\DB::raw($query),array('id_medic'=>$request->id_medico, 'id_schedul'=>$request->id_schedule));
        //return $row;
        DB::table('medical_appointments')->insert([
            'id_patient' => $request->id_patient,
            'id_medical_assignments' => $row[0]->id_medical_assignments,
            'id_turn_hour' => $request->id_hour_appointsment,
            'appointment_description' => $request->description_appointment,
            'date_appointments' => $request->date_appointsment,
            'type_appoinment' => $request->type_appointments,
            'emergency' => 'N'
        ]);
        return redirect()->action(
            'MedicalAppointmentController@index_Appointment'
        );
    }
    public function modifi_appointment_save(Request $request){
        //return $request->all();
        /*$query = "select modify_appointments(:id_appointments, :id_state)";
        $row = \DB::select(\DB::raw($query),array('id_appointments'=>$request->id_apoointments, 'id_state'=>$request->id));*/
        $modify_appointments = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_appointments)
            ->update([
                'state_appointments' => $request->id
            ]);
        return redirect()->action(
            'MedicalAppointmentController@index_Appointment'
        );
    }
    public function select_turn_free(Request $request){
        //return $request->all();
        $query = "SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_schedul = :id_schedul AND ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map  
                    WHERE date_trunc('day', map.date_appointments) = :date)";
        $rows=\DB::select(\DB::raw($query),array('date'=>$request->fecha,'id_schedul'=>$request->id_schedule));
        return view('admin.load_pages.load_dates_medic')->with('turns',$rows)->with('date',$request->fecha);
    }
    public function load_dates_medic_patient(Request $request){
        //return $request->all();
        $query = "SELECT mass.id_medical_assignments, sch.id_schedule, sch.name_schedules, us.id, us.name, us.apellidos, tp.nombre_tipo, ht.id_hour_turn, ht.start_time FROM medical_assignments mass
                        INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                        INNER JOIN users us
                        ON us.id = mass.id_user
                        INNER JOIN tipo_usuarios tp
                        ON tp.id_tipo = us.tipo_usuario
                        INNER JOIN hour_turns ht
                        ON ht.id_hour_turn = :id_turn
                    WHERE id_medical_assignments = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_assignments,'id_turn'=>$request->id_turn));
        $query2 = "SELECT * FROM types_appointsment";
        $rows2=\DB::select(\DB::raw($query2));
        //return $rows;
        return view('admin.load_pages.load_dates_medic_patient_form')->with('dates',$rows)->with('date',$request->fecha)->with('types',$rows2)->with('id_assigment',$request->id_assignments);
    }
    public function insert_appointsments_medic(Request $request){
        return $request->all();
        DB::table('medical_appointments')->insert([
            'id_patient' => $request->id_patient,
            'id_medical_assignments' => $request->id_assignments,
            'id_turn_hour' => $request->id_hour_appointsment,
            'appointment_description' => $request->description_appointment,
            'date_appointments' => $request->date_appointsment,
            'type_appoinment' => $request->type_appointments,
            'emergency' => 'N'
        ]);
        return redirect()->action(
            'MedicalAppointmentController@index_Appointment'
        );
    }
}