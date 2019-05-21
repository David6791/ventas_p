<div class="row">
    <div class="box-header">
        <div class="box-title">
            <label for="">Registrar Examenes Medicos del Paciente</label>
        </div>
        <div class="x_content">
            @if(empty($ex_medics[0]['id_medical_exam']))
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-5">
                                    <h4><label>ORDEN DE EXAMEN MEDICO</label></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Fecha:</label> {{ date('d/m/Y', strtotime($ex_medics[0]['date_creation'])) }}
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <label for="">Nro. Cita Medica</label> {{ $ex_medics[0]['id_appoinments'] }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nombre Paciente:</label> {{ $ex_medics[0]['nombres'] }} {{ $ex_medics[0]['ap_paterno'] }} {{ $ex_medics[0]['ap_materno'] }}
                                </div>
                                <div class="col-md-3">
                                    <label for="">Ci:</label> {{ $ex_medics[0]['ci_paciente'] }}
                                </div>
                                <div class="col-md-3">
                                    <label for="">Edad:</label>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="">Medico Solicitante:</label> {{ $ex_medics[0]['name'] }} {{ $ex_medics[0]['apellidos'] }}
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Tipo Examen Medico:</label> {{ $ex_medics[0]['name_medical_exam'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Motivo Examen Medico:</label> {{ $ex_medics[0]['reason_medical_examn'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Observaciones:</label> {{ $ex_medics[0]['observation_medical_exam'] }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <!--a type="button" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aexamen_medico.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Imprimir Orden Medica</a-->
                                    <a type="button" target="_blank" href="http://10.10.165.108:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aexam_medic.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Imprimir Orden Medica</a>
                                </div>
                                <div class="col-md-5">
                                    <button type="button" value="{{ $ex_medics[0]['id_medical_exam_patient'] }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar Orden Medica</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="x_panel con1">
                <form class="form-horizontal form-label-left sendform_medical_exam_1" novalidate action="{{url('register_medical_exam')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <label for="">Seleccione tipo de Examen Medico: </label>
                            <select name="id_medical_exam" id="" class="select2_group form-control">
                                @foreach($ex_medics as $li)
                                <option value="{{ $li['id_medical_exam'] }}">{{ $li['name_medical_exam'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10">
                            <label for="">Describa el Motivo para solicitar el Exame Medico</label>
                            <textarea class="select2_group form-control" name="reason_medical_exam" id="" placeholder="Ingrese aqui los motivos."></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label for="">Observaciones...</label>
                            <textarea class="select2_group form-control" name="observations_medical_exam" id="" placeholder="Ingrese observaciones."></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-primary">Registrar Examen Medico</button>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
        <div class="con2">
        </div>
    </div>
</div>
