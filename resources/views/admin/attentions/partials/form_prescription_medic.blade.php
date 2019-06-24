<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <center>
                <h1 class="box-title">RECETA MEDICA</h1>
            </center>
        </div>
        <div class="box-body">
            <form class="send_form_prescription" action="{{url('url_form_prescription')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_app" value="{{ $id_app }}">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Medicamento</label>
                            <input type="text" name="medicine[]" class="form-control" id="exampleInputEmail1" placeholder="Paracetamol">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cantidad</label>
                            <input type="text" name="cant[]" class="form-control" id="exampleInputEmail1" placeholder="4">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color:#ffff;">a</label>
                            <button class="btn btn-info form-control load_more" type="button" name="button">+</button>
                        </div>
                    </div>
                    <div class="load_his_part">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Duracion del Tratamiento</label>
                            <input name="duration_treatment" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pauta  </label> <small>(Tomar cada...)</small>
                            <input type="text" name="pauta" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Indicaciones Farmaceutico</label>
                            <textarea type="text" rows="3" name="indications" class="form-control" placeholder="Escribir Indicaciones ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <center>
                        <button type="submit" class="btn btn-success" name="button">Guardar Receta Medica</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
