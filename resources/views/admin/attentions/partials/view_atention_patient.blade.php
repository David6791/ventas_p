<div class="row borrar_anteriro">
    <div class="col-md-12">
    @if( empty($dat_register[0]['observations']))
        <div class="load_notes_medic">
            <form class="form-horizontal form_send_dates_appointments_send" action="{{url('save_dates_appoinments_dates')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                <div class="row">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <label for="form-control"> TIPO CONSULTA: </label> {{ $dates_cita_end[0]->name_type }}
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Grupo Enfermedad</label>
                                <small class="text-red" id=""></small>
                                <select class="select2_group form-control name_form" name="nacionalidad">
                                    @foreach($group as $g)
                                        <option value="{{ $g->_id }}">{{ $g->name_group }}</option>                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @foreach($dat_register as $lo)
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label for=""> {{ $lo['name_date'] }} : </label>
                            <textarea rows=3 name="{{ $lo['id_date_register'] }}" placeholder="{{ $lo['description_dates'] }}..." id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                        </div>
                    </div>
                    <br> @endforeach
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label for="">Esta Cita Medica tendra Reconsulta...?</label>
                            <div class="row">
                                <br>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-info click_exec_1" value="">SI </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger click_cancel_1" value="">NO </button>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Observaciones...</label>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" rows="3" disabled placeholder="Escribir aqui ..." id="datos" name="observations_appointments"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label for="">Observaciones de la Cita Medica</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" placeholder="Escriba aqui las Observaciones de la Cita Medica..." rows="5" name="observation_appointment_dates" id=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Datos Cita Medica</button>
                        </div>
                    </div>
                </div>
                    
            </form>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Notas Medicas</h3>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <?php $a = 1 ?>
                            @forelse($dat_register as $as)
                            <label for="">{{$a++}}.- {{ $as['name_date'] }}:</label>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    {{ $as['observations'] }}
                                </div>
                            </div>
                            @empty
                            <label for="">No existen datos para mostrar...</label>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Reconsulta: </h3>
                    <label for="" class="text-green"> Si tiene Reconsulta</label>
                </div>
                <div class="row">
                    <div class="col-md-5">Observaciones para Reconsulta</div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        {{ $datos_1[0]->observation_re_medical_consusltation }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <h3 class="box-title">
                        Observaciones de la Cita Medica
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                {{ $datos_1[0]->observation_medical_appoinments }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <button class="btn btn-success"> Editar Datos</button>
                </center>
            </div>
        </div>
    @endif
    </div>
</div>