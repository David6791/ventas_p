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
                        <th>Nombres y Apellidos</th>
                        <th>Rol Asignado</th>
                        <th>Fecha Asignacion</th>
                        <th>Estado Asignacion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @forelse ($row as $roles)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $roles->usname }}</td>
                            <td>{{ $roles->rname }}</td>
                            <td>{{ $roles->asi_created }}</td>
                            <td>{{ $roles->state_role_user }}</td>                            
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