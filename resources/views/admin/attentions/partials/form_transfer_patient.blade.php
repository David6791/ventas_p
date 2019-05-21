<div class="row">
    <div class="box-header">
        <div class="box-title">
            <h3 class="box-title">Registro de Traslado de Pacientes</label>
        </div>
        <div class="x_content c_transfer1">
            @if(empty($types_transfer[0]['description_type_transfer']))
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="x_panel">
                        @foreach($types_transfer as $dat)
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><label>ORDEN DE TRANSFERENCIA MEDICA</label></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Fecha:</label> {{ date('d/m/Y', strtotime($dat['date_creation'])) }}
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <label for="">Nro. Transferencia:</label> {{ $dat['id_transfer_patient'] }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nombre Paciente:</label> {{ $dat['nombres'] }} {{ $dat['ap_paterno'] }} {{ $dat['ap_materno'] }}
                                </div>
                                <div class="col-md-3">
                                    <label for="">Ci:</label> {{ $dat['ci_paciente'] }}
                                </div>
                                <div class="col-md-3">
                                    <label for="">Edad:</label>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Medico Solicitante:</label> {{ $dat['name'] }} {{ $dat['apellidos'] }}
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Tipo Transferencia Medica:</label> {{ $dat['name_type_transfer'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Diagnostico:</label> {{ $dat['diagnostic'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Justificacion Transferencia:</label> {{ $dat['justified_transfer'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Origen Tranferencia:</label> {{ $dat['origin_transfer'] }}
                                </div>
                                <div class="col-md-6">
                                    <label for="">Destino Transferencia:</label> {{ $dat['destini_transfer'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <!--a type="button" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Atraslado.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir Orden Transferencia</a-->
                                    <a type="button" target="_blank" href="http://10.10.165.108:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Atraslado.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir Orden Transferencia</a>
                                </div>
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> Editar Orden Transferencia</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal sendform_transfer_patients" action="{{url('store_patients_transfer')}}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                            <input type="hidden" name="id_patient" value="{{ $dates_patient[0]->id_paciente }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="x_panel">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <h3>Motivos Traslado</h3>
                                                        <br> Diagnostico
                                                        <textarea name="diagnostic" id="" class="select2_group form-control" placeholder="Escriba aqui."></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        Justificacion Traslado
                                                        <textarea name="justifi_transfer" id="" class="select2_group form-control" placeholder="Escriba aqui."></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <label for="">Tipo Traslado</label>
                                                        <br> @foreach(array_chunk($types_transfer, 3) as $chunk)
                                                        <div class="row">
                                                            @foreach($chunk as $add)
                                                            <div class="col-md-4">
                                                                <div class="form-group col-md-12">
                                                                    <div class="">
                                                                        <label class="control-label">
                                                                            <input type="checkbox" name="type_transfer" value="{{ $add['id_type_transfer'] }}"> {{ $add['name_type_transfer'] }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-5">
                                                        <label for=""> Origen Traslado</label>
                                                        <input class="select2_group form-control" type="text" name="origin_trasnfer">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="">Destino Traslado</label>
                                                        <input class="select2_group form-control" type="text" name="destyni_trasnfer">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-5"></div>
                                                    <div class="col-md-">
                                                        <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Datos</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="c_transfer2">
        </div>
    </div>
</div>
