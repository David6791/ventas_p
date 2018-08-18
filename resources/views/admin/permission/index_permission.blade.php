<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permisos de Usuario</h3>
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
                            <td> <button type="button" class="btn btn-primary btn-xs"> <span class="fa fa-edit"></span> Editar</button> <button type="button" class="btn btn-danger btn-xs"> <span class="fa fa-edit"></span> Borrar</button> </td>
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