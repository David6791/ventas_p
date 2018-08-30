<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="box-title">Roles de Usuario</h3>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success btn-ms"  data-toggle="modal" data-target="#modal-default"> <span class="fa fa-plus"> </span>  Agregar Nuevo Rol</button>  
                    </div>
                </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Rol</th>
                        <th>Nombre Rol</th>
                        <th>Descripcion Rol</th>
                        <th>Fecha Creacion</th>
                        <th>Estado Rol</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @forelse ($row as $roles)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $roles->name }}</td>
                            <td>{{ $roles->display_name }}</td>
                            <td>{{ $roles->description }}</td>
                            <td>{{ $roles->created_at }}</td>
                            <td>{{ $roles->state_role }}</td>
                            <td> <button type="button" class="btn btn-primary btn-xs load_dates_edit" value="{{ $roles->id }}"> <span class="fa fa-edit"></span> Editar</button> <button type="button" class="btn btn-danger btn-xs delete"  value="{{ $roles->id }}"> <span class="fa fa-edit"></span> Borrar</button> </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Existen datos Registrados.</td>
                        </tr>
                    @endforelse
                </tbody>                              
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_rol" novalidate action="{{url('create_rol')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Nuevo Rol</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Identificador Rol <small class="text-red" id=""></small></label>
                                                <input type="text" class="form-control name_form" id="" name= "rol" placeholder="Ecribir rol">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre Rol<small class="text-red" id=""></small></label>
                                            <input type="text" class="form-control name_form" id="" name="name_rol" placeholder="Ingresar Nombre Rol">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripcion Rol <small class="text-red" id=""></small></label>
                                            <textarea class="form-control name_form" rows="3" name="description_rol" placeholder="Escribir descripcion..."></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal_default_close" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>


<!-- modal para editar los roles de usuario -->
<div class="modal fade" id="modal-editrol">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_edit_rol" novalidate action="{{url('edit_role')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name= "id_rol" value="" id="id_rol_edit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Rol</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Identificador Rol <small class="text-red" id=""></small></label>
                                                <input type="text" class="form-control name_form" id="rol_edit" name= "rol_edit" placeholder="Ecribir rol">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombre Rol<small class="text-red" id=""></small></label>
                                                <input type="text" class="form-control name_form" id="name_rol_edit" name="name_rol_edit" placeholder="Ingresar Nombre Rol">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripcion Rol <small class="text-red" id=""></small></label>
                                            <textarea class="form-control name_form" rows="3" id="description_rol_edit" name="description_rol_edit" placeholder="Escribir descripcion..."></textarea>
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
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>


<!-- /.modal -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>