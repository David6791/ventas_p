<br>
<div class="haber">
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
</div> <br>
<div class="row">    
    <div class="col-md-6">
        <div class="haber">
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
    </div>
    <div class="col-md-6">
        <center>
            <div class="box-header">
                <h3 class="box-title">Tratamiento</h3>
            </div>
        </center>
        <div class="row">
            <div class="x_panel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">                            
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Fecha Inicio Tratamiento:</label> {{ $treat[0]->date_start_treatment }}
                                </div>
                                <div class="col-md-6">
                                    <label for="">Fecha Fin Tratamiento:</label> {{ $treat[0]->date_start_treatment }}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">MEDICAMENTOS PARA EL TRATAMIENTO</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nro.</th>
                                                <th>Nombre Medicamento</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $a = 1 ?>
                                            @foreach($treat as $lista)
                                            <tr>
                                                <td>{{ $a++ }}</td>
                                                <td>{{ $lista->name_medicine }}</td>
                                                <td>{{ $lista->quantity_medicine }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">INDICACIONES PARA EL TRATAMIENTO</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    {{ $treat[0]->description_treatment }}
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-md-6">
        <div class="haber">
            <center>
                <div class="box-header">
                    <h3 class="box-title">Examen Medico</h3>
                </div>
            </center>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                    @foreach($exam_medic as $dat)
                        <div class="x_content">                                      
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
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <center>
            <div class="box-header">
                <h3 class="box-title">Traslado Paciente</h3>
            </div>
        </center>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                @foreach($transfer_medic as $dat)
                    <div class="x_content">
                        <div class="row">
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
.haber{
    background-color: #f2f2f2;
    
}
</style>