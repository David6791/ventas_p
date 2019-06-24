<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                Estadisticas de Atencion por Medico
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Nombre Medico</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1 ;
                            $count = 0;
                        ?>
                        @foreach($row as $lista)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $lista->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" name="button"> Ver </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
