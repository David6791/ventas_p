<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="alert ">
                <ul class="fa-ul">
                    <li>
                        <i class="fa fa-list fa-lg fa-li"></i> Lista de Citas Medicas Pasadas
                    </li>
                </ul>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Fecha</th>
                        <th>Tipo Cita Medica</th>
                        <!--th>Descripcion Cita Medica</th-->
                        <th>Estado Cita Medica</th>
                        <th>Hora Cita</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; $e=1 ?>
                        @foreach($list_app as $lista)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ date('d/m/Y', strtotime($lista->date_appointments)) }}</td>
                            <td>{{ $lista->name_type }}</td>
                            <!--td>{{ $lista->appointment_description }}</td-->
                            @if( $lista->name_state_appointments === 'Atendido')
                            <td style="color:#1FC125"><span class="glyphicon glyphicon-ok"></span> {{ $lista->name_state_appointments }}</td>
                            @else
                            <td style="color:#DA0000">{{ $lista->name_state_appointments }}</td>
                            @endif
                            <td>{{ $lista->start_time }}</td>
                            <td>
                                <button class="btn btn-success btn-xs load_dates_appoinments" href="" type="button" value="{{ $lista->id_medical_appointments }}">Ver Datos Consulta</button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="load_dates_appointments_one">
</div>
<script>
    $('#datatable').DataTable();
</script>
