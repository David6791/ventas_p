<div class="row">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Lista de Pacientes Atendidos al Dia del Medico</h3>  <br> <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nombre Medico:</label> {{ Auth::user()->name }} {{ Auth::user()->apellidos }}        
                    </div>
                    <div class="col-md-6" >
                        Fecha Inicio: {{ $dates[0] }} - Fecha Fin: {{ $dates[1] }}
                    </div>
                </div>  
        </div> <br>
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
                                <th>DESCRIPCION CITA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @foreach($list_daily as $lista)
                                <tr>
                                    <td> {{ $a++ }}</td>
                                    <td> {{ $lista->ci_paciente }} </td>
                                    <td> {{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>
                                    <td> {{ $lista->start_time }}</td>
                                    <td> {{ $lista->name_state_appointments }}</td>
                                    <td> {{ $lista->appointment_description}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
            </div>
            <div class="col-md-12">
                <center>
                    <!--a class="btn btn-success" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Areporte_rango_fechas.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ Auth::user()->id }}&f1={{ $dates[0] }}&f2={{ $dates[1] }}"> <span class="glyphicon glyphicon-print "></span> Imprimir Reporte</a--> 
                    <a class="btn btn-success" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Areporte_rango_fechas.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ Auth::user()->id }}&f1={{ $dates[0] }}&f2={{ $dates[1] }}"> <span class="glyphicon glyphicon-print "></span> Imprimir Reporte</a> <br>
                    <!--a class="btn btn-success" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Areporte_rango_fechas.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p=4&f1={{ $dates[0] }}&f2={{ $dates[1] }}"> <span class="glyphicon glyphicon-print "></span> Imprimir2</a-->
                </center> <br>                
            </div>
        </div>       
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>