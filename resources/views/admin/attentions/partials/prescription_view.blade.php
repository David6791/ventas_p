<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <center>
                <h3 class="box-title">RECETA MEDICA</h3>
            </center>
        </div>
        <div class="box-body">
            Lista de Medicamentos
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table id="datatable" class="table  table-bordered">
                        <thead>
                            <th>Nro.</th>
                            <th>Nombre Medicamento</th>
                            <th>Cantidad Medicamento</th>
                            <th>Observaciones</th>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @forelse($prescription_detail as $as)
                                <tr>
                                    <td>{{ $a++ }}</td>
                                    <td>{{ $as->name_medicine }}</td>
                                    <td>{{ $as->quantity_prescription }}</td>
                                    <td>Ninguna</td>
                                </tr>
                            @empty
                                <tr>
                                    No existen Medicamentos Registrados
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                Indicaciones
                <div class="col-md-12">
                    <ul class="todo-list ui-sortable">
                        <li>
                          <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                              </span>
                          <span class="text">Tomar Cada</span>
                          <div class="tools">
                          </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <p>{{ $prescription_detail[0]->pauta_medicines }}</p>
                        </div>
                    </div>
                    <ul class="todo-list ui-sortable">
                        <li>
                          <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                              </span>
                          <span class="text">Duracion del Tratamiento</span>
                          <div class="tools">
                          </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <p>{{ $prescription_detail[0]->duration_treatment }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Indicciones:</label>
                    <p>{{ $prescription_detail[0]->famaceutic_indications }}</p>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <a class="btn btn-success" target="_blank" href="http://localhost:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Areceta_medica.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $id_app }}"> <span class="glyphicon glyphicon-print "></span> Imprimir Receta</a>
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <a type="button" class="btn btn-danger delete_prescription" value="{{ $id_app }}"> <span class="glyphicon glyphicon-trash"></span> Borrar Receta</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
