<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><span class="glyphicon glyphicon-th-list"></span> Lista de los Historiales Medicos del Paciente: </label>
            </div>
            <div class="box-body delete_load">
                <div class="row">                    
                    <div class="col-md-12">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nro.</th>
                                    <th>Ci.</th>
                                    <th>Nombres y Apellidos</th>
                                    <th>Fecha Nacimiento</th>
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
                                    <td>{{ $lista->ci_paciente }}</td>
                                    <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>                 
                                    <td>{{ $lista->fecha_nacimento }}</td>
                                    <td>{{ $lista->fecha_creacion}}</td>
                                    @if($lista->estado_paciente='activo')
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif   
                                    <td><button class="btn btn-primary btn-xs get_view_record_medic" name="id_medico" value="{{$lista->id_paciente}}"><span class="glyphicon glyphicon-eye-open"></span> Ver Historial medico</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="load_delete">
            </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>