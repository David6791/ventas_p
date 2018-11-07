<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Lista Horarios</h3>
        </div>
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-hover agregar">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Estado</th>
                        <th>Fecha Creacion</th>
                        <th>Turno</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @forelse($horas as $lista)
                    <tr>
                        <td>{{ $a++ }}</td>
                        <td>{{ $lista->start_time }}</td>                
                        <td>{{ $lista->end_time }}</td>
                        <td>{{ $lista->state_turn }}</td>                   
                        <td>{{ $lista->date }}</td> 
                        <td>{{ $lista->name_schedules }}</td> 
                        <td><div class="col-md-2"><button type="button" class="btn btn-primary btn-xs baja_turn" value="{{$lista->id_hour_turn}}"> <span class="glyphicon glyphicon-show"></span> Dar de Baja</button></div></td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>         
        </div>
        <div class="box-footer">
            <input type="hidden" value="{{ $sche[0] }}" name="turno">
            <center>
                
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Crear Nuevo Turno</button>
            </center>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Horario<label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_turn_new" action="{{url('save_turn')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_schedule" id="id_schedule" value="{{ $sche[0] }}">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Horario</label>
                                <input name="name_schedules" class="form-control" type="text" value="{{$sche[1]}}" id="name_schedules"/>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Inicio</label>
                            <div class="input-group">
                                <small class="text-red" id=""></small>  
                                <input name="hora_inicio" type='text' class="form-control timepicker name_form" />
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
                                <input name="hora_fin" type='text' class="form-control timepicker1 name_form"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>               
                    </div>
                </div>
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