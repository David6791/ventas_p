<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de Medicamentos </label>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <table id="datatable" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Medicamento</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Registro</th>
                                        <th>Estado</th>         
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1 ?>
                                    @foreach($list as $lista)
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->name_medicine }}</td>
                                            <td>{{ $lista->description_medicine }}</td>
                                            <td>{{ $lista->date_register }}</td>
                                            <td>{{ $lista->state_medicine }}</td>
                                            <td><button class="btn btn-primary btn-xs" value="">Editar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#medicines_register_modal" data-whatever="@mdo">Agregar Nuevo Medicamento</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="medicines_register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Turno <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_medicines" action="{{url('create_medicines')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-12">  
                        <div class="form-group">
                            <label for="">Nombre Medicamento</label>
                                <input name="name_medicine" class="form-control" type="text" value="">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="medicine_description"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Registrar</button>
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
</script>