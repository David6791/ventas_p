<div class="row"> <br>
    <div class="col-md-12">
        <label for="">Seleccione Medico</label>
    </div>
</div>
<table id="datatable" class="table table-striped table-bordered table_medic">
<tbody>
@foreach($medics as $lista)
    <tr>
        <td>{{ $lista->name_schedules }}</td>
        <td><button class="btn btn-primary btn-xs load_date_medic" name="id_assignments" value="{{$lista->id_medical_assignments}}">Seleccionar</button></td>
    </tr>
@endforeach
</tbody>
</table>
<div class="modal fade" id="modalSelect_date" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Seleccion Fecha para realizar su Reserva <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->          
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="id_schedul" id="id_schedul" value="">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">        
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
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn_select_date_cita" name="id_assignments" value="">Iniciar Cita Medica</button>
                </div>
            </div>            
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>
<script>
$('#myDatepicker2').datepicker({
});
</script>
<style>
    .table_medic{

    }
</style>