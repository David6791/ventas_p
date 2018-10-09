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
                                    <div class='input-group' id=''>
                                        <input name="ci_patient" id="ci_patient" type='text' class="form-control"  value="" placeholder="C.I."/>
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
                                <div class='input-group' id=''>
                                    <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </span>
                                    <input name="name_patient" id="name_patient" type='text' class="form-control"  value="" placeholder="Nombre"/>                        
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class='input-group' id=''>
                                    <span class="input-group-addon">
                                    </span>
                                    <input name="apaterno_patient" id="apaterno_patient" type='text' class="form-control"  value="" placeholder="Apellido Paterno"/>
                                    <span class="input-group-addon">
                                    </span>                       
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class='input-group' id=''>                        
                                    <input name="amaterno_patient" id="amaterno_patient" type='text' class="form-control"  value="" placeholder="Apellido Materno"/>
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
                                <div class='input-group date' id='myDatepicker2'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    <input name="fnacimiento_patient" id="fnacimiento_patient" type='text' class="form-control"  value="" placeholder="Fecha Nacimiento"/>                        
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class='input-group' id=''>
                                    <span class="input-group-addon">
                                    </span>
                                        <select name="sexo" id="sexo" class="form-control">
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
                                    <input name="direccion_patient" id="direccion_patient" type='text' class="form-control"  value="" placeholder="Direccion"/>
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
                            <textarea id="descryption_emergecy" required="required" class="form-control" name="descryption_emergecy" data-parsley-trigger="keyup" placeholder="Describa brevemente el motica de la Urgencia"></textarea>
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