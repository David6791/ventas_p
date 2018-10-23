<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="x_panel">
        @foreach($transfer_medic as $dat)
            <div class="x_content">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <h4><label>ORDEN DE TRANSFERENCIA MEDICA</label></h4>  
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-3">
                        Fecha: {{ date('d/m/Y', strtotime($dat->date_creation)) }}
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        Nro. Transferencia {{ $dat->id_transfer_patient }}
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-6">
                        Nombre Paciente: {{ $dat->nombres }} {{ $dat->ap_paterno }} {{ $dat->ap_materno }}
                    </div>
                    <div class="col-md-3">
                        Ci: {{ $dat->ci }}
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
                        Tipo Transferencia Medica: {{ $dat->name_type_transfer }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        Diagnostico: {{ $dat->diagnostic }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        Justificacion Transferencia: {{ $dat->justified_transfer }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                        Origen Tranferencia: {{ $dat->origin_transfer }}
                    </div>
                    <div class="col-md-6">
                        Destino Transferencia: {{ $dat->destini_transfer }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                    <button type="button" class="btn btn-success">Imprimir Orden Transferencia</button>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-success">Editar Orden Transferencia</button>
                    </div>
                </div>                
            </div>
        </div>
        @endforeach
    </div>
</div>