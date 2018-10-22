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
    <div class="col-md-12">
        <label for="">Observaciones Cita Medica: </label> {{ $dates_cita[0]->appointment_description }}
    </div>
</div>
