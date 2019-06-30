<section class="content">
    <div class="row">
        <form class="sendform_patients" action="{{url('store_patients')}}" method="post" autocomplete="off">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Datos Personales</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nro. Documento </label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->ci_paciente }}" name="ci" type="text" class="form-control col-md-7 col-xs-12 name_form" id="inputEmail3" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="control-label">Genero</label> <br>
                                    <small class="text-red" id=""></small>
                                    <select class="select2_group form-control name_form" name="genero">
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                    <!--div id="" data-toggle="buttons" class="btn-group">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="genero" value="Masculino" data-parsley-multiple="genero" class="name_form"> Masculino &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="genero" value="Femenino" data-parsley-multiple="genero" class="name_form"> Femenino
                                        </label>
                                    </div-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombres</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->nombres }}" type="text" class="form-control col-md-7 col-xs-12 name_form" name="nombre">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->ap_paterno }}" type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_paterno">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->ap_materno }}" type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_materno">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->direccion }}" type="text" class="form-control col-md-7 col-xs-12 name_form" name="direccion">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->telefono }}" type="text" class="form-control col-md-7 col-xs-12 name_form" name="telefono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Celular</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->celular }}" type="text" class="form-control col-md-7 col-xs-12 name_form" name="celular">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Datos de Nacimiento
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha de Nacimiento</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input value="{{ $dates_paciente[0]->fecha_nacimento }}" id="datepicker" type="text" class="form-control col-md-7 col-xs-12 name_form" name="fecha_nacimiento">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nacionalidad</label>
                                    <small class="text-red" id=""></small>
                                    <select class="select2_group form-control name_form charge_city" name="nacionalidad">
                                        <option value="">Ninguno</option>
                                        @foreach($paises as $p)
                                            <option value="{{ $p->id_pais }}">{{ $p->nombre_pais }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ciudad</label> <br>
                                    <small class="text-red" id=""></small>
                                    <!--input type="text" class="form-control col-md-7 col-xs-12 name_form" name="ciudad"-->
                                    <select id="departamento" class="select2_group form-control name_form charge_provincia depa" name="ciudad">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Provincia</label> <br>
                                    <small class="text-red" id=""></small>
                                    <!--input type="text" class="form-control col-md-7 col-xs-12 name_form" name="provincia"-->
                                    <select id="provincia" class="select2_group form-control name_form charge_localidad provi" name="provincia">

                                    </select>
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Localidad</label> <br>
                                    <small class="text-red" id=""></small>
                                    <!--input type="text" class="form-control col-md-7 col-xs-12 name_form" name="localidad"-->
                                    <select id="localidad" class="select2_group form-control name_form  localidades" name="localidad">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <center><button type="submit" class="btn btn-success btn-ms"> <span class=""></span> Guardar Datos Paciente</button></center>
        </form>
    </div>
</section>
<style>
    .coldiv {
      background-color: #EFF1EE;
    }
  </style>
<script>
    $('#datepicker').datepicker({});
</script>
