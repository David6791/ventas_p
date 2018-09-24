<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Lista Horarios</h3>
    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombre Horario</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Descipcion</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($row as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->name_schedules }}</td>                
                    <td>{{ $lista->schedules_start }}</td>
                    <td>{{ $lista->schedules_end }}</td>
                    <td>{{ $lista->description }}</td>
                    @if($lista->state==='activo')
                    <td><button type="button" class="btn btn-success btn-xs get_BajaSchedule" name="id_medico" value="{{$lista->id_schedule}}"> <span class="glyphicon glyphicon-arrow-up"></span> Activo</button></td>
                    @else
                    <td><button type="button" class="btn btn-danger btn-xs get_BajaSchedule" name="id_medico" value="{{$lista->id_schedule}}"> <span class="glyphicon glyphicon-arrow-down"></span> Inactivo</button></td>
                    @endif 
                    <td><div class="col-md-2"><button type="button" class="btn btn-primary btn-xs get_EditSchedule" value="{{$lista->id_schedule}}"> <span class="glyphicon glyphicon-edit"></span> Editar Horario</button></div></td>
                </tr>
                @endforeach
            </tbody>
        </table>    
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Nuevo Horario</button></div>
        </div>
    </div>
</div>





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
                            <label for="">Nombre Horario</label> <br>
                                <small class="text-red" id=""></small>
                                <input name="nombre_horario" class="form-control name_form" type="text" value="">
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
                            <label for="">Descripcion</label>
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
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Horario<label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_schedules1" action="{{url('save_schedules')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_schedule" id="id_schedule" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Horario</label>
                                <input name="name_schedules" class="form-control" type="text" value="" id="name_schedules"/>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Inicio</label>
                            <div class="input-group">
                                <small class="text-red" id=""></small>  
                                <input name="hour_start" type='text' class="form-control timepicker name_form" />
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
                                <input name="hour_end" type='text' class="form-control timepicker1 name_form"/>
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
                            <label for="">Descripcion</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="hour_description" id="hour_description"></textarea>
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
<script>
$('#datatable').DataTable();
$('.timepicker').timepicker({
      showInputs: false
    })
$('.timepicker1').timepicker({
      showInputs: false
    })
</script>