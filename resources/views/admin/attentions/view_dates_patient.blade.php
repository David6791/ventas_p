<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"> Atencion Paciente Citas Medicas ------ Paciente: {{ $dates_patient[0]->nombres }} {{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}</h3>           
    </div>
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos del Paciente</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Citas Anteriores</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Atencion Cita</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Tratamiento</a>
                </li>
                <!--li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Internacion</a>
                </li-->
                <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Examen Medico</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Traslado de Paciente</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content8" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Finalizar Cita Medica</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <div class="row">                        
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
                                        @endif                                    
                                    <div class="alert alert-success borrar_bt">
                                        <ul class="fa-ul">
                                            <li>
                                            <i class="fa fa-user fa-lg fa-li"></i> Informacion Personal
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="x_content"></div>
                                <div class="row full_dates"></div>
                                <div class="row add_completing"></div>
                                <div class="row" id="delete">
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
                                </div>
                                <hr>
                                @if(($dates_patient[0]->filiacion_completa)=='s')
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
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                            <div class="alert alert-warning">
                                <ul class="fa-ul">
                                    <li>
                                    <i class="fa fa-list fa-lg fa-li"></i> Lista de Citas Medicas Pasadas
                                    </li>
                                </ul>
                            </div>
                                <table id="datatable " class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Fecha</th>
                                            <th>Tipo Cita Medica</th>
                                            <th>Descripcion Cita Medica</th>
                                            <th>Estado Cita Medica</th>
                                            <th>Hora Cita</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1; $e=1 ?>
                                        @foreach($list_app as $lista)
                                            <tr>   
                                                <td>{{ $a++ }}</td>
                                                <td>{{ date('d/m/Y', strtotime($lista->date_appointments)) }}</td>
                                                <td>{{ $lista->name_type }}</td>
                                                <td>{{ $lista->appointment_description }}</td> 
                                                @if( $lista->name_state_appointments === 'Atendido')                                               
                                                    <td style="color:#1FC125"><span class="glyphicon glyphicon-ok"></span> {{ $lista->name_state_appointments }}</td>
                                                @else
                                                    <td style="color:#DA0000">{{ $lista->name_state_appointments }}</td>
                                                @endif

                                                <td>{{ $lista->start_time }}</td>
                                                <td><button class="btn btn-success btn-xs load_dates_appoinments"  href="" type="button" value="{{ $lista->id_medical_appointments }}">Ver Datos Consulta</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="load_dates_appointments_one">
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <div class="load_new_notes_medic"></div>
                    <div class="load_notes_medic">                    
                        <form class="form-horizontal form_send_dates_appointments_send" action="{{url('save_dates_appoinments_dates')}}" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                            <div class="row">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h3>Paciente: <small>{{ $dates_patient[0]->nombres }} {{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }} </small> </h3>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for=""> Tipo Consulta: </label> {{ $dates_cita_end[0]->name_type }}
                                            </div>
                                            <div class="col-md-8"></div>
                                        </div>
                                        @foreach($dat as $lo)
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <label for="">{{ $lo->name_date }}: </label>
                                                <textarea rows=3 name="{{ $lo->id_date_register }}" placeholder="{{ $lo->description_dates }}..." id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>    
                                            </div>                                
                                        </div> <br>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                            <label for="">Esta Cita Medica tendra Reconsulta...?</label>
                                                <div class="row"> <br>                                            
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-info click_exec_1"  value="">SI   </button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger click_cancel_1"  value="">NO   </button>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Observaciones...</label>
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control" rows="3" disabled placeholder="Escribir aqui ..." id="datos" name="observations_appointments"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <label for="">Observaciones de la Cita Medica</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" placeholder="Escriba aqui las Observaciones de la Cita Medica..." rows="5" name="observation_appointment_dates" id=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Datos Cita Medica</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </form>
                    </div>                 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_title">
                                <label for="">Registro de Tratamiento</label>
                            </div>
                            <div class="x_content">
                                <div class="borrar_1">
                                    @if(($control['detalle'])=='si')
                                    <form class="form-horizontal form_send_dates_treatment" action="{{url('save_dates_treatment')}}" method="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Incio <span class="required"></span></label>
                                                            <div class="form-group">
                                                                <div class='input-group date' id=''>
                                                                    <input name="treatment_start" id="myDatepicker3" type='text' class="form-control" value=""/>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Fin <span class="required"></span></label>
                                                            <div class="form-group">
                                                                <div class='input-group date' id=''>
                                                                    <input name="treatment_end" id="myDatepicker2" type='text' class="form-control" value=""/>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div> <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <label for="">Medicamentos Disponibles en el Policlinico</label>
                                                            </div>
                                                            <div class="x_content">
                                                                <table id="datatable" class="table table-bordered datatable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nro.</th>
                                                                            <th>Nombre Medicamento</th>
                                                                            <th>Cantidad Existente</th>   
                                                                            <th>Accion</th>
                                                                        </tr>
                                                                        <tbody>
                                                                        <?php $a = 1 ?>
                                                                            @foreach($list_mecines_disponibles as $lista)
                                                                                <tr>
                                                                                    <td>{{ $a++ }}</td>
                                                                                    <td>{{ $lista->name_medicine }}</td>
                                                                                    <td>{{ $lista->quantity_medicine }}</td>
                                                                                    <td><button type="button" class="btn btn-primary btn-xs move_file" value="{{ $lista->id_medicines }}">Agregar</button></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <label for="">Lista de Medicamentos para el Tratamiento</label>
                                                            </div>
                                                            <div class="x_content">
                                                                <table  id="datatable" class="table table-bordered datatable add_medicines">
                                                                    <tr>
                                                                        <th>Nro.</th>
                                                                        <th>Nombre Medicamento</th>
                                                                        <th>Cantidad Existente</th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <br>
                                                <div class="row">                                                
                                                    <div class="col-md-1"></div>
                                                        <div class="col-md-9">
                                                        <label for="">Indicaciones para el Tratamiendo</label>
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" placeholder="Escriba aqui las indicaciones del Tratamiento..." rows="5" name="indications_treatment" id=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <br> 
                                                <div class="row">
                                                    <div class="col-md-12"> <label for="" style="color:#FFF";>asdasdsa</label>
                                                        <center>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Datos Tratamiento</button>
                                                        </center>                                                        
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                    </form>
                                    @else
                                    <div class="row">
                                        <div class="x_panel">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="x_panel">
                                                        <div class="row">
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-7">
                                                                <h4><label>TRATAMIENTO QUE DEBE SEGUIR EL PACIENTE</label></h4>  
                                                            </div>
                                                        </div> <br>
                                                        <div class="row">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-3">
                                                                <label for="">Fecha Inicio Tratamiento:</label> {{ $view_treatment[0]->date_start_treatment }}
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-3">
                                                                <label for="">Fecha Fin Tratamiento:</label> {{ $view_treatment[0]->date_start_treatment }}
                                                            </div>
                                                        </div> <br>
                                                        <div class="row">
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-3">
                                                                <label for="">MEDICAMENTOS PARA EL TRATAMIENTO</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-3">
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
                                                                            @foreach($view_treatment as $lista)
                                                                                <tr>   
                                                                                    <td>{{ $a++ }}</td>
                                                                                    <td>{{ $lista->name_medicine }}</td>
                                                                                    <td>{{ $lista->quantity_medicine }}</td>                                                                                 
                                                                                </tr>
                                                                            @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>                                                            
                                                        </div> <br>
                                                        <div class="row">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-10">
                                                                <label for="">INDICACIONES PARA EL TRATAMIENTO</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                            {{ $view_treatment[0]->description_treatment }}
                                                            </div>
                                                        </div> <br>
                                                        <div class="row alinear">
                                                            <div class="col-md-6 alinear">
                                                                <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-print"> </span> Imprimir Tratamiento</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="button alinear" class="btn btn-success"> <span class="glyphicon glyphicon-print"> </span> Editar Tratamiento</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    @endif    
                                </div>
                                <div class="treat_content">

                                </div>                        
                            </div>                         
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_title">
                                <label for=""> Formulario de Internacion</label>
                            </div>
                            <div class="x_content">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_title">
                                <label for="">Registrar Examenes Medicos del Paciente</label>
                            </div>
                            <div class="x_content">
                                @if(empty($ex_medics[0]['id_medical_exam']))
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-5">
                                                        <h4><label>ORDEN DE EXAMEN MEDICO</label></h4>  
                                                    </div>
                                                </div>                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Fecha: {{ date('d/m/Y', strtotime($ex_medics[0]['date_creation'])) }}
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-3">
                                                        Nro. Cita Medica {{ $ex_medics[0]['id_appoinments'] }}
                                                    </div>
                                                </div> <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Nombre Paciente: {{ $ex_medics[0]['nombres'] }} {{ $ex_medics[0]['ap_paterno'] }} {{ $ex_medics[0]['ap_materno'] }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        Ci: {{ $ex_medics[0]['ci_paciente'] }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        Edad: 
                                                    </div>
                                                </div> <hr>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        Medico Solicitante: {{ $ex_medics[0]['name'] }} {{ $ex_medics[0]['apellidos'] }}
                                                    </div>
                                                    <div class="col-md-4"></div>                    
                                                </div> <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Tipo Examen Medico: {{ $ex_medics[0]['name_medical_exam'] }}
                                                    </div>
                                                </div> <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Motivo Examen Medico: {{ $ex_medics[0]['reason_medical_examn'] }}
                                                    </div>
                                                </div> <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Observaciones: {{ $ex_medics[0]['observation_medical_exam'] }}
                                                    </div>
                                                </div> <br>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-6">
                                                        <!--a type="button" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aexamen_medico.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Imprimir Orden Medica</a-->
                                                        <a type="button" target="_blank" href="http://10.10.165.108:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aexam_medic.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Imprimir Orden Medica</a>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button type="button" value="{{ $ex_medics[0]['id_medical_exam_patient'] }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar Orden Medica</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="x_panel con1">
                                        <form class="form-horizontal form-label-left sendform_medical_exam" novalidate action="{{url('register_medical_exam')}}" method="post">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">
                                                <label for="">Seleccione tipo de Examen Medico: </label>
                                                    <select name="id_medical_exam" id="" class="select2_group form-control">                                                                                                                                                  
                                                        @foreach($ex_medics as $li)
                                                            <option value="{{ $li['id_medical_exam'] }}">{{ $li['name_medical_exam'] }}</option>        
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5"></div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-6">
                                                    <label for="">Describa el Motivo para solicitar el Exame Medico</label>
                                                    <textarea class="select2_group form-control" name="reason_medical_exam" id="" placeholder="Ingrese aqui los motivos."></textarea>
                                                </div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-6">
                                                    <label for="">Observaciones...</label>
                                                    <textarea class="select2_group form-control" name="observations_medical_exam" id="" placeholder="Ingrese observaciones."></textarea>
                                                </div>
                                            </div> <br>
                                            <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-5">
                                                    <button type="submit" class="btn btn-primary">Registrar Examen Medico</button> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                                                
                                @endif
                                </div>                                
                            <div class="con2">

                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_title">
                                <label for="">Registro de Traslado de Pacientes</label>
                            </div>
                            <div class="x_content c_transfer1">
                                @if(empty($types_transfer[0]['description_type_transfer']))
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="x_panel">
                                            @foreach($types_transfer as $dat)
                                                <div class="x_content">
                                                    <div class="row">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-7">
                                                            <h4><label>ORDEN DE TRANSFERENCIA MEDICA</label></h4>  
                                                        </div>
                                                    </div>                
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            Fecha: {{ date('d/m/Y', strtotime($dat['date_creation'])) }}
                                                        </div>
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-3">
                                                            Nro. Transferencia {{ $dat['id_transfer_patient'] }}
                                                        </div>
                                                    </div> <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Nombre Paciente: {{ $dat['nombres'] }} {{ $dat['ap_paterno'] }} {{ $dat['ap_materno'] }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            Ci: {{ $dat['ci_paciente'] }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            Edad: 
                                                        </div>
                                                    </div> <hr>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            Medico Solicitante: {{ $dat['name'] }} {{ $dat['apellidos'] }}
                                                        </div>
                                                        <div class="col-md-4"></div>                    
                                                    </div> <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            Tipo Transferencia Medica: {{ $dat['name_type_transfer'] }}
                                                        </div>
                                                    </div> <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            Diagnostico: {{ $dat['diagnostic'] }}
                                                        </div>
                                                    </div> <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            Justificacion Transferencia: {{ $dat['justified_transfer'] }}
                                                        </div>
                                                    </div> <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Origen Tranferencia: {{ $dat['origin_transfer'] }}
                                                        </div>
                                                        <div class="col-md-6">
                                                            Destino Transferencia: {{ $dat['destini_transfer'] }}
                                                        </div>
                                                    </div> <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <!--a type="button" target="_blank" href="http://192.168.1.106:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Atraslado.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir Orden Transferencia</a-->
                                                        <a type="button" target="_blank" href="http://10.10.165.108:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Atraslado.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $dates_cita_end[0]->id_medical_appointments }}" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir Orden Transferencia</a>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> Editar Orden Transferencia</button>
                                                        </div>
                                                    </div>                
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <form class="form-horizontal sendform_transfer_patients" action="{{url('store_patients_transfer')}}" method="post">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <input type="hidden" name="id_appoinments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                                                <input type="hidden" name="id_patient" value="{{ $dates_patient[0]->id_paciente }}">
                                                <div class="row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="x_panel">
                                                                    <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                            <h3>Motivos Traslado</h3> <br>
                                                                            Diagnostico
                                                                            <textarea name="diagnostic" id="" class="select2_group form-control" placeholder="Escriba aqui."></textarea>
                                                                        </div>
                                                                    </div> <br>
                                                                    <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                            Justificacion Traslado
                                                                            <textarea name="justifi_transfer" id="" class="select2_group form-control" placeholder="Escriba aqui."></textarea>
                                                                        </div>
                                                                    </div> <br>
                                                                    <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-10">
                                                                            <label for="">Tipo Traslado</label> <br>
                                                                            @foreach(array_chunk($types_transfer, 3) as $chunk)
                                                                                <div class="row">                                            
                                                                                    @foreach($chunk as $add)
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group col-md-12">
                                                                                                <div class="">
                                                                                                    <label class="control-label">
                                                                                                        <input type="checkbox" name="type_transfer" value="{{ $add['id_type_transfer'] }}">                                                                                            
                                                                                                        {{ $add['name_type_transfer'] }}
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                        <div class="col-md-5">
                                                                            <label for=""> Origen Traslado</label>
                                                                            <input class="select2_group form-control" type="text" name="origin_trasnfer">
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label for="">Destino Traslado</label>                                                            
                                                                            <input class="select2_group form-control" type="text" name="destyni_trasnfer">
                                                                        </div>
                                                                    </div> <br>
                                                                    <div class="row">
                                                                        <div class="col-md-5"></div>
                                                                        <div class="col-md-">
                                                                            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Datos</button>
                                                                        </div>
                                                                    </div>                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>                                
                                @endif                                
                            </div>
                            <div class="c_transfer2">

                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="">
                    <div class="row">
                        <div class="x_panel">                            
                            <div class="x_content">
                                <div class="col-md-12">
                                    <div class="center-block">
                                        <h1>DESEA TERMINAR LA CONSULTA MEDICA...?</h1>
                                        <button type="button" class="btn btn-warning end_medical_appointments" value="{{ $dates_cita_end[0]->id_medical_appointments }}">Finalizar Cita Medica</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.center-block{
    position:relative;
    text-align: center;
}
.alinear{
    text-align: center;
}
.vertical-menu a{
    width:100%;
    margin-top:10px;
}
</style>
<script>
    $('#datatable').DataTable();
    $('#myDatepicker3').datepicker({});
    $('#myDatepicker2').datepicker({});
</script>