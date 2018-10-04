<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
    <div class="box-header">
        <h2 class="box-title">Lista Citas Medicas</h2>
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
                @foreach($row as $lista)
                @if(date('m-d-Y', strtotime( $lista->date_appointments )) == date("m-d-Y") )
                    <tr bgcolor="FCEBEB">
                        <td>{{ $a++ }}</td>
                        <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>
                        <td>{{ $lista->name_type }}</td>             
                        <td>{{ date('m-d-Y', strtotime( $lista->date_appointments )) }}</td>
                        <td>{{ $lista->name_schedules }}</td>
                        <td>{{ $lista->start_time }}</td>
                        @if(($lista->name_state_appointments)==='Atendido')
                            <td> {{ $lista->name_state_appointments }} </td>    
                        @else
                            <td><button type="button" class="fa-hover btn btn-warning btn-xs modifi_state_appointment" value="{{$lista->id_medical_appointments}}"><i class="fa fa-cog"></i></button> {{ $lista->name_state_appointments }} </td>
                        @endif
                        
                        <td>{{ $lista->m_name }} {{ $lista->m_apellidos }}</td>
                        <td><!--td><button type="button" class="btn btn-primary btn-xs get_ViewAppointments" value="{{$lista->id_medical_appointments}}">Ver Detalles</button--><a target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aboleta_reserva_2.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $lista->id_medical_appointments }}" type="button" class="btn btn-primary btn-xs" >Imprimir</a></td>
                        
                    </tr>
                @else
                    <tr bgcolor="F0FCEB">
                        <td>{{ $a++ }}</td>
                        <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>  
                        <td>{{ $lista->name_type }}</td>                  
                        <td>{{ date('m-d-Y', strtotime( $lista->date_appointments )) }}</td>
                        <td>{{ $lista->name_schedules }}</td>
                        <td>{{ $lista->start_time }}</td>
                        @if(($lista->name_state_appointments)==='Atendido')
                            <td text-align="center"> {{ $lista->name_state_appointments }} </td>    
                        @else
                            <td><button type="button" class="fa-hover btn btn-warning btn-xs modifi_state_appointment" value="{{$lista->id_medical_appointments}}"><i class="fa fa-cog"></i></button> {{ $lista->name_state_appointments }} </td>
                        @endif
                        <!--td><button type="button" class="btn btn-primary btn-xs get_ViewAppointments" value="{{$lista->id_medical_appointments}}">Ver Detalles</button-->
                        <td>{{ $lista->m_name }} {{ $lista->m_apellidos }}</td>                            
                        <td><!--button type="button" class="btn btn-primary btn-xs get_ViewAppointments" value="{{$lista->id_medical_appointments}}"> <span class="glyphicon glyphicon-eye-open"></span> Ver Detalles</button--><a target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aboleta_reserva_2.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $lista->id_medical_appointments }}" type="button" class="btn btn-info btn-xs" > <span class="glyphicon glyphicon-print"></span> Imprimir</a></td>
                        
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>        
    </div>
    <div class="x_footer">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Nuevo Horario</button></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifi_state_appointment_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Especialidad <label for=""></label></h4>            
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_save_edit_Specialties" action="{{url('saveSpecialties')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_medical_appointments" value="" id="id_medical_appointments">
                @foreach(array_chunk($row1, 2) as $chunk)
                    <div class="row">                                            
                        @foreach($chunk as $add)
                            <div class="col-md-6">
                                <div class="form-group col-md-12">
                                    <div class="checkbox">
                                        <label class="control-label">
                                            <button type="button" class="btn btn-success btn-lg modifi_appointments" value="{{ $add->id_state_appointments }}">{{$add->name_state_appointments}}</button>                                            
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>