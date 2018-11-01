<div class="bg-green-gradient">
    <div class="row date"> 
            <div class="col-md-12 dato">
                <div class="form-group">
                <label>Seleccion Rango de Fechas:</label>

                <div class="input-group">                    
                    <input type="text" class="form-control pull-right" id="reservationtime" name="date_range">
                    <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                    </div>
                </div>
                <!-- /.input group --> <br> 
                <center>
                    <button class="btn btn-primary ver_info_report_range">Ver Reporte</button>
                </center> <br>
            </div>
        </div>
    </div>    
</div>
<script>
  
  $('#reservationtime').daterangepicker({
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Listo",
        "cancelLabel": "Cancelar",
        "fromLabel": "de",
        "toLabel": "a",
        "customRangeLabel": "Personalizado",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "Primer Dia": 1
    }
  });  
</script>
<style>
.date{
    width:100%;
    margin-left:5px;
}
.dato{
    margin-top:10px;
}
.input-group{
    margin-top:10px;
}
.table-condensed{
    width:100%;
}
.bg-green-gradient{
    background-color:#red;
}
</style>