<div class="col-md-12">
    <form class="sendform_patients_update" action="{{url('update_patients_dates')}}" method="post" autocomplete="off">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="id_patient" value="{{ $dates_patient[0]->id_paciente }}">
        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <center><h3 class="box-title">Datos Generales del Paciente</h3></center>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nro. Documento </label> 
                    <small class="text-red" id=""></small>
                    <input name="ci" type="text" value="{{ $dates_patient[0]->ci_paciente }}" class="form-control col-md-7 col-xs-12 name_form" id="inputEmail3" placeholder="">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <div class="form-group">
                <small class="text-red" id=""></small>
                    <label for="exampleInputEmail1" class="control-label">Genero</label> 
                    <small class="text-red" id=""></small>
                    <div id="" data-toggle="buttons" class="btn-group">
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        
                            <input type="radio" name="genero" value="Masculino" data-parsley-multiple="genero" class="name_form"> Masculino &nbsp;
                        </label>
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        
                            <input type="radio" name="genero" value="Femenino" data-parsley-multiple="genero" class="name_form"> Femenino
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombres</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="nombre" value="{{ $dates_patient[0]->nombres }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido Paterno</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_paterno" value="{{ $dates_patient[0]->ap_paterno }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido Materno</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_materno" value="{{ $dates_patient[0]->ap_materno }}">
                </div>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Direccion</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="direccion" value="{{ $dates_patient[0]->direccion }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="telefono" value="{{ $dates_patient[0]->telefono }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="celular" value="{{ $dates_patient[0]->celular }}">
                </div>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Fecha de Nacimiento</label> 
                    <small class="text-red" id=""></small>
                    <input id="datepicker" type="text" class="form-control col-md-7 col-xs-12 name_form" name="fecha_nacimiento" value="{{ $dates_patient[0]->fecha_nacimento }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nacionalidad</label>
                    <small class="text-red" id=""></small>
                    <select class="select2_group form-control name_form" name="nacionalidad" value="{{ $dates_patient[0]->pais_nacimiento }}">
                        <option value="Boliviano">Boliviano</option>
                        <option value="Argentino">Argentino</option>
                        <option value="Chileno">Chileno</option>
                        <option value="Peruano">Peruano</option>                                       
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ciudad</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="ciudad" value="{{ $dates_patient[0]->ciudad_nacimiento }}"> 
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Provincia</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="provincia" value="{{ $dates_patient[0]->provincia }}"> 
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Localidad</label> 
                    <small class="text-red" id=""></small>
                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="localidad" value="{{ $dates_patient[0]->localidad_nacimiento }}"> 
                </div>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-6">
                <center>
                    <div class="box-header">
                        <h3 class="box-title">
                            Patologias del Paciente        
                        </h3>
                    </div>
                </center>
                <div class="box-body">
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
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                            <button class="btn btn-success btn-xm edit_pat_patients" value="{{ $dates_patient[0]->id_paciente }}"> <span class="glyphicon glyphicon-edit"></span> Editar</button></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <center>
                    <div class="box-header">
                        <h3 class="box-title">
                            Datos Medicos del Paciente        
                        </h3>
                    </div>
                </center>
                <div class="load_date_medic">
                </div>
                <div class="box-body update_dates_medic">
                    @forelse($dates_medic as $li)
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{ $li->pregunta_mostrar }}
                                            </th>
                                            <th width="140px" ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p for="" id="{{ $li->id_patent_date_medic }}">{{ $li->descripcion }}</p>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-xs edit_dates_medic_patient" value="{{ $li->id_patent_date_medic }}"> <span class="glyphicon glyphicon-edit"></span> Editar</button>  <button class="btn btn-danger btn-xs delete_dates_medic_patient" value="{{ $li->id_patent_date_medic }}"> <span class="glyphicon glyphicon-crash"></span> Eliminar</button>   
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>                         
                    @empty
                        <label for="">No existen datos medicos</label>
                    @endforelse
                    <div class="row">
                        <center>
                            <button class="btn btn-success add_date_new_medic" value="{{ $dates_patient[0]->id_paciente }}"> Agregar Nuevo dato Medico</button>
                        </center>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <center>
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </center>
        </div>
    </form>
</div>
<!-- modal para editar los roles de usuario -->
<div class="modal fade" id="modal-edit-dates_medic">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_edit_date_medic_patient" id="form_edit" novalidate action="{{url('edit_date_medic_patient')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name= "id_date_medic" value="" id="id_date_medic">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Dato Medico</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" id="name_date_medic"> </label><small class="text-red" id=""></small>
                                                <textarea type="text" class="form-control name_form" id="descripcion" name= "rol_edit" placeholder=""> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

<!-- modal para editar las patologias del Paciente -->
<div class="modal fade" id="modal_edit_pat_patients">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_edit_pat_patient" id="form_edit" novalidate action="{{url('edit_pat_patient')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name= "id_patient" value="" id="id_patient">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Patologias del Paciente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered table-hover delete_pat">
                                                <thead>
                                                    <th>Nro.</th>
                                                    <th>Patologia</th>
                                                    <th>Quitar</th>
                                                </thead>
                                                <tbody class="delete_add_table">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered table-hover add_pat">
                                                <thead>
                                                    <th>Nro.</th>
                                                    <th>Patologia</th>
                                                    <th>Agregar</th>
                                                </thead>
                                                <tbody class="delete_delete_table">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

<!-- modal para agregar datos medicos del Paciente -->
<div class="modal fade" id="modal-add-dates_medic">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_completing_dates" id="form_edit" novalidate action="{{url('completing_dates_patient')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name= "id_patient_dates" value="" class="id_patient_dates">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Datos Medicos del Paciente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <table id="datatable" class="table table-striped table-bordered table_dates_medics">
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Dato Medico</th>
                                                    <th>Opcion</th>
                                                </tr>
                                            </thead>
                                            <tbody class="delete_daes_medic">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>