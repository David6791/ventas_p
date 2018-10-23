<br>
<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <h3 class="box-title">Detalles Cita Medica</h3>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <label for="">Fecha Cita Medica </label> {{ $dates_cita[0]->date_appointments }}
    </div>
    <div class="col-md-4">
        <label for="">Turno </label> {{ $dates_cita[0]->name_schedules }}
    </div>
    <div class="col-md-4">
        <label for="">Hora Cita Medica </label> {{ $dates_cita[0]->start_time }}
    </div>
</div> <br>
<div class="row">
    <div class="col-md-6">
        <label for="">Medico: </label> {{ $dates_cita[0]->name }} {{ $dates_cita[0]->apellidos }}
    </div>
    <div class="col-md-6">
        <label for="">Medico: </label> {{ $dates_cita[0]->name_type }}
    </div>
</div> <br>
<div class="row">
    <div class="col-md-10">
        <label for="">Observaciones Cita Medica: </label> {{ $dates_cita[0]->appointment_description }}
    </div>
    <div class="col-md-2">
        @if($dates_cita[0]->reconsulta_register == 'N')
            <label class="text-red" for="">No tiene RECONSULTA</label>
        @else
            <label class="text-green" for="">Si tiene RECONSULTA</label>
        @endif
    </div>
</div> <br>
<div class="row">
    <div class="col-md-6">
        <center>
            <div class="box-header">
                <h3 class="box-title">Notas Medicas</h3>
            </div>
        </center>
        <div class="row">
            <div class="col-md-12">                
                <div class="row">
                    <div class="col-md-11">
                        <?php $a = 1 ?>
                        @forelse($notes_medic as $as)
                            <label for="">{{$a++}}.- {{ $as->name_date }}:</label> <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    {{ $as->observations }}
                                </div>
                            </div>
                        @empty
                            <label for="">No existen datos para mostrar...</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Reconsulta: </h3> <label for="" class="text-green"> Si tiene Reconsulta</label>
                </div>
                <div class="row">
                    <div class="col-md-5">Observaciones para Reconsulta</div>
                </div>        
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                        {{ $datos_1[0]->observation_re_medical_consusltation }}
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <h3 class="box-title">
                        Observaciones de la Cita Medica
                    </h3>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-9">
                {{ $datos_1[0]->observation_medical_appoinments }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <center>
            <div class="box-header">
                <h3 class="box-title">Tratamiento</h3>
            </div>
        </center>
    </div>
</div><br>
<div class="row">
    <div class="col-md-6">
        <center>
            <div class="box-header">
                <h3 class="box-title">Examen Medico</h3>
            </div>
        </center>
        
    </div>
    <div class="col-md-6">
        <center>
            <div class="box-header">
                <h3 class="box-title">Traslado Paciente</h3>
            </div>
        </center>
    </div>
</div>