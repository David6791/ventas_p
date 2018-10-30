<div class="box box-success">
    <div class="box-header">
        Seleccione Fecha para Reprogramar
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class='input-group date' id='myDatepicker2'>
                        <input name="fecha" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <center>
                    <button class="btn btn-success btn-xm view_schedules_free">Ver Horarios Disponibles</button>
                </center>
            </div>
            <div class="col-md-8">
                <div class="load_schedules_free"></div>
            </div>
        </div>
    </div>
</div>
<script>
$('#myDatepicker2').datepicker({
    //format: 'MM-DD-YYYY'
});
</script>