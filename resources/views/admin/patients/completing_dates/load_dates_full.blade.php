<div class="col-md-6">
    <table class="table table-user-information">
        <tbody>
            <tr>
                <td class="col-md-4"><label for="">CI.:</label></td>
                <td> {{ $dates_patient[0]->ci_paciente }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">NOMBRES:</label></td>
                <td> {{ $dates_patient[0]->nombres }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">APELLIDOS:</label> </td>
                <td>{{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">FECHA NACIMIENTO:</label> </td>
                <td>{{ $dates_patient[0]->fecha_nacimento }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">GENERO:</label> </td>
                <td>{{ $dates_patient[0]->sexo }}</td>
            </tr>
        </tbody>
    </table>                                        
    </div>
    <div class="col-md-6">
    <table class="table table-user-information">
        <tbody>
            <tr>
                <td class="col-md-4"><label for="">DIRECCION:</label></td>
                <td> {{ $dates_patient[0]->direccion }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">PAIS DE NACIMIENTO:</label></td>
                <td> {{ $dates_patient[0]->pais_nacimiento }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">LUGAR DE NACIMIENTO:</label></td>
                <td> {{ $dates_patient[0]->localidad_nacimiento }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">TELEFONO - CELULAR:</label> </td>
                <td>{{ $dates_patient[0]->telefono }} - {{ $dates_patient[0]->celular }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">FECHA DE REGISTRO:</label> </td>
                <td>{{ $dates_patient[0]->fecha_creacion }}</td>
            </tr>
        </tbody>
    </table>                                        
</div>
<div class="col-md-6">
    <div class="box-header">
        <h3 class="box-title">Patologias del Paciente</h3>
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
            @forelse($patologias as $d)
            <tr>
                <td>{{ $a++ }}</td>
                <td>{{ $d->nombre_patologia }}</td>
                <td>No hay descripcion</td>
                <!--td> <button class="btn btn-danger btn-xs delete_patologie_patient_update" value="{{ $d->id_patologia }}"> <span class="glyphicon glyphicon-trash"></span> Eliminar</button> </td-->
            </tr>
            @empty
                <tr>
                    <td>No Existen datos</td>
                </tr>
                </tr>
            @endforelse
            
        </tbody>
    </table> 
</div> <br>
<hr> 
<div class="col-md-6">
    <div class="box-header">
        <h3 class="box-title">Datos Medicos del Paciente</h3>
    </div>
    @forelse($datos_medicos as $li)
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
        <label for="">No existen datos medicos</label>
    @endforelse
</div>