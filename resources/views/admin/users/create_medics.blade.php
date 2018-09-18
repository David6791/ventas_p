<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Registro Usuarios
                    </h3>
                </div>
                <form class=" form-label-left send_form_medics" novalidate action="{{url('add_user_medic')}}" method="post" autocomplete="off">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nro. Documento </label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" name="numero_documento" required="required" class="form-control col-md-7 col-xs-12 name_form" placeholder="Ingrese numero de Documento">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo Documento</label>
                                    <select class="select2_group form-control name_form" name="tipo_documento">
                                        <option value="1">Cedula de Identidad</option>
                                        <option value="2">Pasaporte</option>
                                        <option value="3">Libreta de Servicio Militar</option>
                                        <option value="4">DNI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="control-label">Genero</label> <br>
                                    <div id="" data-toggle="buttons" class="btn-group">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="genero" value="1" data-parsley-multiple="genero"> Masculino &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="genero" value="2" data-parsley-multiple="genero"> Femenino
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">Tipo Usuario</label>
                                    <select class="select2_group form-control charge_specialty" name="tipo_usuario">
                                        @foreach($rows as $lista)
                                            <option value="{{$lista->id_tipo}}">{{$lista->nombre_tipo}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombres</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="nombre">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_paterno">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_materno">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha de Nacimiento</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input id="datepicker" type="text" class="form-control col-md-7 col-xs-12 name_form" class="fecha_nacimiento">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado Civil</label>
                                        <select class="select2_group form-control name_form" name="estado_civil">
                                            @foreach($rows1 as $lista)
                                                <option value="{{$lista->id_estado_civil}}">{{$lista->nombre_estado_civil}}</option>
                                            @endforeach
                                        </select> 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nacionalidad</label>
                                    <select class="select2_group form-control" name="nacionalidad">
                                        <option value="1">Boliviano</option>
                                        <option value="2">Argentino</option>
                                        <option value="3">Chileno</option>
                                        <option value="4">Peruano</option>                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lugar de Nacimiento</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="lugar de nacimiento"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="direccion">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="telefono">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Celular</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="celular">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Profesion</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="profesion">
                                </div>
                            </div>
                        </div> <br>
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Datos para el Ingreso al Sistema
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <span class="glyphicon glyphicon-user"></span> Nombre de Usuario</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" placeholder="Ingrese Nombre de Usuario o Email" name="nombre_usuario">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <span class="glyphicon glyphicon-lock"></span> Contraseña</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="password" class="form-control col-md-7 col-xs-12 name_form" placeholder="Ingrese Contraseña" name="contraseña">
                                </div>
                            </div>
                        </div> <br>
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Datos de Referencia <small class="text-green">(De su Profesion)</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Matricula Profesional</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" placeholder="Ingrese Nombre de Usuario o Email" name="matricula">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Universidad de Egreso</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" placeholder="Ingrese Nombre de Usuario o Email" name="egreso">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Año de Egreso</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" placeholder="Ingrese Nombre de Usuario o Email" name="año_egreso">
                                </div>
                            </div>
                        </div>
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Especialidades del Medico <small class="text-green">(Seleccione todas las especialidades que tiene el Medico)</small>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <table id="example2" class="table table-bordered table-hover add_specialty">
                                    <thead>
                                        <tr>   
                                            <th>Nro.</th>
                                            <th>Nombre Especialidad</th>
                                            <th>Descripcion</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <?php $a = 1 ?>
                                    <tbody>
                                       <tr class="delete_table"> 
                                            <td></td>
                                            <td></td>
                                            <td class="text-red">Seleccione el tipo de usuario</td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <center>
                            <button class="btn btn-success"> <span class="fa fa-save"></span> Guardar</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
$('#datepicker').datepicker({
      autoclose: true
    })
</script>
