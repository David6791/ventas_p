<section class="content">
    <div class="row">
        <form class="sendform_patients" action="{{url('store_patients')}}" method="post" autocomplete="off">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="col-md-12">
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
                                    <input name="ci_paciente" type="text" class="form-control col-md-7 col-xs-12 name_form" id="inputEmail3" placeholder="">
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
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="nombre">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_paterno">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido Materno</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="apellido_materno">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Direccion</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="direccion">
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="telefono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Celular</label> <br>
                                    <small class="text-red" id=""></small>
                                    <input type="text" class="form-control col-md-7 col-xs-12 name_form" name="celular">
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
                                    <input id="datepicker" type="text" class="form-control col-md-7 col-xs-12 name_form" name="fecha_nacimiento">
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
            <!--div class="col-md-7">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Datos Medicos</h3>
                    </div>
                    <div class="box-body">
                        <div class="text-green"> Tiene algunas de las siguientes patologias, (Aunque esten controladas con medicacion.)</div>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach(array_chunk($row, 3) as $chunk)
                                    <div class="row">
                                        @foreach($chunk as $add)
                                            <div class="col-md-4">
                                                <div class="form-group col-md-12">
                                                    <div class="checkbox">
                                                        <label class="control-label">
                                                            <input type="checkbox" name="patologias[]" value="{{$add->id_patologia}}">
                                                            {{$add->nombre_patologia}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <div class="text-green"> Datos Medicos</div> <br>
                                @foreach(array_chunk($rows, 1) as $chunk)
                                <div class="row">
                                    @foreach($chunk as $add)
                                        <div class="col-md-5">
                                            <div class="form-group col-md-12">
                                                {{$add->nombre_dato_medico}}
                                                <div class="row"> <br>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-info click_exec"  value="{{ $add->id_dato_medico }}">SI   </button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-danger click_cancel"  value="{{ $add->id_dato_medico }}">NO   </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail3" class="control-label">{{$add->pregunta_dato_medico}}</label>
                                                    <textarea class="form-control" rows="3" disabled placeholder="Escribir aqui ..." id="{{$add->id_dato_medico}}" name="{{ $add->id_dato_medico }}"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
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
