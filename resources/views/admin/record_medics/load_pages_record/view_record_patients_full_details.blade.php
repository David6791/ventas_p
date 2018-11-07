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
<div class="row separar">
    <div class="col-md-6">
        <div class="box box-body box-primary">
            
            <div class="box-body">
                <div class="box-header">
                    <h3 class="box-title">Patologias</h3>
                </div>
                <table id="example2" class="table table-bordered table-hover charge_modify_table">
                    <thead>
                        <th>Nro.</th>
                        <th>Nombre Patologia</th>
                        <th>Descripcion</th>
                        <!--th>Accion</th-->
                    </thead>
                    <tbody class="charge_modify">
                        <?php $a = 1 ?>
                            @forelse($patologies_medic as $d)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $d->nombre_patologia }}</td>
                                <td>No hay descripcion</td>
                                <!--td> <button class="btn btn-danger btn-xs delete_patologie_patient_update" value="{{ $d->id_patologia }}"> <span class="glyphicon glyphicon-trash"></span> Eliminar</button> </td-->
                            </tr>
                            @empty
                            <tr>
                                <td class="text-red">No Existen datos</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table> <br>
                <div class="box-header">
                    <h3 class="box-title">Datos Medicos</h3>
                </div>
                <div class="x_content">
                        @forelse($dr as $li)
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{ $li->pregunta_mostrar }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p for="" id="{{ $li->id_patent_date_medic }}">{{ $li->descripcion }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @empty
                        <label class="text-red" for="">No existen datos medicos</label>
                        @endforelse
                    </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-body box-primary">
            <div class="box-header">
                <h3 class="box-title">Notas Medicas al Momento de la Cita Medica </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="row">
                            <div class="col-md-12">
                                <?php $a = 1 ?>
                                    @forelse($not as $as)
                                    <label for="">{{$a++}}.- {{ $as->name_date }}:</label>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ $as->observations }}
                                        </div>
                                    </div>
                                    @empty
                                    <label class="text-red" for="">No existen datos para mostrar...</label>
                                    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row separar">
    <div class="col-md-6">
        <div class="box box-body box-primary">
            <div class="box-header">
                <h3 class="box-title">Transferencia Medicas del Paciente </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            @forelse($transfer_medic as $dat)
                            <div class="x_content">                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Fecha:</label> {{ date('d/m/Y', strtotime($dat->date_creation)) }}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nro. Transferencia:</label> {{ $dat->id_transfer_patient }}
                                    </div>
                                </div>
                                <hr>                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Medico Solicitante:</label> {{ $dat->name }} {{ $dat->apellidos }}
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Tipo Transferencia Medica:</label> {{ $dat->name_type_transfer }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Diagnostico:</label> {{ $dat->diagnostic }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Justificacion Transferencia:</label> {{ $dat->justified_transfer }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Origen Tranferencia:</label> {{ $dat->origin_transfer }}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Destino Transferencia:</label> {{ $dat->destini_transfer }}
                                    </div>
                                </div>
                            </div>
                            @empty
                                <label class="text-red" for="">No existen datos</label>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-body box-primary">
            <div class="box-header">
                <h3 class="box-title">Examenes Medicos </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        @forelse($exam_medics as $das)
                        <div class="x_panel">
                            <div class="x_content">                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Fecha:</label> {{ date('d/m/Y', strtotime($das->date_creation)) }}
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <label for="">Nro. Cita Medica</label> {{ $das->id_appoinments }}
                                    </div>
                                </div>                                
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Medico Solicitante:</label> {{ $das->name }} {{ $das->apellidos }}
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Tipo Examen Medico:</label> {{ $das->name_medical_exam }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Motivo Examen Medico:</label> {{ $das->reason_medical_examn }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Observaciones:</label> {{ $das->observation_medical_exam }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <label class="text-red" for="">Vacio</label>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                <button class="btn btn-success btn-sm"> <span class="fa fa-print"></span> Imprimir Historial Medico</button>
            </center>
        </div> <br>
    </div> <br>
</div>
<style>
.spa{    
    margin:10px;
}
.separar{
    margin-top:10px;
}
</style>