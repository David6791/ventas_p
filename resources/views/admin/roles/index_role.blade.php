<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Roles de Usuario</h3>
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
                            <td> <button type="button" class="btn btn-primary btn-xs"> <span class="fa fa-edit"></span> Editar</button> <button type="button" class="btn btn-danger btn-xs"> <span class="fa fa-edit"></span> Borrar</button> </td>
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
    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="box">
                    <div class="box-body">
                        <button type="button" class="btn btn-primary btn-ms" data-toggle="modal" data-target="#modal-default"> <span class="fa fa-plus"> </span>  Agregar Nuevo Rol</button>  
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade" id="modal-default">
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
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Identificador Rol <small class="text-red" id=""></small></label>
                                            <input type="text" class="form-control" id="" name= "rol" placeholder="Ecribir rol">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre Rol<small class="text-red" id=""></small></label>
                                            <input type="text" class="form-control" id="" name="name_rol" placeholder="Ingresar Nombre Rol">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descripcion Rol <small class="text-red" id=""></small></label>
                                            <textarea class="form-control" rows="3" name="description_rol" placeholder="Escribir descripcion..."></textarea>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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