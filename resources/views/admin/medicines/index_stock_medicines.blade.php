<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista Stock Medicamentos </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <table id="datatable" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Medicamento</th>
                                        <th>Cantidad</th>
                                        <th>Fecha Vencimiento</th>
                                        <th>Fecha Registro</th> 
                                        <th>Lote</th>        
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1 ?>
                                    @foreach($list_stock as $lista)
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->name_medicine }}</td>
                                            <td>{{ $lista->quantity_medicine }}</td>
                                            <td>{{ $lista->date_expiration }}</td>
                                            <td>{{ $lista->date_register }}</td>
                                            <td>{{ $lista->lote }}</td>
                                            <td>{{ $lista->state_stock }}</td>
                                            <td><button class="btn btn-primary btn-xs" value="">Editar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#medicines_stock_register_modal" data-whatever="@mdo">Agregar Nuevo Stock</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="medicines_stock_register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Stock Medicamento <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_stock_medicines" action="{{url('create_stock_medicines')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Medicamento</label>
                                <select class="select2_group form-control"name="name_medicine" id="">
                                    @foreach($list_no_stock as $lists)
                                        <option value="{{ $lists->id_medicines }}" >{{ $lists->name_medicine }}</option>
                                    @endforeach
                                </select>
                        </div>               
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cantidad del Medicamento</label>
                            <input type="text" name="quantity_medicine" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="control-label col-md-12">Nro. Lote Medicamento</label>
                            <input type="text" name="numero_lote" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                </div> <br> <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Vencimiento <span class="required"></span></label>
                            <div class='input-group date' id=''>
                                <input name="date_expiration" id="myDatepicker3" type='text' class="form-control" value=""/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2">                        
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
    $('#myDatepicker3').datepicker({});
    $('#myDatepicker2').datepicker({});
</script>