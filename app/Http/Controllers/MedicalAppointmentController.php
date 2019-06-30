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
        if(\Entrust::hasRole('citas_medicas')){
        //return Auth::user()->tipo_usuario;
        if( Auth::user()->tipo_usuario == 1 || Auth::user()->tipo_usuario == 3 ){
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
                        ORDER BY map.date_appointments DESC, map.id_medical_appointments DESC";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "SELECT * FROM state_appointments";
        $rows1=\DB::select(\DB::raw($query1));
        //return $rows1;
        return view('admin.medical_appointment.index_medical_appointments')->with('row',$rows)->with('row1',$rows1);
        }else{
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
                        where mass.id_user = :id or mass.id_user = 10
                            ORDER BY map.date_appointments DESC, map.id_medical_appointments DESC";
            $rows=\DB::select(\DB::raw($query),array('id'=>Auth::user()->id));
            $query1 = "SELECT * FROM state_appointments";
            $rows1=\DB::select(\DB::raw($query1));
            //return $rows;
            return view('admin.medical_appointment.index_medical_appointments')->with('row',$rows)->with('row1',$rows1);
        }
        }else{
        return view('error.user_not_permission');
        }
    }
    public function create_Medical_Appointment(Request $request){
        if((\Entrust::hasRole('citas_medicas') or (\Entrust::hasRole('panel_control')))){
        return view('admin.medical_appointment.create_medical_appointsments');
        }else{
            return view('error.user_not_permission');
        }
    }
    public function create_medical_appointments_a(){
        $query = "SELECT mass.id_medical_assignments, us.id, us.name, us.apellidos, sch.id_schedule, sch.name_schedules, tp.nombre_tipo FROM medical_assignments mass
                        INNER JOIN users us
                        ON us.id = mass.id_user
                        INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                        INNER JOIN tipo_usuarios tp
                        ON us.tipo_usuario = tp.id_tipo
                    WHERE state_assignments = 'activo' AND mass.id_schedul != 16 AND us.estado_user != 2 AND sch.id_user_espe = 0";
        $rows=\DB::select(\DB::raw($query));
        //return $rows;
        return view('admin.medical_appointment.load_pages.reservation_medic')->with('medics',$rows);
    }
    public function create_date_appointment_a(){
        $query = "SELECT * FROM schedules  sch
                        INNER JOIN medical_assignments mass
                            ON mass.id_schedul = sch.id_schedule
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        WHERE mass.state_assignments = 'activo' AND sch.id_schedule != 16
                    ORDER BY sch.id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.medical_appointment.load_pages.reservation_date')->with('schedul',$rows);
    }
    public function view_turns_day_date(Request $request){
        //return $request->all();
        $query = "SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_schedul = :id_schedul AND ht.state = 'activo' AND ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map
                    WHERE date_trunc('day', map.date_appointments) = :date) ORDER BY ht.start_time";
        $rows=\DB::select(\DB::raw($query),array('date'=>$request->fecha,'id_schedul'=>$request->id_turno));
        //return $rows;
        return view('admin.medical_appointment.load_pages.reservation_turns_date')->with('turns',$rows);
    }
    public function create_assignments_view_user_medic(Request $request){
        //return $request->all();
        $query = "SELECT * FROM hour_turns ht
                        INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE id_hour_turn = :id_hour_turn AND ht.state = 'activo' ";
        $rows=\DB::select(\DB::raw($query),array('id_hour_turn'=>$request->id));
        $query1 = "SELECT * FROM medical_assignments mass
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                    WHERE id_schedul = :id_schedul AND mass.state_assignments = 'activo'";
        $rows1=\DB::select(\DB::raw($query1),array('id_schedul'=>$request->id_turno));
        $datos = $request->fecha;
        $query2 = "SELECT * FROM types_appointsment";
        $rows2=\DB::select(\DB::raw($query2));
        //return $rows1;
        return view('admin.medical_appointment.load_pages.load_date_reservation')->with('dates',$datos)->with('turno',$rows)->with('medic',$rows1)->with('types',$rows2);
    }
    public function load_patient_date(Request $request){
        //return $request->all();
        //load_patient_date

        $query = "SELECT * FROM pacientes WHERE ci_paciente = :ci";
        $row = \DB::select(\DB::raw($query),array('ci'=>$request->ci_patient));
        //return ('asdasdas');
        if( empty($row)){
            //return "asdasd";
            //return view('admin.medical_appointment.fast_register');
            return view('admin.medical_appointment.load_pages.error_filiation');
        }else{
            return view('admin.medical_appointment.load_pages.load_dates_patient')->with('dates_patient',$row);
        }

    }
    public function insert_appointsment(Request $request){
        //return $request->all();
        $validatedData = $request->validate([
            'ci_paciente' => 'unique:pacientes|required|max:13|min:7|alpha_dash',
            'nombre' => 'required|max:30',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
        ]);
        $query = "SELECT id_medical_assignments FROM medical_assignments WHERE id_user = :id_medic AND id_schedul = :id_schedul";
        $row = \DB::select(\DB::raw($query),array('id_medic'=>$request->id_medico, 'id_schedul'=>$request->id_schedule));
        //return $row;
        if( ($request->id_patient)){
            DB::table('medical_appointments')->insert([
                'id_patient' => $request->id_patient,
                'id_medical_assignments' => $row[0]->id_medical_assignments,
                'id_turn_hour' => $request->id_hour_appointsment,
                'appointment_description' => $request->description_appointment,
                'date_appointments' => $request->date_appointsment,
                'type_appoinment' => $request->type_appointments,
                'state_appointments' => 3,
                'emergency' => 'N',
                'type_disease' => 1
            ]);
        }else{
            DB::table('pacientes')->insert([
                'nombres' => $request->nombre,
                'ap_paterno' => $request->apellido_paterno,
                'ap_materno' => $request->apellido_materno,
                'ci_paciente' => $request->ci_paciente,
                'filiacion_completa' => 'n'
            ]);
            $query = "select id_paciente from pacientes where ci_paciente = :ci ";
            $rows=\DB::select(\DB::raw($query),array('ci'=>$request->ci_paciente));
            //return $rows;
            DB::table('medical_appointments')->insert([
                'id_patient' => $rows[0]->id_paciente,
                'id_medical_assignments' => $row[0]->id_medical_assignments,
                'id_turn_hour' => $request->id_hour_appointsment,
                'appointment_description' => $request->description_appointment,
                'date_appointments' => $request->date_appointsment,
                'type_appoinment' => $request->type_appointments,
                'state_appointments' => 3,
                'emergency' => 'N',
                'type_disease' => 1
            ]);
        }
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
        $id = "SELECT id_schedul FROM medical_assignments WHERE id_medical_assignments = :id";
        $id_sc = \DB::select(\DB::raw($id),array('id'=>$request->id_schedule));
        //return $id_sc;
        $query = "SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_schedul = :id_schedul AND ht.state = 'activo' AND ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map
                    WHERE date_trunc('day', map.date_appointments) = :date) order by ht.start_time";
        $rows=\DB::select(\DB::raw($query),array('date'=>$request->fecha,'id_schedul'=>$id_sc[0]->id_schedul));
        //return $rows;
        return view('admin.medical_appointment.load_pages.load_dates_medic')->with('turns',$rows)->with('date',$request->fecha);
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
        return view('admin.medical_appointment.load_pages.load_dates_medic_patient_form')->with('dates',$rows)->with('date',$request->fecha)->with('types',$rows2)->with('id_assigment',$request->id_assignments);
    }
    public function insert_appointsments_medic(Request $request){
        /*$validatedData = $request->validate([
            'ci_paciente' => 'required|max:13|min:7',
            'nombre' => 'required|max:30',
            'apellido_paterno' => 'required|max:30',
            'apellido_materno' => 'required|max:30',
        ]);*/
        //return $request->all();
        if( ($request->id_patient)){
            DB::table('medical_appointments')->insert([
                'id_patient' => $request->id_patient,
                'id_medical_assignments' => $request->id_assignments,
                'id_turn_hour' => $request->id_hour_appointsment,
                'appointment_description' => $request->description_appointment,
                'date_appointments' => $request->date_appointsment,
                'type_appoinment' => $request->type_appointments,
                'state_appointments' => 3,
                'emergency' => 'N',
                'type_disease' => 1
            ]);
        }else{
            DB::table('pacientes')->insert([
                'nombres' => $request->nombre,
                'ap_paterno' => $request->apellido_paterno,
                'ap_materno' => $request->apellido_materno,
                'ci_paciente' => $request->ci_paciente,
                'filiacion_completa' => 'n'
            ]);
            $query = "select id_paciente from pacientes where ci_paciente = :ci ";
            $rows=\DB::select(\DB::raw($query),array('ci'=>$request->ci_paciente));
            //return $rows;
            DB::table('medical_appointments')->insert([
                'id_patient' => $rows[0]->id_paciente,
                'id_medical_assignments' => $request->id_assignments,
                'id_turn_hour' => $request->id_hour_appointsment,
                'appointment_description' => $request->description_appointment,
                'date_appointments' => $request->date_appointsment,
                'type_appoinment' => $request->type_appointments,
                'state_appointments' => 3,
                'emergency' => 'N',
                'type_disease' => 1
            ]);
        }

        return redirect()->action(
            'MedicalAppointmentController@index_Appointment'
        );
    }
    public function view_list_appinments(){
        if(\Entrust::hasRole('editar_reserva')){
            if( Auth::user()->tipo_usuario == 1 or Auth::user()->tipo_usuario == 3 ){
                $query = "select mep.id_medical_appointments, mep.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, mep.date_appointments, ta.name_type from medical_appointments mep
                                inner join pacientes pa
                                    on pa.id_paciente = mep.id_patient
                                inner join medical_assignments mass
                                    on mass.id_medical_assignments = mep.id_medical_assignments
                                inner join users us
                                    on us.id = mass.id_user
                                inner join schedules sch
                                    on sch.id_schedule = mass.id_schedul
                                inner join hour_turns ht
                                    on ht.id_hour_turn = mep.id_turn_hour
                                inner join types_appointsment ta
                                    on mep.type_appoinment = ta.id_type_appointments
                                inner join state_appointments sap
                                    on sap.id_state_appointments = mep.state_appointments
                            --where mep.state_appointments != 1 and mep.emergency != 'S' and mep.state_appointments != 3
                            where mep.state_appointments != 1 and mep.emergency != 'S'";
                $rows=\DB::select(\DB::raw($query));
                return view('admin.medical_appointment.load_pages.edit_reservations')->with('medics',$rows);
            }else{
                $query = "select mep.id_medical_appointments, mep.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, mep.date_appointments, ta.name_type from medical_appointments mep
                                inner join pacientes pa
                                    on pa.id_paciente = mep.id_patient
                                inner join medical_assignments mass
                                    on mass.id_medical_assignments = mep.id_medical_assignments
                                inner join users us
                                    on us.id = mass.id_user
                                inner join schedules sch
                                    on sch.id_schedule = mass.id_schedul
                                inner join hour_turns ht
                                    on ht.id_hour_turn = mep.id_turn_hour
                                inner join types_appointsment ta
                                    on mep.type_appoinment = ta.id_type_appointments
                                inner join state_appointments sap
                                    on sap.id_state_appointments = mep.state_appointments
                            --where mep.state_appointments != 1 and mep.emergency != 'S' and mep.state_appointments != 3
                            where mep.state_appointments != 1 and mep.emergency != 'S' and mass.id_user = :id";
                $rows=\DB::select(\DB::raw($query),array('id'=>Auth::user()->id));
                return view('admin.medical_appointment.load_pages.edit_reservations')->with('medics',$rows);
            }
        }else{
            return view('error.user_not_permission');
        }
    }
    public function load_dates_reserva(Request $request){
        //return $request->all();
        $query = "SELECT * FROM schedules  sch
                        INNER JOIN medical_assignments mass
                            ON mass.id_schedul = sch.id_schedule
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        WHERE mass.state_assignments = 'activo' AND sch.id_schedule != 16
                    ORDER BY sch.id_schedule";
        $rows=\DB::select(\DB::raw($query));
        $var1 = [$request->id];
        return view('admin.medical_appointment.load_pages.edit_reservations_dates')->with('schedules',$rows)->with('id',$var1);
    }
    public function view_schedules_free(Request $request){
        //return $request->all();
        $query1 = "SELECT id_schedul FROM medical_assignments where id_medical_assignments = :ids";
        $rows1=\DB::select(\DB::raw($query1),array('ids'=>$request->schedul));
        //return $rows1;
        $query = "SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_schedul = :id_schedul AND ht.state = 'activo' AND ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map
                    WHERE date_trunc('day', map.date_appointments) = :date) ORDER BY ht.id_hour_turn";
        $rows=\DB::select(\DB::raw($query),array('date'=>$request->fecha,'id_schedul'=>$rows1[0]->id_schedul));
        //return '$rows';
        $var1 = [$request->fecha, $request->schedul,$request->id];
        return view('admin.medical_appointment.load_pages.reservation_turns_date_edit')->with('turns',$rows)->with('dat',$var1);
    }
    public function update_appoinment_patient(Request $request){
        //return $request->all();
        $modi = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_ap)
            ->update([
                'id_medical_assignments' => $request->id_turno,
                'id_turn_hour' => $request->id,
                'date_appointments' => $request->fecha
            ]);
        //return $modi;
        return redirect()->action(
            'MedicalAppointmentController@view_list_appinments'
        );
    }
    public function index_confirm(){
        if(\Entrust::hasRole('confirmar_citas')){
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
                    WHERE map.state_appointments != 1 AND map.emergency = 'N'
                        ORDER BY map.id_medical_appointments DESC";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "SELECT * FROM state_appointments";
        $rows1=\DB::select(\DB::raw($query1));
        return view('admin.medical_appointment.index_confir_appointments')->with('row',$rows)->with('row1',$rows1);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function confirm_function(Request $request){
        //return $request->all();
        $modi = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_appointments)
            ->update([
                'state_appointments' => 3
            ]);
        return redirect()->action(
            'MedicalAppointmentController@index_confirm'
        );
    }
    public function view_list_print_list(){
        if(\Entrust::hasRole('citas_medicas')){
        $query = "SELECT * FROM medical_assignments mass
                	INNER JOIN users us
                		ON us.id = id_user
                WHERE mass.state_assignments = 'activo' AND mass.id_user != 10 and us.estado_user != 2 ORDER BY us.id";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.medical_appointment.partials.index_lists_print')->with('dates',$rows);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function reservationEspecialty(){
        $query = "SELECT mass.id_medical_assignments, us.id, us.name, us.apellidos, sch.id_schedule, sch.name_schedules, tp.nombre_tipo FROM medical_assignments mass
                        INNER JOIN users us
                        ON us.id = mass.id_user
                        INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                        INNER JOIN tipo_usuarios tp
                        ON us.tipo_usuario = tp.id_tipo
                    WHERE state_assignments = 'activo' AND mass.id_schedul != 16 AND us.estado_user != 2 AND sch.id_user_espe = 1";
        $rows=\DB::select(\DB::raw($query));
        //return $rows;
        return view('admin.medical_appointment.load_pages.reservation_specialty')->with('medics',$rows);
    }
}
