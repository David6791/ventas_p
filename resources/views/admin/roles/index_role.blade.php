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