<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <input type="hidden" name="fecha" value="{{ $dat[0] }}">
            <input type="hidden" name="schedul" value="{{ $dat[1] }}">
            <input type="hidden" name="id" value="{{ $dat[2] }}">
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
                            <th>Accion</th>
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
                                <td><input type="radio" name="id_turn" value="{{$lista->id_hour_turn}}"></td>
                                <td><button class="btn btn-primary btn-sm create_assignments_1" value="{{ $lista->id_hour_turn }}">Crear Cita</button></td>
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