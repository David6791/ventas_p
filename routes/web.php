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






