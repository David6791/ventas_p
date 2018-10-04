<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Rutas para Roles */
Route::get('/index_role', 'Role@index_role');


/*Route::post('/load_dates_edit_rol', function () {
  return 'ito';
});*/

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


/* Rutas para administrar Pacientes */
Route::get('/index_patients','PatientsController@index_patients');
Route::get('/form_patients','PatientsController@form_patients');
Route::post('/store_patients', 'PatientsController@store_patient');
Route::post('/load_dates_patient_edit', 'PatientsController@load_dates_patient_edit');
Route::post('/load_dates_medic_edit_patient', 'PatientsController@load_dates_medic_edit_patient');
Route::post('/edit_date_medic_patient', 'PatientsController@edit_date_medic_patient');
Route::post('/load_dates_edit_pat_patient', 'PatientsController@load_dates_edit_pat_patient');
Route::post('/edit_pat_patient', 'PatientsController@edit_pat_patient');



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


Route::post('/edit_medical_exam','MedicalExamController@edit_medical_exam');



/* Ver Historiales Medicos */
Route::get('/view_medical_record','MedicRecordsController@view_medical_record');
Route::post('/load_dates_record_medic_full','MedicRecordsController@load_dates_record_medic_full');
Route::post('/load_dates_record_medic_full_appoinment','MedicRecordsController@load_dates_record_medic_full_appoinment');

/* Rutas para administrar citas medicas */
Route::get('/view_medical_appointment','MedicalAppointmentController@index_Appointment');

Route::get('/create_medical_appointment','MedicalAppointmentController@create_Medical_Appointment');


/* insertar datos de una cita medica */
Route::post('/insert_appointsments','MedicalAppointmentController@insert_appointsment');

Route::post('/modifi_appointments_save','MedicalAppointmentController@modifi_appointment_save');
