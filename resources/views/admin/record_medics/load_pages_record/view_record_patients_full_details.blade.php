<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <center><h3>HISTORIAL MEDICO</h3></center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <label for="">Fecha:</label> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Informacion del Paciente</h4>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="">NOMBRES:</label> {{ $paciente[0]->nombres }}
        </div>
        <div class="col-md-3">
            <label for="">APELLIDO PATERNO:</label> {{ $paciente[0]->ap_paterno }}
        </div>
        <div class="col-md-3">
            <label for="">APELLIDO MATERNO:</label> {{ $paciente[0]->ap_materno }}
        </div>
        <div class="col-md-3">
            <label for="">SEXO:</label> {{ $paciente[0]->sexo }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">  
            <label for="">FECHA NACIMIENTO:</label> {{ $paciente[0]->fecha_nacimento }}
        </div>
        <div class="col-md-6">
            <label for="">EDAD:</label> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">DIRECCION:</label> {{ $paciente[0]->direccion }}
        </div>
        <div class="col-md-4">
            <label for="">CELULAR:</label> {{ $paciente[0]->celular }}
        </div>
        <div class="col-md-4">
            <label for="">TELEFONO:</label> {{ $paciente[0]->telefono }}
        </div>
    </div>
</div>
<div class="box box-body">
    <div class="row">
        <div class="col-md-12">
            <h4>Datos Medicos Generales y Patologias del Paciente</h4>
        </div>
    </div>
</div>
<div class="box box-body">
    <div class="row">
        <div class="col-md-12">
            <h4>Notas Medicas al Momento de la Cita Medica</h4>
        </div>
    </div>
</div>
<div class="box box-body">
    <div class="row">
        <div class="col-md-12">
            <h4>Transferencia Medicas del Paciente </h4>
        </div>
    </div>
</div>
<div class="box box-body">
    <div class="row">
        <div class="col-md-12">
            <h4>Examenes Medicos </h4>
        </div>
    </div>
</div>
<div class="box box-body">
    <div class="row">
        <div class="col-md-12">
            <h4>Resultados Examenes Medicos </h4>
        </div>
    </div>
</div>
<style>
.spa{    
    margin:10px;
}
</style>