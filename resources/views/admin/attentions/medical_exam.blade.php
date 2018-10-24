<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="x_panel">
        @foreach($exam_medic as $dat)
            <div class="x_content">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <h4><label>ORDEN DE EXAMEN MEDICO</label></h4>  
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Fecha:</label> {{ date('d/m/Y', strtotime($dat->date_creation)) }}
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <label for="">Nro. Cita Medica: </label> {{ $dat->id_appoinments }}
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nombre Paciente:</label> {{ $dat->nombres }} {{ $dat->ap_paterno }} {{ $dat->ap_materno }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Ci:</label> {{ $dat->ci_paciente }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Edad: </label>
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Medico Solicitante:</label> {{ $dat->name }} {{ $dat->apellidos }}
                    </div>
                    <div class="col-md-4"></div>                    
                </div> <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tipo Examen Medico:</label> {{ $dat->name_medical_exam }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Motivo Examen Medico:</label> {{ $dat->reason_medical_examn }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Observaciones:</label> {{ $dat->observation_medical_exam }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success">Imprimir Orden Medica</button>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-success">Editar Orden Medica</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>