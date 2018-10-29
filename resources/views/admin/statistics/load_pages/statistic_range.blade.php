<?php 
    $aux= 0 ;
    for($i = 0 ; $i < count($asd); $i++){
        $aux = $aux+$asd[$i]->id_;
    }
?>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Lista de Atenciones por Dia</h3>
    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Grupo Enfermedad</th>
                    <th>Cantidad de Citas Antendidas</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($asd as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->name_group }}</td>                
                    <td>{{ $lista->id_ }}</td>
                    <td>{{ round(((100*$lista->id_)/$aux),2) }}</td> 
              </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>