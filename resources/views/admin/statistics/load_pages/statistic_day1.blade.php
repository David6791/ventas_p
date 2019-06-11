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
                            <th>Color</th>
                            <th>Cantidad de Citas Antendidas</th>
                            <th>Porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1 ;
                            $count = 0;
                        ?>
                        @foreach($asd as $lista)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $lista->name_group }}</td>
                            <td bgcolor="{{ $lista->color }}"> <span ></span> </td>
                            <td>{{ $lista->id_ }}</td>
                            <td>{{ round((((100*$lista->id_)/$aux)/100),2) }} %</td>
                            <?php $count = $count + $lista->id_ ?>
                      </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">

                <!--center>
                    <button type="button" class="btn btn-success btn-xm btn_charge_graphic" name="date" value="{{ $dat }}">Ver Grafica</button>
                    <button type="button" class="btn btn-success btn-xm btn_charge_graphic_da" name="date" value="{{ $dat }}">Ver Grafica</button>
                </center-->
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Grafica de Listas de Atencion Diaria</h3>                
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <canvas id="pieChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-header">
                            DETALLES DE LA GRAFICA
                        </div>
                        <ul class="chart-legend clearfix">
                            @foreach($asd as $lista)
                                <li><i class="fa fa-circle-o" style="color:{{ $lista->color }}"></i> {{ $lista->abbreviation }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function () {
    //console.log(la)
    //console.log(da)
    //console.log(da)

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = da
    console.log(PieData)
    console.log(da)
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
})
</script>
