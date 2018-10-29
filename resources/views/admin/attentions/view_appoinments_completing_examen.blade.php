<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
                Lista de Citas Medicas para Llenar Examen Medico
            </h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="x_panel">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NRO. </th>
                                    <th>CI.</th>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>FECHA NACIMIENTO</th>
                                    <th>FECHA CITA MEDICA</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                    @foreach($list as $lista)
                                        <tr>   
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->ci_paciente }}</td>
                                            <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }} </td>
                                            <td>{{ $lista->fecha_nacimento }}</td>
                                            <td>{{ $lista->date_appointments }}</td>
                                            <!--td><button class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-eye-open"></span> Ver</button> <button class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-print"></span> Imprimir</button> <button class="btn btn-danger btn-xs edit_dates_patients" value="{{ $lista->id_paciente }}"> <span class="glyphicon glyphicon-edit"></span> Completar</button></td-->
                                            <td> <div class="col-md-2"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Completar</button></div></td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
<script>
    $('#datatable').DataTable();
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Turno <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_schedules" action="{{url('create_schedules')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-8">  
                        <div class="form-group">
                            <label for="">Motivo Cita Medica {{ $list[0]->appointment_description }}</label> <br>
                                <small class="text-red" id=""></small>
                                <p>{{ $list[0]->appointment_description }}</p>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Inicio</label>                            
                            <div class="input-group">
                                <small class="text-red" id=""></small>                                                                 
                                <input name="hora_inicio" type="text" class="form-control timepicker name_form" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>               
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Fin</label>                            
                            <div class="input-group">
                                <small class="text-red" id=""></small>
                                <input name="hora_fin" type='text' class="form-control timepicker name_form" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Resultados del Examen</label>
                            <small class="text-red" id=""></small>
                            <textarea class="form-control  col-md-6 name_form" rows="3" placeholder="Escribir ..." name="horario_descripcion"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2">                        
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>