<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
            Lista de Pacientes para habilitar la Edicion de sus Datos Medicos y Patologias
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
                                    <th>FECHA NACIMIENTO</th>
                                    <th>ESTADO DATOS</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                    @foreach($patients as $lista)
                                        <tr>   
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->ci_paciente }}</td>
                                            <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }} </td>
                                            
                                            <td>{{ $lista->fecha_nacimento }}</td>
                                            @if(($lista->filiacion_completa)=='s')
                                            <td> Completado </td>
                                            <td><button class="btn btn-danger btn-xs hability_dates_patients" value="{{ $lista->id_paciente }}"> <span class="glyphicon glyphicon-edit"></span> Habilitar</button></td>
                                            @else
                                            <td> Incompleto </td>
                                            <td><button class="btn btn-success btn-xs hability_dates_patients" value="{{ $lista->id_paciente }}"> <span class="glyphicon glyphicon-edit"></span> Deshabilitar</button></td> 
                                            @endif
                                            
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