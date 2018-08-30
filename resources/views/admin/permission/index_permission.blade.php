<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="row">
                <div class="col-md-10">
                  <h3 class="box-title">Permisos de Usuario</h3>
                </div>
                <div class="col-md-2">
                <button type="button" class="btn btn-success btn-ms"  data-toggle="modal" data-target="#modal_add_permisions"> <span class="fa fa-plus"> </span>  Agregar Nuevo Permiso</button>  
                </div>              
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Permisos</th>
                        <th>Nombre Permiso</th>
                        <th>Descripcion Permiso</th>
                        <th>Fecha Creacion</th>
                        <th>Estado Permiso</th>
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
                            <td>{{ $roles->state_permissions }}</td>
                            <td> <button type="button" class="btn btn-primary btn-xs load_dates_permission_edit" value="{{ $roles->id }}"> <span class="fa fa-edit"></span> Editar</button> <button type="button" class="btn btn-danger btn-xs delete_permission" value="{{ $roles->id }}"> <span class="fa fa-edit"></span> Borrar</button> </td>
                        </tr>
                    @empty
                        <p>No users</p>
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

<!-- Modal para agregar Permisos -->
<div class="modal fade" id="modal_add_permisions">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_permission" novalidate action="{{url('create_permission')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Nuevo Permiso</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Identificador de Permiso <small class="text-red" id=""></small></label>
                                              <input type="text" class="form-control name_form" id="" name= "permission" placeholder="Ecribir permiso">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Nombre Permiso<small class="text-red" id=""></small></label>
                                              <input type="text" class="form-control name_form" id="" name="name_permission" placeholder="Ingresar Nombre Permiso">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripcion Permiso <small class="text-red" id=""></small></label>
                                            <textarea class="form-control name_form" rows="3" name="description_permission" placeholder="Escribir descripcion..."></textarea>
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
<!-- Modal para editar Permisos -->
<div class="modal fade" id="modal_edit_permisions">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_permission_edit" novalidate action="{{url('edit_permission')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_permission_edit" value="" id="id_permission_edit">
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
                                              <label for="exampleInputEmail1">Identificador de Permiso <small class="text-red" id=""></small></label>
                                              <input type="text" class="form-control name_form" id="permission_edit" name= "permission_edit" placeholder="Ecribir permiso">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Nombre Permiso<small class="text-red" id=""></small></label>
                                              <input type="text" class="form-control name_form" id="name_permission_edit" name="name_permission_edit" placeholder="Ingresar Nombre Permiso">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripcion Permiso <small class="text-red" id=""></small></label>
                                            <textarea class="form-control name_form" rows="3" id="description_permission_edit" name="description_permission_edit" placeholder="Escribir descripcion..."></textarea>
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