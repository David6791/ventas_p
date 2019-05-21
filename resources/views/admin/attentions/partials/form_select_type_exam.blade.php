<div class="row">
    <div class="col-md-12">
        <center>
                TIPO EXAMEN MEDICO
                <select class="select2_group form-control charge_type_medic_exam" name="tipo_usuario">
                    <option value="">Ninguno</option>
                    @foreach($types_exam_medics as $lista)
                        <option value="{{$lista->id_type_exam_medic}}">{{$lista->name_medical_exam_type}}</option>
                    @endforeach
                </select>
        </center>
    </div>
</div>
