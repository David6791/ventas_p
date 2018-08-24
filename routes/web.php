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
  /* Edit roles */
Route::post('/create_rol', 'Role@create_role');

Route::get('/index_roles_roles', 'Role@index_roles_roles');

/* Rutas para los Permisos */
Route::get('/index_permission', 'Permission@index_permission');