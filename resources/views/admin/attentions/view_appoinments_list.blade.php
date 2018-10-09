<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de Citas Medicas para Atencion del Dr(a).  {{ Auth::user()->name }}</h3>
            </div>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3 tile_stats_count">
                    <div class="box-header">
                        <div> <h3 class="box-title"> {{ "Fecha: ".date("m-d-Y") }} </h3></div>
                    </div>                    
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Ci.</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Tipo Cita Medica</th>
                                        <th>Hora Atencion</th>                            
                                        <th>Estado Atencion</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1 ?>
                                    @foreach($list as $lista)
                                        @if($lista->emergency=='S')
                                        <tr bgcolor="#FAD2D2">
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->r_ci }}</td>
                                            <td>{{ $lista->r_nombres }} {{ $lista->r_apaterno }} {{ $lista->r_amaterno }}</td>
                                            <td>{{ $lista->name_type }}</td>
                                            <td>{{ $lista->r_name_schedules }}</td>
                                            <td>{{ $lista->r_name_state_appoinments }}</td>
                                            <td><button class="btn btn-primary btn-xs start_appointment" value="{{ $lista->r_id_medical_appointments }}">Iniciar Atencion</button></td>
                                        </tr>
                                        @else
                                        <tr bgcolor="#CDF3A9">
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->r_ci }}</td>
                                            <td>{{ $lista->r_nombres }} {{ $lista->r_apaterno }} {{ $lista->r_amaterno }}</td>
                                            <td>{{ $lista->name_type }}</td>
                                            <td>{{ $lista->r_start_time }}</td>
                                            <td>{{ $lista->r_name_state_appoinments }}</td>
                                            <td><button class="btn btn-primary btn-xs start_appointment" value="{{ $lista->r_id_medical_appointments }}">Iniciar Atencion</button></td>
                                        </tr>
                                        @endif                            
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#example2').DataTable();
</script>