<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Formulario de Registro de Emergencias
                </h3>
            </div>
            <div class="box-body">
                <form class="store_emergencies" role="form" action="{{url('store_emergencies')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id_patient" id="id_patient" value="">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <small class="text-red" id=""></small>
                                    <div class='input-group' id=''>
                                        <input name="ci_paciente" id="ci_patient" type='text' class="form-control name_form"  value="" placeholder="C.I."/>
                                        <span class="input-group-addon">
                                            <span class="fa fa-user"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary search_patient"> Buscar <span class="fa fa-search"></span> </button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <small class="text-red" id=""></small>
                                <div class='input-group' id=''>
                                    <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </span>
                                    <input name="nombre_paciente" id="name_patient" type='text' class="form-control name_form"  value="" placeholder="Nombre"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <small class="text-red" id=""></small>
                                <div class='input-group' id=''>
                                    <span class="input-group-addon">
                                    </span>
                                    <input name="apellido_paterno" id="apaterno_patient" type='text' class="form-control name_form"  value="" placeholder="Apellido Paterno"/>
                                    <span class="input-group-addon">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <small class="text-red" id=""></small>
                                <div class='input-group' id=''>
                                    <input name="apellido_materno" id="amaterno_patient" type='text' class="form-control name_form"  value="" placeholder="Apellido Materno"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <small class="text-red" id=""></small>
                                <div class='input-group date' id='myDatepicker2'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <input name="fecha_nacimiento" id="fnacimiento_patient" type='text' class="form-control name_form"  value="" placeholder="Fecha Nacimiento"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <small class="text-red" id=""></small>
                                <div class='input-group' id=''>
                                    <span class="input-group-addon">
                                    </span>
                                        <select name="genero" id="sexo" class="form-control">
                                            <option selected="selected">Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                    <span class="input-group-addon">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class='input-group' id=''>
                                    <small class="text-red" id=""></small>
                                    <input name="direccion_patient" id="direccion_patient" type='text' class="form-control name_form"  value="" placeholder="Direccion"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <label for="" class="form-group">Breve descripcion de la Emergencia</label>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <textarea id="descryption_emergecy" class="form-control" name="descryption_emergecy"  placeholder="Describa brevemente el motica de la Urgencia"></textarea>
                        </div>
                        <div class="col-md-4"></div>
                    </div> <br>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Registrar Emergencia</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$('#myDatepicker2').datepicker({
});
</script>
