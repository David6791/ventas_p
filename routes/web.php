<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|ASD
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['register' => false ]);



Route::get('qrLogin', ['uses' => 'QrLoginController@index']);
Route::post('qrLogin', ['uses' => 'QrLoginController@checkUser']);
Route::get('my-qrcode', ['uses' => 'QrLoginController@ViewUserQrCode']);
Route::post('qrLogin-autogenerate', ['uses' => 'QrLoginController@QrAutoGenerate']);

Route::get('/home', 'HomeController@index')->name('home');
/* Rutas para Roles */



/*Route::post('/load_dates_edit_rol', function () {
  return 'ito';
});*/
Route::group(['middleware' => 'auth' ], function(){
    Route::get('/index_role', 'Role@index_role');

    //Route::get('/index_role', 'Role@index_role')->middleware('admin');


    Route::post('/load_dates_edit_rol', 'RolesController@load_dates_edit_roles');
    Route::post('/edit_role', 'RolesController@save_edit_roles');
    Route::post('/delete_role', 'RolesController@delete_roles');
      /* Edit roles */
    Route::post('/create_rol', 'Role@create_role');

    Route::get('/index_roles_roles', 'Role@index_roles_roles');

    /* Rutas para los Permisos */
    Route::get('/index_permission', 'Permission@index_permission');
    Route::post('/create_permission', 'PermissionController@create_permission');
    Route::post('/load_dates_edit_permission', 'PermissionController@load_dates_edit_permission');
    Route::post('/edit_permission', 'PermissionController@edit_permission');
    Route::post('/delete_permission', 'PermissionController@delete_permission');

    Route::post('/load_dates_roles_users', 'UserRoleController@load_dates_roles_users');


    /* Agregar y eliminar roles de usuario */
    Route::post('/add_role_user', 'UserRoleController@add_role_user');
    Route::post('/load_dates_view_rol', 'UserRoleController@load_dates_view_rol');


    /* Rutas para la asignacion de permisos a los roles */
    Route::get('/index_roles_permission', 'Permission@index_roles_permission');
    Route::post('/load_dates_view_permisos', 'Permission@load_dates_view_permisos');
    Route::post('/load_dates_roles_permission', 'Permission@load_dates_roles_permission');
    Route::post('/add_permissions_roles', 'Permission@add_permissions_roles');


    /* Rutas para administrar usuarios  */
    Route::get('/index_medics', 'UsersController@index_medics');
    Route::post('/create_medics', 'UsersController@create_medics');
    Route::post('/add_user_medic', 'UsersController@add_user_medics');
    Route::post('/verUsuarios', 'UsersController@verUsuarios');
    Route::post('update1/{id}', 'UsersController@update1');
    Route::post('/darBajaUser', 'UsersController@baja_user');
    Route::post('/charge_specialty_b','UsersController@charge_specialty_b');

    Route::get('/view_perfil','UsersController@view_perfil');

    Route::get('/form_users','UsersController@form_users');




    /* Rutas para administrar Pacientes */
    Route::get('/index_patients','PatientsController@index_patients');
    Route::get('/form_patients','PatientsController@form_patients');
    Route::post('/store_patients', 'PatientsController@store_patient');
    Route::post('/load_dates_patient_edit', 'PatientsController@load_dates_patient_edit');
    Route::post('/load_dates_medic_edit_patient', 'PatientsController@load_dates_medic_edit_patient');
    Route::post('/edit_date_medic_patient', 'PatientsController@edit_date_medic_patient');
    Route::post('/load_dates_edit_pat_patient', 'PatientsController@load_dates_edit_pat_patient');
    Route::post('/edit_pat_patient', 'PatientsController@edit_pat_patient');
    Route::post('/edit_dates_patients_form', 'PatientsController@edit_dates_patients_form');



    Route::get('/index_schedules', 'SchedulesController@index_schedules');
    Route::post('/darBajaSchedules', 'SchedulesController@darBajaSchedule');
    Route::post('/edit_Schedules', 'SchedulesController@edit_Schedule');
    Route::post('/create_schedules','SchedulesController@create_Schedules');
    Route::post('/save_schedules', 'SchedulesController@save_Schedule');


    /* Rutas de Asignacion de Horarios a los Usuarios */
    Route::get('/index_assignment','AssignmentsController@index_Assignments');
    Route::post('/create_assignments','AssignmentsController@create_Assignments');
    Route::post('/edit_Assignments','AssignmentsController@edit_Assignment');
    Route::post('/view_Assignments','AssignmentsController@view_Assignment');
    Route::post('/save_edit_assignments','AssignmentsController@save_edit_assignment');

    /* Rutas para Administrar datos del sistema */
    Route::get('/index_pathologies','ManageDatesController@index_pathologie');
    Route::post('/create_phatologies','ManageDatesController@create_phatologies');
    Route::post('/edit_patologies_charge','ManageDatesController@edit_patologies_charge');

    Route::post('/edit_phatologies','ManageDatesController@edit_phatologies');
    Route::post('/darBajaPatologie','ManageDatesController@darBajaPatologie');

    Route::get('/index_dates_register','ManageDatesController@index_dates_register');

    Route::post('/darBajaDates_register','ManageDatesController@darBajaDates_register');

    Route::post('/edit_date_register_functions','ManageDatesController@edit_date_register_functions');


    Route::post('/edit_dates_register','ManageDatesController@edit_dates_register');

    Route::post('/create_date_register','ManageDatesController@create_date_register');



    Route::get('/index_medical_dates','ManageDatesController@index_medical_date');
    Route::post('/create_medical_dates','ManageDatesController@create_medical_date');
    Route::post('/edit_medical_charge','ManageDatesController@edit_medical_charge');

    Route::post('/edit_medical_dates','ManageDatesController@edit_medical_dates');

    /* rutas para especialidades */
    Route::get('/index_especialidades', 'SpecialtiesController@index_especialidad');
    Route::post('/crear_especialidad', 'SpecialtiesController@crear_especialidad');
    Route::post('/darBajaSpecialtys', 'SpecialtiesController@darBajaSpecialty');
    Route::post('/editSpecialties', 'SpecialtiesController@editSpecialtie');
    Route::post('/saveSpecialties', 'SpecialtiesController@saveSpecialtie');

    Route::get('/index_data_medical_appointments','ManageDatesController@index_data_medical_appointment');
    Route::get('/index_register_data_medical_appointments','ManageDatesController@index_register_data_medical_appointment');
    Route::post('/get_BajaDatemedics','ManageDatesController@get_BajaDatemedics');


    /* Rutas para los examenes medicos */

    Route::get('/index_examen_medic','MedicalExamController@index_examn_medic');

    Route::post('/create_medical_exam','MedicalExamController@create_medical_exam');

    Route::post('/edit_medical_exam_charge','MedicalExamController@edit_medical_exam_charge');

    Route::post('/low_exam_medic','MedicalExamController@low_exam_medic');

    Route::post('/edit_medical_exam','MedicalExamController@edit_medical_exam');



    /* Ver Historiales Medicos */
    Route::get('/view_medical_record','MedicRecordsController@view_medical_record');
    Route::post('/load_dates_record_medic_full','MedicRecordsController@load_dates_record_medic_full');
    Route::post('/load_dates_record_medic_full_appoinment','MedicRecordsController@load_dates_record_medic_full_appoinment');

    /* Rutas para administrar citas medicas */
    Route::get('/view_medical_appointment','MedicalAppointmentController@index_Appointment');

    Route::get('/create_medical_appointment','MedicalAppointmentController@create_Medical_Appointment');

    Route::get('/view_list_appinments','MedicalAppointmentController@view_list_appinments');



    /* insertar datos de una cita medica */
    Route::post('/insert_appointsments','MedicalAppointmentController@insert_appointsment');

    Route::post('/modifi_appointments_save','MedicalAppointmentController@modifi_appointment_save');


    /* Rutas para poder imprimir lista para la atencion diaria */
    Route::get('/view_list_print_list','MedicalAppointmentController@view_list_print_list');

    /* Rutas para escoger metodo cita medica */
    Route::get('/create_medical_appointments','MedicalAppointmentController@create_medical_appointments_a');
    Route::get('/create_date_appointments','MedicalAppointmentController@create_date_appointment_a');


    Route::post('/view_turns_day_date','MedicalAppointmentController@view_turns_day_date');

    Route::post('/create_assignments_view_user_medics','MedicalAppointmentController@create_assignments_view_user_medic');


    /* Para agregar los datos del paciente al formulario de registro */
    Route::post('/load_patient_dates','MedicalAppointmentController@load_patient_date');





    /* Cita con Medico disponible */
    Route::post('/select_turns_free','MedicalAppointmentController@select_turn_free');
    Route::post('/load_dates_medic_patients','MedicalAppointmentController@load_dates_medic_patient');
    Route::post('/insert_appointsments_medics','MedicalAppointmentController@insert_appointsments_medic');


    /* Rutas para todo Emergencias */
    Route::get('/view_emergency','EmergenciesController@index_emergency');

    Route::post('/search_patients','EmergenciesController@search_patient');

    Route::post('/store_emergencies','EmergenciesController@store_emergency');


    /* Rutas para la atencion de Citas Medicas */
    Route::get('/view_attention_lists','AttentionsController@view_attention_list');

    Route::post('/start_appointment_date','AttentionsController@start_appointment_dates');
    Route::post('/save_dates_appoinments_dates','AttentionsController@save_dates_appoinments_date');
    Route::post('/load_medicine_table','AttentionsController@load_medicine_table');
    Route::post('/save_dates_treatment','AttentionsController@save_dates_treatment');
    Route::post('/store_patients_transfer','AttentionsController@store_patients_transfer');
    Route::post('/end_medical_appointment','AttentionsController@end_medical_appointment');
    Route::get('/view_attention_lists_full_medic','AttentionsController@view_attention_lists_full_medic');



    Route::post('/load_dates_appoinments','AttentionsController@load_dates_appoinment');

    Route::post('/load_dates_filiation_full','AttentionsController@load_dates_filiation_full');


    /* Ruta para guardar datos de examen medico de un paciente. */
    Route::post('/register_medical_exam','AttentionsController@register_medical_exam');

    /* Para completar los datos de los pacientes. */
    Route::post('/filiation_completing', 'PatientsController@filiation_completing');

    Route::post('/add_date_new_medic_url', 'PatientsController@add_date_new_medic_url');

    Route::post('/completing_dates_patient', 'PatientsController@completing_dates_patient');

    Route::post('/delete_dates_medic_patient', 'PatientsController@delete_dates_medic_patient');

    Route::post('/update_patients_dates', 'PatientsController@update_patients_dates');

    Route::post('/charge_depa_b','PatientsController@charge_depa_b');

    Route::post('/charge_provincia','PatientsController@charge_provincia');

    Route::post('/charge_localidad','PatientsController@charge_localidad');



    /* Rutas para las estadisticas del Policlinico */
    Route::get('/index_statistics', 'StatisticsController@index_statistics');
    Route::post('/view_day', 'StatisticsController@view_day');

    Route::post('/view_range', 'StatisticsController@view_range');

    Route::post('/statistic_for_range', 'StatisticsController@statistic_for_range');
    Route::post('/statistic_for_day', 'StatisticsController@statistic_for_days');

    Route::get('/index_statistics_medics', 'StatisticsController@index_statistics_medics');

    Route::post('/load_datas_graphic', 'StatisticsController@load_datas_graphic');
    Route::post('/load_datas_graphic_da', 'StatisticsController@load_datas_graphic_da');

    Route::post('/url_statistics_medics', 'StatisticsController@url_statistics_medics');

    Route::post('/load_datas_graphic_da_mdeics', 'StatisticsController@load_datas_graphic_da_mdeics');

    Route::post('/url_statistics_medics_range', 'StatisticsController@url_statistics_medics_range');

    Route::post('/load_datas_graphic_da_mdeics_range', 'StatisticsController@load_datas_graphic_da_mdeics_range');









    /* Rutas para las grupos de enfermedades... */

    Route::get('/index_group_disease', 'DiseaseGroupController@index_group_disease');

    Route::post('/create_group_disease', 'DiseaseGroupController@create_group_disease');

    Route::post('/baja_group_disease', 'DiseaseGroupController@baja_group_disease');

    Route::post('/load_dates_edit_group', 'DiseaseGroupController@load_dates_edit_group');

    Route::post('/edit_group', 'DiseaseGroupController@edit_group');



    /* Rutas para los Reportes */

    Route::get('/index_reports', 'ReportsController@index_reports');

    Route::get('/index_reports_general', 'ReportsController@index_reports_general');

    Route::post('/view_day_reports', 'ReportsController@view_day_reports');

    Route::post('/report_for_day', 'ReportsController@report_for_day');

    Route::post('/ver_info_report_ranges', 'ReportsController@ver_info_report_ranges');


    Route::post('/view_general_reports', 'ReportsController@view_general_reports');

    Route::post('/view_range_general_report', 'ReportsController@view_range_general_report');

    Route::post('/view_range_reports', 'ReportsController@view_range_reports');

    Route::post('/ver_info_report_general', 'ReportsController@ver_info_report_general');

    Route::post('/ver_info_report_range_full', 'ReportsController@ver_info_report_range_full');


    /* Registro de Examenes Medicos de pacientes con citas medicas que tienen examen medico */
    Route::get('/view_attention_lists_examen', 'AttentionsController@view_attention_lists_examen');

    Route::post('/view_dates_for_exam', 'AttentionsController@view_dates_for_exam');

    Route::post('/completing_examen_medic', 'AttentionsController@completing_examen_medic');

    /* Ruta para editar la reseva de citas medicas */

    Route::post('/load_dates_reserva', 'MedicalAppointmentController@load_dates_reserva');

    Route::post('/view_schedules_free', 'MedicalAppointmentController@view_schedules_free');

    Route::post('/update_appoinment_patient', 'MedicalAppointmentController@update_appoinment_patient');

    Route::get('/reservationEspecialty', 'MedicalAppointmentController@reservationEspecialty');


    /* Rutas para confirmar citas Medicas */
    Route::get('/index_confirm', 'MedicalAppointmentController@index_confirm');

    Route::post('/confirm_function', 'MedicalAppointmentController@confirm_function');



    /* Rutas para antecion Modificado */

    Route::post('/view_patient_dates', 'AttentionsController@view_patient_dates');

    Route::post('/view_attention_patient', 'AttentionsController@view_attention_patient');

    Route::post('/view_cites_previus', 'AttentionsController@view_cites_previus');

    Route::post('/view_treatment_form', 'AttentionsController@view_treatment_form');
    /* Segundo formilario para tratamientos */
    Route::post('/view_treatment_form_2', 'AttentionsController@view_treatment_form_2');

    Route::post('/view_treatment_form_2_add', 'AttentionsController@view_treatment_form_2_add');

    Route::post('/url_form_prescription', 'AttentionsController@url_form_prescription');

    Route::post('/delete_prescription_url', 'AttentionsController@delete_prescription_url');






    Route::post('/view_exam_medic', 'AttentionsController@view_exam_medic');

    Route::post('/vew_transfer_patient', 'AttentionsController@vew_transfer_patient');

    Route::post('/view_end_cite_medic', 'AttentionsController@view_end_cite_medic');


    /* Rutas para crear horarios para los turnos  */
    Route::get('/index_turns', 'SchedulesController@index_turns');

    Route::post('/view_turns_schedul', 'SchedulesController@view_turns_schedul');

    Route::post('/baja_turn', 'SchedulesController@baja_turn');

    Route::post('/save_turn', 'SchedulesController@save_turn');


    /* Rutas para el registro de Medicamentos */
    Route::get('/view_medicines','MedicinesController@index_view_medicines');
    Route::post('/create_medicines','MedicinesController@create_medicine');


    Route::get('/view_stock_medicines','MedicinesController@view_stock_medicine');
    Route::post('/create_stock_medicines','MedicinesController@create_stock_medicines');

    /* Activar edicion para los datos medicos del paciente y de las patologias del paciente */

    Route::get('/view_list_patients','PatientsController@view_list_patients');

    Route::post('/hability_dates_patients','PatientsController@hability_dates_patients');

    /* Rutas para credenciasles de los pacientes */

    Route::get('/view_list_patients_credential','PatientsController@view_list_patients_credential');

    Route::get('/print_credential/{id_}','PatientsController@print_credential');


    Route::get('/view_list_usuarios_credential','UsersController@view_list_usuarios_credential');

    Route::get('/print_credential_user/{id_}','UsersController@print_credential_user');

    Route::get('/ver_historial/{id_}','PatientsController@ver_historial');



    /* reporte de historiales medicos de l;os pacientess */

    Route::get('/print_record_medic/{id_}','PatientsController@print_record_medic');


    /* Para poder ver y Editar el perfil del medico */



    /* Para poder cargar el tipo de examen Medico */
    Route::post('/charge_types_exam_medic','AttentionsController@charge_types_exam_medic');
    Route::post('/charge_form_type_exam_medic','AttentionsController@charge_form_type_exam_medic');
    Route::post('/store_exam_laboratory','AttentionsController@store_exam_laboratory');
});
