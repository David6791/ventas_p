<div class="row">
    <div class="col-md-12">
        <div class="x_title">
            <label for="">Registro de Tratamiento</label>
        </div>
        <div class="x_content">
            <div class="borrar_1">
                @if(($control['detalle'])=='si')
                <form class="form-horizontal form_send_dates_treatment" action="{{url('save_dates_treatment')}}" method="post" autocomplete="off">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Incio <span class="required"></span></label>
                                        <div class="form-group">
                                            <div class='input-group date' id=''>
                                                <input name="treatment_start" id="myDatepicker3" type='text' class="form-control" value="" />
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Fin <span class="required"></span></label>
                                        <div class="form-group">
                                            <div class='input-group date' id=''>
                                                <input name="treatment_end" id="myDatepicker2" type='text' class="form-control" value="" />
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <label for="">Medicamentos Disponibles en el Policlinico</label>
                                        </div>
                                        <div class="x_content">
                                            <table id="datatable" class="table table-bordered datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Nro.</th>
                                                        <th>Nombre Medicamento</th>
                                                        <th>Cantidad Existente</th>
                                                        <th>Accion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $a = 1 ?>
                                                        @foreach($list_mecines_disponibles as $lista)
                                                        <tr>
                                                            <td>{{ $a++ }}</td>
                                                            <td>{{ $lista->name_medicine }}</td>
                                                            <td>{{ $lista->quantity_medicine }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary btn-xs move_file" value="{{ $lista->id_medicines }}">Agregar</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <label for="">Lista de Medicamentos para el Tratamiento</label>
                                        </div> <br> <br>
                                        <div class="x_content">
                                            <table id="datatable" class="table table-bordered datatable add_medicines">
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Nombre Medicamento</th>
                                                    <th>Cantidad Existente</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <label for="">Indicaciones para el Tratamiendo</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" placeholder="Escriba aqui las indicaciones del Tratamiento..." rows="5" name="indications_treatment" id=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" style="color:#FFF" ;>asdasdsa</label>
                                <center>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Datos Tratamiento</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="x_panel">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="x_panel">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <h4><label>TRATAMIENTO QUE DEBE SEGUIR EL PACIENTE</label></h4>
                                </center>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <label for="">Fecha Inicio Tratamiento:</label> {{ $view_treatment[0]->date_start_treatment }}
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <label for="">Fecha Fin Tratamiento:</label> {{ $view_treatment[0]->date_start_treatment }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <label for="">MEDICAMENTOS PARA EL TRATAMIENTO</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <table id="" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Nombre Medicamento</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1 ?>
                                            @foreach($view_treatment as $lista)
                                            <tr>
                                                <td>{{ $a++ }}</td>
                                                <td>{{ $lista->name_medicine }}</td>
                                                <td>{{ $lista->quantity_medicine }}</td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <label for="">INDICACIONES PARA EL TRATAMIENTO</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {{ $view_treatment[0]->description_treatment }}
                            </div>
                        </div>
                        <br>
                        <div class="row alinear">
                            <div class="col-md-6 alinear">
                                <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-print"> </span> Imprimir Tratamiento</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button alinear" class="btn btn-success"> <span class="glyphicon glyphicon-print"> </span> Editar Tratamiento</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="treat_content">
</div>
<script>
    $('#datatable').DataTable();
    $('#myDatepicker3').datepicker({});
    $('#myDatepicker2').datepicker({});
</script>
