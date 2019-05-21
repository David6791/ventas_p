@if(($types_exam_medics[0]->id_type_exam_medic) == 1 )
    <div class="row">
        <div class="col-md-12">
            <form class="sendform_exam_laboratory" action="{{url('store_exam_laboratory')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_app" value="{{ $id_app }}">
                <input type="hidden" name="type" value="1">
                <div class="box-header">
                    <center>
                        EXAMEN PARA LABORATORIO
                    </center>
                    Seleccion uno o varios...
                </div>
                <div class="box-body">
                    @foreach(array_chunk($reason_exam, 2) as $chunk)
                        <div class="row">
                            @foreach($chunk as $add)
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="form-group col-md-12 marg">
                                        <div class="checkbox">
                                            <label class="control-label">
                                                <input type="checkbox" name="reasons[]" value="{{$add->id_reason}}">
                                                {{$add->name_reason}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <center>
                        <button type="submit" class="btn btn-success" name="button"> Guardar Examen Medico</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
@endif
@if(($types_exam_medics[0]->id_type_exam_medic) == 2 )
<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            EXAMEN PARA IMAGENOLOGIA
        </div>
        <div class="box-body">
            <form class="sendform_exam_laboratory" action="{{url('store_exam_laboratory')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_app" value="{{ $id_app }}">
                <input type="hidden" name="type" value="2">
                @foreach(array_chunk($reason_exam, 1) as $chunk)
                    <div class="row">
                        @foreach($chunk as $add)
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group col-md-12 marg">
                                    <div class="checkbox">
                                        <label class="control-label">
                                            <input class=" click_exec_radius" type="radio" name="reasons" value="{{$add->id_reason}}">
                                            {{$add->name_reason}}
                                            <input class="form-control" id="{{$add->id_reason}}" type="text" name="obs" value="" disabled>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="box-footer">
                    <center>
                        <button type="submit" class="btn btn-success btn-sm" name="button">Guardar Examen Medico</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@if(($types_exam_medics[0]->id_type_exam_medic) == 3 )
<p>3</p>
@endif
<style media="screen">
    .marg{
        /*background-color: red;*/
        margin: -5px;
    }
</style>
