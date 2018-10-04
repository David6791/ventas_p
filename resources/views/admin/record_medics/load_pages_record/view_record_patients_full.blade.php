<div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h3 class="box-title text-green">Paciente: {{ $list_record[0]['nombres'] }} {{ $list_record[0]['ap_paterno'] }} {{ $list_record[0]['ap_materno'] }}</h3>
                    </div>
                </div>             
            <div class="row"> <br>
                <div class="col-md-1"></div>
                <div class="col-md-2">                       
                    <h3 class="box-title text-green">CI: {{ $list_record[0]['ci_paciente'] }} </h3>
                </div>
                <div class="col-md-3">
                    <h3 class="box-title text-green">Fecha Nacimiento: {{ $list_record[0]['fecha_nacimento'] }} </h3>
                </div>
                <div class="col-md-2">
                    <h3 class="box-title text-green">Direccion:  </h3>
                </div>
            </div>
              
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                <?php $a = 1 ?>
                @if(!isset($list_record[0]['id_medical_appointments']))
                <div class="box box-primary"> <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="text-red">NO TIENE CITAS MEDICAS.</label>
                        </div>
                    </div>
                </div>
                @else
                @forelse($list_record as $li)            
                @if($a==1)
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $li['id_medical_appointments'] }}">
                            Historial Nro. {{ $a++ }} - Fecha: {{date('d-m-Y', strtotime($li['date_appointments']))}}
                            </a>
                        </h4>
                    </div>
                    <div id="{{ $li['id_medical_appointments'] }}" class="panel-collapse collapse in">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Turno: {{ $li['name_schedules'] }}
                                </div>
                                <div class="col-md-4">
                                    Hora: {{ $li['start_time'] }}
                                </div>
                                <div class="col-md-4">
                                    Estado: {{ $li['name_state_appointments'] }}
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-12">
                                    Descripcion Cita Medica: {{ $li['appointment_description'] }}
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="text-green"> DATOS DEL MEDICO</label>
                                </div>
                            </div>                                            
                            <div class="row">
                                <div class="col-md-8">
                                    Nombre Medico: {{ $li['name'] }} {{ $li['apellidos'] }}
                                </div>
                                <div class="col-md-4">
                                    Ci: {{ $li['ci_medic'] }}
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <center><button type="button" class="btn btn-success view_full_record_medic" value="{{ $li['id_medical_appointments'] }}"> <span class="glyphicon glyphicon-eye-open"></span> Ver Historial Completo</button></center>
                                </div>
                                <div class="col-md-6">
                                    <center>
                                        <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir</button>
                                    </center>                                    
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                @else
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $li['id_medical_appointments'] }}">
                            Historial Nro. {{ $a++ }} - Fecha: {{date('d-m-Y', strtotime($li['date_appointments']))}}
                            </a>
                        </h4>
                    </div>
                    <div id="{{ $li['id_medical_appointments'] }}" class="panel-collapse collapse">
                        <div class="box-body">
                                <div class="row">
                                <div class="col-md-4">
                                    Turno: {{ $li['name_schedules'] }}
                                </div>
                                <div class="col-md-4">
                                    Hora: {{ $li['start_time'] }}
                                </div>
                                <div class="col-md-4">
                                    Estado: {{ $li['name_state_appointments'] }}
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-12">
                                    Descripcion Cita Medica: {{ $li['appointment_description'] }}
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="text-green"> DATOS DEL MEDICO</label>
                                </div>
                            </div>                                            
                            <div class="row">
                                <div class="col-md-8">
                                    Nombre Medico: {{ $li['name'] }} {{ $li['apellidos'] }}
                                </div>
                                <div class="col-md-4">
                                    Ci: {{ $li['ci_medic'] }}
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <center><button type="button" class="btn btn-success view_full_record_medic" value="{{ $li['id_medical_appointments'] }}"> <span class="glyphicon glyphicon-eye-open"></span> Ver Historial Completo</button></center>
                                </div>
                                <div class="col-md-6">
                                    <center>
                                        <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir</button>
                                    </center>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @empty
                    asdasdsa
                @endforelse
                @endif
                </div>    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>