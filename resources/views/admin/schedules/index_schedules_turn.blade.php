<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Lista Horarios</h3>
    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombre Horario</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($sche as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->name_schedules }}</td>                
                    <td>{{ $lista->schedules_start }}</td>
                    <td>{{ $lista->schedules_end }}</td>                   
                    <td><div class="col-md-2"><button type="button" class="btn btn-primary btn-xs view_turns_schedul" value="{{$lista->id_schedule}}"> <span class="glyphicon glyphicon-show"></span> Ver Turnos</button></div></td>
                </tr>
                @endforeach
            </tbody>
        </table>         
    </div>
</div>



<script>
$('#datatable').DataTable();
$('.timepicker').timepicker({
      showInputs: false
    })
$('.timepicker1').timepicker({
      showInputs: false
    })
</script>