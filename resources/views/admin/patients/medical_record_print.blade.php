<div class="row">
    <div class="col-md-12">
        <center><h3>HISTORIAL MEDICO</h3></center>
    </div>
</div>
<table>
    <td width="320" tyle="color:#FF0000"><span></span></td>
    <td>FECHA CITA MEDICA:</td>
</table> <br>
<table>
    <td>
        NOMBRES:
    </td>
    <td width="150">{{ $paciente[0]->nombres }}</td>    
    <td>
        APELLIDOS: 
    </td>
    <td>{{ $paciente[0]->ap_paterno }}</td> 
    <td>
    {{ $paciente[0]->ap_materno }}
    </td>
</table>
<table>
    <td>FECHA NACIMIENTO:</td>
    <td width="50">{{ $paciente[0]->fecha_nacimento }}</td>

</table>
<table>
    <td>EDAD:</td>
    <td width="50"><span></span></td>
    <td>SEXO:</td>
    <td width="80">{{ $paciente[0]->sexo }}</td>
    <td>ESTADO CIVIL:</td>
    <td width="80">Soltero(@)</td>
    <td>TELEFONO:</td>
    <td width="50">{{ $paciente[0]->telefono }}</td>
</table>

<table>
    <td>PAIS:</td>
    <td width="50">{{ $paciente[0]->pais_nacimiento }}</td>
    <td>DEPARTAMENTO:</td>
    <td width="50">{{ $paciente[0]->ciudad_nacimiento }}</td>
    <td>PROVINCIA:</td>
    <td width="70">{{ $paciente[0]->provincia }}</td>
    <td>LOCALIDAD:</td>
    <td width="50">{{ $paciente[0]->localidad_nacimiento }}</td>
</table>
<table>
    <td>DIRECCION:</td>
    <td width="150">{{ $paciente[0]->direccion }}</td>
    <td>TELEFONO:</td>
    <td width="50">{{ $paciente[0]->telefono }}</td>
    <td>CELULAR:</td>
    <td width="70">{{ $paciente[0]->celular }}</td>    
</table>
<div class="row">
    <div class="col-md-12">
        <h5>PATOLOGIAS:</h5> 
        @forelse($pato as $p)
        {{ $p->nombre_patologia }},
        @empty
        @endforelse
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>DATOS MEDICOS:</h5>
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
<div class="box box-body box-primary">
    <div class="box-header">
        <h3 class="box-title">Notas Medicas al Momento de la Cita Medica </h3>
    </div>
    <table>
        <?php $a = 1 ?>
        @forelse($notes as $as)
        <tr>
            <td>{{$a++}}.- {{ $as->name_date }}:</td>
        </tr>
        <tr>
            <td>{{ $as->observations }}</td>
        </tr>
        @empty
        @endforelse
    </table>    
</div>
<div class="box box-body box-primary">
    <div class="box-header">
        <h3 class="box-title">Transferencia Medicas del Paciente </h3>
    </div>
    @forelse($transfer_medic as $dat)
    <table>
        <tr>
            <td>FECHA TRANSFERENCIA:</td>
            <td width="170">{{ date('d/m/Y', strtotime($dat->date_creation)) }}</td>
            <td>NUMERO TRANSFERENCIA: </td>
            <td> {{ $dat->id_transfer_patient }}</td>
        </tr>
        <tr>
            <td>MEDICO SOLICITANTE:</td>
            <td>{{ $dat->name }} {{ $dat->apellidos }}</td>
        </tr>
        <tr>
            <td>TIPO TRANSFERENCIA MEDICA</td>
            <td>{{ $dat->name_type_transfer }}</td>
        </tr>        
    </table>
    <table>
        <tr>
            <td>DIAGNOSTICO:</td>
            <td>{{ $dat->diagnostic }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>JUSTIFICACION TRANSFERENCIA:</td>
            <td>{{ $dat->justified_transfer }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>ORIGEN TRANSFERENCIA:</td>
            <td width="100">{{ $dat->origin_transfer }}</td>
            <td>DESTINO TRANSFERENCIA:</td>
            <td>{{ $dat->destini_transfer }}</td>
        </tr>
    </table>
    @empty
    No existen registros de transferencias...
    @endforelse
</div
<div class="box box-body box-primary">
    <div class="box-header">
        <h3 class="box-title">Examenes Medicos </h3>
    </div>
    @forelse($exam_medics as $das)
    <table>
        <tr>
            <td>FECHA:</td>
            <td width="190">{{ date('d/m/Y', strtotime($das->date_creation)) }}</td>
            <td>NUMERO CITA MEDICA:</td>
            <td>{{ $das->id_appoinments }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>MEDICO SOLICITANTE:</td>
            <td>{{ $dat->name }} {{ $dat->apellidos }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>TIPO EXAMEN MEDICO</td>
            <td>{{ $das->name_medical_exam }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>MOTIVO EXAMEN MEDICO</td>
            <td>{{ $das->name_medical_exam }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>OBSERVACIONES</td>
            <td>{{ $das->observation_medical_exam }}</td>
        </tr>
    </table>
    <h4>Resultados Examen Medico</h4>
    No registro ninguno...
    @empty
    <label class="text-red" for="">No tiene Examenes Medicos Registrados</label>
    @endforelse

    </div>
</div>