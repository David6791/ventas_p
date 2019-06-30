<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista Usuarios</h3>
        </div>
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Ci.</th>
                        <th>Nombres y Apellidos</th>
                        <th>Tipo Usuario</th>
                        <th>Matricula</th>
                        <th>Fecha Registro</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach($row as $lista)
                    <tr>
                        <td>{{ $a++ }}</td>
                        <td>{{ $lista->ci }}</td>
                        <td>{{ $lista->name }} {{ $lista->apellidos }}</td>
                        <td>{{ $lista->nombre_tipo }}</td>
                        <td>{{ $lista->matricula_medico }}</td>
                        <td>{{ $lista->fecha_creacion}}</td>
                        @if($lista->estado_user===1)
                            <td><button class="btn btn-success btn-xs get_BajaUser" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-arrow-up"></span> Activo</button></td>
                        @else
                            <td><button class="btn btn-danger btn-xs get_BajaUser" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-arrow-down"></span> Inactivo</button></td>
                        @endif
                        <td><button class="btn btn-info btn-xs getVerUsuario" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-eye-open"></span> Ver</button> <button class="btn btn-primary btn-xs " name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-print"></span> Imprimir</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--div class="box-footer">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2"><button type="button" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-print"></span> Imrimir Lista de Medicos</button></div>
                <div class="col-md-7"></div>
                @permission('Registrar_usuario')
                <div class="col-md-2"><button type="button" class="btn btn-success btn-sm add_medic"><span class="glyphicon glyphicon-plus"></span> Agregar Nuevo Usuario</button></div>
                @endpermission
            </div>
        </div-->
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>
