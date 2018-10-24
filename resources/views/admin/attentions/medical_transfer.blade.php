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
                        <label for="">Fecha:</label> {{ date('d/m/Y', strtotime($dat->date_creation)) }}
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <label for="">Nro. Transferencia:</label> {{ $dat->id_transfer_patient }}
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Nombre Paciente:</label> {{ $dat->nombres }} {{ $dat->ap_paterno }} {{ $dat->ap_materno }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Ci:</label> {{ $dat->ci }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Edad:</label> 
                    </div>
                </div> <hr>
                <div class="row">
                    <div class="col-md-8">
                       <label for=""> Medico Solicitante:</label> {{ $dat->name }} {{ $dat->apellidos }}
                    </div>
                    <div class="col-md-4"></div>                    
                </div> <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Tipo Transferencia Medica:</label> {{ $dat->name_type_transfer }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Diagnostico:</label> {{ $dat->diagnostic }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Justificacion Transferencia:</label> {{ $dat->justified_transfer }}
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Origen Tranferencia:</label> {{ $dat->origin_transfer }}
                    </div>
                    <div class="col-md-6">
                        <label for="">Destino Transferencia:</label> {{ $dat->destini_transfer }}
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