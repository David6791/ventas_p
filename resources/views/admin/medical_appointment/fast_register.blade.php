<section class="content">
    <div class="row">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">El Paciente aun no esta Registrado <small class="text-red">(Llene los datos)</small> </h3>
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
                    </div>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-success">Registrar Cita Medica</button>
            </center>


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
