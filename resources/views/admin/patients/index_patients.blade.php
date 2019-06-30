<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
            Lista de Pacientes
            </h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="x_panel">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NRO.</th>
                                    <th>CI.</th>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>SEXO</th>
                                    <th>FECHA NACIMIENTO</th>
                                    <th>LUGAR NACIMIENTO</th>
                                    <th>ESTADO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                    @foreach($list_patients as $lista)
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->ci_paciente }}</td>
                                            <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }} </td>
                                            <td>{{ $lista->sexo }}</td>
                                            <td>{{ $lista->fecha_nacimento }}</td>
                                            <td>{{ $lista->nombre_localidad }}</td>
                                            <td>{{ $lista->esta_paciente }}</td>
                                            <td>
                                                <!--button class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-eye-open"></span> Ver</button>
                                                <button class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-print"></span> Imprimir</button-->
                                                <button class="btn btn-danger btn-xs edit_dates_patients" value="{{ $lista->id_paciente }}"> <span class="glyphicon glyphicon-edit"></span> Editar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#datatable').DataTable();
</script>
