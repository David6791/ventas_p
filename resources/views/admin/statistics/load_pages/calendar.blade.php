<div class="box box-solid bg-green-gradient">
	<div class="box-header">
		<i class="fa fa-calendar"></i>
		<h3 class="box-title">Seleccion Fecha:</h3>
		<!-- tools box -->
		
		<!-- /. tools -->
	</div>
	<!-- /.box-header -->
	<div class="box-body ">
		<!--The calendar -->
		<div id="calendar" style="width: 100%">     
            <div class='input-group date' id='myDatepicker2'>                        
                <div class="form-group">
                    <div class='input-group date' id='myDatepicker2'>
                        <input name="fecha" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div> 
            </div>      
        </div>
        <center>
            <button class="btn btn-primary ver_info">Ver Estadisticas</button>
        </center> <br>
	</div>
<script>
  
  $('#myDatepicker2').datepicker({});  
</script>
<style>
.date{
    width:100%;
}
.table-condensed{
    width:100%;
}
.bg-green-gradient{
    background-color:#red;
}
</style>
