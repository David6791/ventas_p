<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body prueba">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Hora Inico</th>
                            <th>Hora Fin</th>
                            <th>Estados</th>
                            <th>Turno</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $a = 1 ?>
                        @foreach($turns as $lista)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $lista->start_time }}</td>
                                <td>{{ $lista->end_time }}</td>
                                <td>{{ $lista->state }}</td>
                                <td> {{ $lista->name_schedules }}</td>
                                <td><button class="btn btn-primary btn-sm create_assignments" value="{{ $lista->id_hour_turn }}">Crear Cita</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>            
        </div>        
    </div>
</div>
<style>
    .prueba table tbody tr{
        height:15px;
    }
</style>