<div class="row">
    <div class="col-md-3">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Seleccione Fecha:</h3>
            </div>
            <div class="box-body">         
                <select name="id_" id="selec_schedule" class="select2_group form-control">
                    @foreach($schedules as $list)                                    
                        <option name="{{$list->id_schedule}}" value="{{$list->id_medical_assignments}}">{{$list->name_schedules}} -- Dr. {{$list->name}} {{$list->apellidos}} </option>                                                         
                    @endforeach
                </select>   <br> 
                <input type="hidden" name="id" value="{{ $id[0] }}"> 
                <div class="form-group">
                    <div class='input-group date' id='myDatepicker2'>
                        <input name="fecha" type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>    
                <center>
                    <button type="button" class="btn btn-primary btn-sm view_schedules_free" value="fecha">Ver Turnos</button>   
                </center>
            </div>      
        </div>    
    </div>
    <div class="col-md-9">
        <div class="view_schedules_free1"></div>
    </div>    
</div>
<script>
$('#myDatepicker2').datepicker({
    //format: 'MM-DD-YYYY'
});
</script>