<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <div >
                    <h3 class="box-title">ESTADISTICAS DE ATENCION POR MEDICO</h3>
                </div>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                  <!-- Tabs within a box -->
                  <ul class="nav nav-tabs pull-right">
                      <li><a href="#sales-chart" data-toggle="tab">Por rango de Fechas</a></li>
                      <li class="active"><a href="#revenue-chart" data-toggle="tab">Por Dia</a></li>
                  </ul> <br>
                  <div class="tab-content no-padding">
                    <div class="chart tab-pane active" id="revenue-chart">
                        <form class=" form-label-left load_statistics_medics" novalidate action="{{url('url_statistics_medics')}}" method="post" autocomplete="off">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Fecha:</label>
                                    <input id="datepicker" class="form-control" type="text" name="date">
                                </div>
                                <div class="col-md-3">
                                    <label for="" style="color:#fff">asdasd</label> <br>
                                    <button class="btn btn-success " type="submit" name="button">Ver Estadisticas</button>
                                </div>
                            </div> <br>
                        </form>
                    </div>
                    <div class="chart tab-pane" id="sales-chart">
                        <form class=" form-label-left load_statistics_medics_range" novalidate action="{{url('url_statistics_medics_range')}}" method="post" autocomplete="off">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Fecha Inicio:</label>
                                    <input id="datepicker1" class="form-control" type="text" name="date1">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fecha Fin:</label>
                                    <input id="datepicker2" class="form-control" type="text" name="date2">
                                </div>
                                <div class="col-md-3">
                                    <label for="" style="color:#fff">asdasd</label> <br>
                                    <button class="btn btn-success " type="submit" name="button">Ver Estadisticas</button>
                                </div>
                            </div> <br>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="load_tabel_medics">

</div>
<script>
$('#datepicker').datepicker({
      autoclose: true
})
$('#datepicker1').datepicker({
      autoclose: true
})
$('#datepicker2').datepicker({
      autoclose: true
})
</script>
