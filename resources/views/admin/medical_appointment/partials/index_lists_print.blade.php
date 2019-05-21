<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Listas atencion de Pacientes {{ "para la fecha: ".date("m-d-Y") }}</h3>
            </div>
            <div class="box-body">
                <table id="datatable" class="table  table-bordered">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Nombre y Apellidos Medico</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1 ?>
                        @forelse($dates as $as)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $as->name }} {{ $as->apellidos }}</td>
                            <td>
                                <a target="_blank" href="http://localhost:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Alista_pacientes_medicos.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $as->id }}" type="button" class="btn btn-success btn-xs" name="button"> <span class="glyphicon glyphicon-print"></span> Imprimir</a>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>
