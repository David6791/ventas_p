<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            Laboratorio sirvase a realizar:
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tbody>
                    <?php $a = 1 ?>
                    @forelse($rows_exam_lab as $r)
                    <tr>
                        <td>{{$a++}}.</td>
                        <td>{{ $r->name_reason }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No se registro nada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="box-body">
            <center>
                <a target="_blank" href="http://localhost:8080/pentaho/api/repos/%3Apublic%3ASteel%20Wheels%3AReports%3Aexamen_medico_nuevo1.prpt/generatedContent?userid=admin&password=password&output-target=pageable/pdf&p={{ $rows_exam_lab[0]->id_appointsments }}" type="button" class="btn btn-success btn-xs" name="button"> <span class="glyphicon glyphicon-print"></span> Imprimir orden de Examen Medico</a>

            </center>
        </div>
    </div>
</div>
