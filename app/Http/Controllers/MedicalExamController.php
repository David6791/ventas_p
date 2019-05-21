<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class MedicalExamController extends Controller
{

    public function index_examn_medic(){
        $query = "select * from medical_exam order by id_medical_exam";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.medical_exam.index_medical_exam')->with('list',$rows);
    }
    public function create_medical_exam(Request $request){
        //return $request->all();
        /*$v  = $this->validate($request, [
            'medical_exam_description'  => 'required|min:5',
            'name_medical_exam'      => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }*/
        $validatedData = $request->validate([
            'nombre_examen_medico' => 'required',
            'descripcion' => 'required'
        ]);
        DB::table('medical_exam')->insert([
            'name_medical_exam' => $request->nombre_examen_medico,
            'description_medical_exam' => $request->descripcion,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'MedicalExamController@index_examn_medic'
        );
    }
    public function edit_medical_exam_charge(Request $request){
        //return $request->all();
        $query = "select * from medical_exam where id_medical_exam = :id";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_exam_medic));
        return $rows;
        return view('admin.medical_exam.index_medical_exam')->with('list',$rows);
    }
    public function edit_medical_exam(Request $request){
        //return $request->all();
        $validatedData = $request->validate([
            'nombre_examen_medico' => 'required',
            'descripcion' => 'required'
        ]);
        DB::table('medical_exam')
            ->where('id_medical_exam', $request->id)
            ->update([
                'name_medical_exam' => $request->nombre_examen_medico,
                'description_medical_exam' => $request->descripcion
            ]);
        return redirect()->action(
            'MedicalExamController@index_examn_medic'
        );
    }
    public function low_exam_medic(Request $request){
        //return 'asdsadsadsadsads';
        //return $request;
        $query = "select * from delete_exam_medic(:id)";
        $rows=\DB::select(\DB::raw($query),array('id'=>$request->id_exam_medic));
        //return $rows;
        return redirect()->action(
            'MedicalExamController@index_examn_medic'
        );
    }
}
