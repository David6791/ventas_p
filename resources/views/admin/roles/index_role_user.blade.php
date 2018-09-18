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
                        <td>{{ $roles->name }}</td>
                        <td>{{ $roles->email }}</td>
                        <td>{{ $roles->fecha_creacion }}</td>
                        <td>Activo</td>                            
                        <td> <button type="button" class="btn btn-info btn-xs view_roles_user" value="{{ $roles->id }}"> <span class="fa fa-eye"></span> Ver Roles </button> <button type="button" class="btn btn-success btn-xs view_roles_edit_user" value="{{ $roles->id }}"> <span class="fa fa-edit"></span> Editar roles </button></td>
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
  <!-- Modal para editar Permisos -->
<div class="modal fade" id="modal-viewrols">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ver Roles de: <small id="name_user"></small></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <table id="example2" class="table table-bordered table-hover table_roles" id="">
                  <thead>
                    <tr>
                      <th>Nro.</th>
                      <th>Rol</th>
                      <th>Nombre Rol</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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