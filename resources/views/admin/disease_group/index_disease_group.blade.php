<div class="section">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Grupos de Enfermedades para Estadisticas</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>NRO.</th>
                                        <th>NOMBRE GRUPO</th>
                                        <th>DESCRIPCION </th>
                                        <th>ESTADO </th>
                                        <th>FECHA REGISTRO</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1 ?>
                                    @foreach($row as $lista)
                                        <tr>
                                            <td> {{ $a++ }}</td>
                                            <td> {{ $lista->name_group }}</td>
                                            <td> {{ $lista->description_group }}</td>
                                            @if($lista->state_group==='activo')
                                                <td><button class="btn btn-success btn-xs get_group_disease" name="id_medico" value="{{$lista->_id}}"> <span class="glyphicon glyphicon-arrow-up"></span> Activo</button></td>
                                            @else
                                                <td><button class="btn btn-danger btn-xs get_group_disease" name="id_medico" value="{{$lista->_id}}"> <span class="glyphicon glyphicon-arrow-down"></span> Inactivo</button></td>
                                            @endif                                   
                                            <td> {{ $lista->date_register_group }} </td>
                                            <td> <button class="btn btn-warning btn-xs edit_group_disease"  value="{{ $lista->_id }}" ><span class="glyphicon glyphicon-edit"></span> Editar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-info" > <span class="glyphicon glyphicon-print"></span> Imprimir Lista de Datos </button>
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#create_group_disease" data-whatever="@mdo"> <span class="glyphicon glyphicon-plus"></span> Agregar nuevo Dato</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create_group_disease" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Grupo de Enfermedades <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_group_disease" action="{{url('create_group_disease')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-12">  
                        <div class="form-group">
                            <label for="">Nombre Grupo </label> <small class="text-red" id=""> </small>
                                <input name="nombre_grupo" class="form-control name_form" type="text" value="">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Grupo </label> <small class="text-red" id=""> </small>
                            <textarea class="form-control  col-md-6 name_form" rows="3" placeholder="Escribir ..." name="descripcion_grupo"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Guardar Nuevo</button>
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
<!-- Modal para editar Permisos -->
<div class="modal fade" id="modal_edit_group">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_group_edit" novalidate action="{{url('edit_group')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="_id" value="" id="id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Permiso</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Nombre Grupo <small class="text-red" id=""></small></label>
                                              <input type="text" class="form-control name_form" id="name" name= "nombre_grupo" placeholder="Ecribir">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripcion Grupo <small class="text-red" id=""></small></label>
                                            <textarea class="form-control name_form" rows="3" id="_description" name="descripcion_grupo" placeholder="Escribir descripcion..."></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>    
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>