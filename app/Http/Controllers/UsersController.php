<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller{
    public function index_medics(){
        $query2 = "SELECT * FROM users us
                    LEFT JOIN estados_usuarios esu
                    ON us.estado_user = esu.id_estados
                    LEFT JOIN tipo_usuarios tu
                    ON tu.id_tipo = us.tipo_usuario ORDER BY id ASC";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.users.index_medics')->with('row',$rows2);
    }
    public function create_medics(Request $request){
        $query = "select * from tipo_usuarios  order by id_tipo asc";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from estados_civil order by id_estado_civil asc";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "select * from especialidades where tipo_usuario = 2 and estado_especialidad = 'Activo' order by id_especialidad asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.users.create_medics')->with('rows',$rows)->with('rows1',$rows1)->with('rows2',$rows2);
    }
    public function add_user_medics(Request $request){
        //return $request->all();
        //$query2 = "SELECT id as id_role FROM roles WHERE user_default = :tipe";
        //$rows2=\DB::select(\DB::raw($query2),array('tipe'=>$request->tipo_usuario));
        //return count($rows2);
        $validatedData = $request->validate([
            'apellido_materno' => 'required|max:20|alpha',
            'apellido_paterno' => 'required|max:20|alpha',
            //'año_egreso' => 'required|max:20',
            'celular' => 'required|max:20',
            'contraseña' => 'required|max:20|between:8,20',
            'direccion' => 'required|max:20',
            //'egreso' => 'required|max:20',
            'lugar_de_nacimiento' => 'required|max:20',
            //'matricula' => 'required|max:20',
            'genero' => 'required',
            'nacionalidad' => 'required|max:20',
            'nombre' => 'required|max:20|alpha',
            'email' => 'unique:users|required|max:20|email',
            'ci' => 'unique:users|required|max:20|alpha_dash', 
            'estado_civil' => 'required|max:20',
            'telefono' => 'required|numeric',
            'tipo_documento' => 'required|max:20',
            'profesion' => 'required|max:20',
        ]);
        DB::table('users')->insert([
            'ci' => $request->ci,
            'tipo_documento' => $request->tipo_documento,
            'name' => $request->nombre,
            'apellidos' => $request->apellido_paterno .' '. $request->apellido_materno,
            'genero' => $request->genero,
            'a_egreso' => $request->año_egreso,
            'egreso' => $request->egreso,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estado_civil' => $request->estado_civil,
            'ocupacion' => $request->ocupacion,
            'nacionalidad' => $request->nacionalidad,
            'localidad' => $request->lugar_de_nacimiento,
            'domicilio' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'ocupacion' => $request->profesion,
            'email' => $request->email,
            'password' => bcrypt($request->contraseña),
            'matricula_medico' => $request->matricula,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        $query2 = "SELECT id as id_user FROM users WHERE ci = :ci";
        $rows=\DB::select(\DB::raw($query2),array('ci'=>$request->ci));
        if($request->specialty){
            //return "tiene especialidades";
            foreach ($request->specialty as $i) {
                DB::table('usuarios_especialidades')->insert([
                    'id_usuario' => $rows[0]->id_user,
                    'id_especialidad' => $i,
                    'estado' => 'activo'
                ]);
            }
        }else{
            //return "no tiene especialidades";
        }
        switch ($request->tipo_usuario) {
            case '1':
                $query2 = "SELECT id as id_role FROM roles WHERE user_default = :tipe";
                $rows2=\DB::select(\DB::raw($query2),array('tipe'=>$request->tipo_usuario));
                $var = count($rows2);
                for ($i = 0 ; $i < $var ; $i++) {
                    DB::table('role_user')->insert([
                        'user_id' => $rows[0]->id_user,
                        'role_id' => $rows2[$i]->id_role
                    ]);
                }
                break;
            case '2':
                $query2 = "SELECT id as id_role FROM roles WHERE user_default = :tipe";
                $rows2=\DB::select(\DB::raw($query2),array('tipe'=>$request->tipo_usuario));
                $var = count($rows2);
                for ($i = 0 ; $i < $var ; $i++) {
                    DB::table('role_user')->insert([
                        'user_id' => $rows[0]->id_user,
                        'role_id' => $rows2[$i]->id_role
                    ]);
                }
                break;
            case '3':
                $query2 = "SELECT id as id_role FROM roles WHERE user_default = :tipe";
                $rows2=\DB::select(\DB::raw($query2),array('tipe'=>$request->tipo_usuario));
                $var = count($rows2);
                for ($i = 0 ; $i < $var ; $i++) {
                    DB::table('role_user')->insert([
                        'user_id' => $rows[0]->id_user,
                        'role_id' => $rows2[$i]->id_role
                    ]);
                }
                break;
            case '6':
                $query2 = "SELECT id as id_role FROM roles WHERE user_default = :tipe";
                $rows2=\DB::select(\DB::raw($query2),array('tipe'=>$request->tipo_usuario));
                $var = count($rows2);
                for ($i = 0 ; $i < $var ; $i++) {
                    DB::table('role_user')->insert([
                        'user_id' => $rows[0]->id_user,
                        'role_id' => $rows2[$i]->id_role
                    ]);
                }
                break;
            case '7':
                $query2 = "SELECT id as id_role FROM roles WHERE user_default = :tipe";
                $rows2=\DB::select(\DB::raw($query2),array('tipe'=>$request->tipo_usuario));
                $var = count($rows2);
                for ($i = 0 ; $i < $var ; $i++) {
                    DB::table('role_user')->insert([
                        'user_id' => $rows[0]->id_user,
                        'role_id' => $rows2[$i]->id_role
                    ]);
                }
                break;

            default:
                // code...
                break;
        }
        return redirect()->action(
            'UsersController@index_medics'
        );
    }
    public function verUsuarios(Request $request){
        //return $request->all();
        $query2 = "select tipo_usuario from users where id = :id_medico";
        $rows2=\DB::select(\DB::raw($query2),array('id_medico'=>$request->id_medico));
        //return $rows2[0]->tipo_usuario;
        $query = "select * from users us
                    where us.id = :id_medico";
        $rows=\DB::select(\DB::raw($query),array('id_medico'=>$request->id_medico));
        $query1 = "select * from usuarios_especialidades ue
                    inner join users us
                    on us.id = ue.id_usuario
                    inner join especialidades es
                    on es.id_especialidad = ue.id_especialidad
                    where id_usuario = :id_medico";
        $rows1=\DB::select(\DB::raw($query1),array('id_medico'=>$request->id_medico));
        $query3 = "select es.id_especialidad, es.nombre_especialidad
        from especialidades es
        where es.tipo_usuario = :tip and es.id_especialidad  NOT IN
            (
                select id_especialidad
                from usuarios_especialidades
                where id_usuario = :id_medico and estado = 'activo'
            )";
        $espe=\DB::select(\DB::raw($query3),array('id_medico'=>$request->id_medico,'tip'=>$rows2[0]->tipo_usuario));
        //return $espe;
        return view('admin.users.view_medic_dates')->with('rows',$rows)->with('rows1',$rows1)->with('espe',$espe);
    }
    public function update1(Request $request, $id){
        foreach($request->agregar_especialidad as $esp){
            //return $esp;
            if($esp!=0)
            {
                $query1 = "select public.agregar_especialidad(:id, :id_espe)";
                $rows2 = \DB::select(\DB::raw($query1),array('id'=>$id,'id_espe'=>$esp));
            }
        }
        foreach($request->eliminar_especialidad as $esp){
            //return $esp;
            if($esp!=0)
            {
                $query2 = "select public.eliminar_especialidad(:id, :id_espe)";
                $rows3 = \DB::select(\DB::raw($query2),array('id'=>$id,'id_espe'=>$esp));
            }
        }
        return redirect()->action(
            'UsersController@index_medics'
        );

    }
    public function baja_user(Request $request){
        //return $request->all();
        $query2 = "select estado_user, tipo_usuario from users where id = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id));
        //return $rows2;
        if(($rows2[0]->estado_user)===1){
            $baja_user = DB::table('users')
            ->where('id', '=', $request->id)
            ->update([
                'estado_user' => 2
            ]);
        }else{
            $baja_user = DB::table('users')
            ->where('id', '=', $request->id)
            ->update([
                'estado_user' => 1
            ]);
        }
        if(($rows2[0]->tipo_usuario)===2){
            return redirect()->action(
                'UsersController@index_medics'
            );
        }else{
            if(($rows2[0]->tipo_usuario)===3){
                return redirect()->action(
                    'UsersController@index_medics'
                );
            }else{
                if(($rows2[0]->tipo_usuario)===4){
                    return redirect()->action(
                        'UsersController@index_medics'
                    );
                }
            }
        }
        return redirect()->action(
            'UsersController@index_medics'
        );
    }
    public function charge_specialty_b(Request $request){
        //return $request->all();
        $query = "select * from especialidades where tipo_usuario = :id and estado_especialidad = 'Activo' order by id_especialidad asc";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id));
        return $rows;
    }
    public function view_list_usuarios_credential(){
        if(\Entrust::hasRole('imprimir_credencial')){
        $query2 = "SELECT * FROM users us
                    LEFT JOIN estados_usuarios esu
                    ON us.estado_user = esu.id_estados
                    LEFT JOIN tipo_usuarios tu
                    ON tu.id_tipo = us.tipo_usuario
                        WHERE us.estado_user = 1 AND id != 10
                    ORDER BY id ASC";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.users.view_dates_list_print_users')->with('users',$rows2);
        }else{
            return view('error.user_not_permission');
        }
    }
    public function print_credential_user($id_){
        //return $id_;
        $query = "SELECT * FROM users WHERE id = :id ORDER BY id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$id_));
        //return $rows;
        $view =  \View::make('admin.users.credential_user', compact('rows'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper(array(0,0,300,200));
        $pdf->loadHTML($view);
        return $pdf->stream();
    }
    public function view_perfil(){
      return view('admin.users.view_perfil');
    }
    public function form_users(){
        $query = "SELECT * FROM tipo_usuarios WHERE id_tipo != 5  ORDER BY id_tipo ASC";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from estados_civil order by id_estado_civil asc";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "select * from especialidades where tipo_usuario = 2 and estado_especialidad = 'Activo' order by id_especialidad asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.users.form_users')->with('rows',$rows)->with('rows1',$rows1)->with('rows2',$rows2);
    }
}
