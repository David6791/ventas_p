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
                        Fecha: {{ date('d/m/Y', strtotime($dat->date_creation)) }}
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        Nro. Cita Medica {{ $dat->id_appoinments }}
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-6">
                        Nombre Paciente: {{ $dat->nombres }} {{ $dat->ap_paterno }} {{ $dat->ap_materno }}
                    </div>
                    <div class="col-md-3">
                        Ci: {{ $dat->ci_paciente }}
                    </div>
                    <div class="col-md-3">
                        Edad: 
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-8">
                        Medico Solicitante: {{ $dat->name }} {{ $dat->apellidos }}
                    </div>
                    <div class="col-md-4"></div>                    
                </div> <hr>
                <div class="row">
                    <div class="col-md-12">
                        Tipo Examen Medico: {{ $dat->name_medical_exam }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        Motivo Examen Medico: {{ $dat->reason_medical_examn }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        Observaciones: {{ $dat->observation_medical_exam }}
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