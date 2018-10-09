<div class="row">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
                Horarios Disponibles.
            </h3>
        </div>
        <div class="box-body">
            <input type="hidden" name="fecha" id="fecha" value="{{ $date }}">
            <input type="hidden" name="id_schedul" id="id_schedul" value="{{ $turns[0]->id_schedul }}">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered">
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
                                <td><button class="btn btn-primary btn-sm create_assignments_medic" value="{{ $lista->id_hour_turn }}">Crear Cita</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>