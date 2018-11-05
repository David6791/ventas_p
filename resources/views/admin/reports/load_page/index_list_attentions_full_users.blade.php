<div class="row">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Lista de Pacientes Atendidos al Dia del Medico</h3>
        </div> 
        <div class="box-body">       
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>NRO.</th>
                                <th>CI.</th>
                                <th>NOMBRE PACIENTE</th>
                                <th>HORA ATENCION</th>
                                <th>ESTADO CITA MEDICA</th>
                                <th>MEDICO ATENDIO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @foreach($list_daily as $lista)
                                <tr>
                                    <td> {{ $a++ }}</td>
                                    <td> {{ $lista->ci_paciente }} </td>
                                    <td> {{ $lista->pac }}</td>
                                    <td> {{ $lista->start_time }}</td>
                                    <td> {{ $lista->name_state_appointments }}</td>
                                    <td> {{ $lista->doc}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                <a class="btn btn-success" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aatencion_diaria_medicos.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{Auth::user()->id}}"> <span class="glyphicon glyphicon-print "></span> Imprimir</a>
                <!--a class="btn btn-success" target="_blank" href="http://10.10.165.108:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aatencion_diaria_medicos.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{Auth::user()->id}}"> <span class="glyphicon glyphicon-print "></span> Imprimir Reporte Diario</a>                <br-->
                </center>
            </div>
        </div>  <br>    
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>