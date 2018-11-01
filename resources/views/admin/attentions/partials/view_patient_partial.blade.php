<div class="row datos_paciente">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                @if(($dates_patient[0]->filiacion_completa)=='n')
                <div class="alert alert-danger borrar_bt">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-user fa-lg fa-li"></i> La Filiacion del Paciente no esta COMPLETA...!
                        </li>
                    </ul>
                </div>
                @else
                <!--button type="button" class="btn btn-info"> <span class=""></span> Ver datos Filiacion</button-->
                <div class="alert alert-success borrar_bt">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-user fa-lg fa-li"></i> Informacion Personal
                        </li>
                    </ul>
                </div>
                @endif                
            </div>
            <div class="x_content"></div>
            <div class="row full_dates"></div>
            <div class="row add_completing"></div>
            <div class="row" id="delete">
                <div class="col-md-6">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td class="col-md-4">
                                    <label for="">CI.:</label>
                                </td>
                                <td> {{ $dates_patient[0]->ci_paciente }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">NOMBRES:</label>
                                </td>
                                <td> {{ $dates_patient[0]->nombres }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">APELLIDOS:</label>
                                </td>
                                <td>{{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">FECHA NACIMIENTO:</label>
                                </td>
                                <td>{{ $dates_patient[0]->fecha_nacimento }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">GENERO:</label>
                                </td>
                                <td>{{ $dates_patient[0]->sexo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td class="col-md-4">
                                    <label for="">DIRECCION:</label>
                                </td>
                                <td> {{ $dates_patient[0]->direccion }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">PAIS DE NACIMIENTO:</label>
                                </td>
                                <td> {{ $dates_patient[0]->pais_nacimiento }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">LUGAR DE NACIMIENTO:</label>
                                </td>
                                <td> {{ $dates_patient[0]->localidad_nacimiento }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">TELEFONO - CELULAR:</label>
                                </td>
                                <td>{{ $dates_patient[0]->telefono }} - {{ $dates_patient[0]->celular }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-5">
                                    <label for="">FECHA DE REGISTRO:</label>
                                </td>
                                <td>{{ $dates_patient[0]->fecha_creacion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr> @if(($dates_patient[0]->filiacion_completa)=='s')
            <div class="row">
                <div class="col-md-6">
                    <div class="box-header">
                        <center>
                            <h3 class="box-title"> Datos Medicos</h3>
                        </center>
                    </div>
                    <div class="x_content">
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
                </div>
                <div class="col-md-6">
                    <div class="box-header">
                        <center>
                            <h3 class="box-title"> Patologias de Paciente</h3>
                        </center>
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
                                @forelse($pat as $d)
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
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <!--button type="button" class="btn btn-info"> <span class=""></span> Ver datos Filiacion</button-->
            @endif
            <div class="row">
                <div class="col-md-12">
                    <center>
                        @if(($dates_patient[0]->filiacion_completa)=='n')
                        <button type="button" value="{{ $dates_patient[0]->id_paciente }}" class="filiation_completing btn btn-danger"> <span class=""></span> Completar datos Filiacion</button>
                        @else
                        <!--button type="button" class="btn btn-info"> <span class=""></span> Ver datos Filiacion</button-->
                        @endif
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="load_dates_patients_full" id="load_dates_patients_full">
    </div>
</div>