<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
    <div class="box-header">
        <h2 class="box-title">Lista Citas Medicas para Editar</h2>
    </div>
    <div class="box-body">
        <table id="datatable" class="table  table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombre Paciente</th>
                    <th>Tipo Cita</th>
                    <th>Fecha Cita</th>
                    <th>Turno</th>
                    <th><span class="glyphicon glyphicon-time"></span> Hora</th>
                    <th>Estado Cita Medica</th>
                    <th>Medico</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($medics as $lista)
                    <tr>
                        <td>{{ $a++ }}</td>
                        <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>
                        <td>{{ $lista->name_type }}</td>             
                        <td>{{ date('m-d-Y', strtotime( $lista->date_appointments )) }}</td>
                        <td>{{ $lista->name_schedules }}</td>
                        <td>{{ $lista->start_time }}</td>
                        <td> {{ $lista->name_state_appointments }} </td>       
                        <td>{{ $lista->m_name }} {{ $lista->m_apellidos }}</td>
                        <td><button  value="{{ $lista->id_medical_appointments }}" type="button" class="btn btn-primary btn-xs load_dates_reserva" >Edtiar Cita Medica</button></td>
                        
                    </tr>
                
                @endforeach
            </tbody>
        </table>        
    </div>
    <div class="x_footer">        
    </div>
</div>
<div class="load_edit_reserva"></div>