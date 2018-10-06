<div class="row"> <br>
    <div class="col-md-12">
        <label for="">Seleccione Fecha:</label>
    </div>
</div>
<div class="row">    
    <div class="col-md-12">
        <select name="id_user" id="selec_schedule" class="select2_group form-control">
            @foreach($schedul as $list)                                    
                <option name="{{$list->id_schedule}}" value="{{$list->id_schedule}}">{{$list->name_schedules}}</option>                                                         
            @endforeach
        </select>
    </div> 
</div> <br>
<div class="row">
    <div class="col-md-12">        
        <div class="form-group">
            <div class='input-group date' id='myDatepicker2'>
                <input name="fecha_viaje" type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>        
    </div>  
</div>
<div class="row">
    <center>
        <button type="button" class="btn btn-primary btn-sm view_turns_day" value="fecha">Ver Turnos</button>   
    </center>
</div>
<script>
$('#myDatepicker2').datepicker({
    //format: 'MM-DD-YYYY'
});
</script>