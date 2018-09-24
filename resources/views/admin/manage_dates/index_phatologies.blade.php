<div class="section">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Patologias Medicas</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>NRO.</th>
                                        <th>NOMBRE PATOLOGIA</th>
                                        <th>DESCRIPCION PATOLOGIA</th>
                                        <th>ESTADO PATOLOGIA</th>
                                        <th>FECHA REGISTRO</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1 ?>
                                    @foreach($list as $lista)
                                        <tr>
                                            <td> {{ $a++ }}</td>
                                            <td> {{ $lista->nombre_patologia }}</td>
                                            <td> {{ $lista->descripcion_patologia }}</td>
                                            @if($lista->estado_patologia==='activo')
                                                <td><button class="btn btn-success btn-xs get_BajaPatologie" name="id_medico" value="{{$lista->id_patologia}}"> <span class="glyphicon glyphicon-arrow-up"></span> Activo</button></td>
                                            @else
                                                <td><button class="btn btn-danger btn-xs get_BajaPatologie" name="id_medico" value="{{$lista->id_patologia}}"> <span class="glyphicon glyphicon-arrow-down"></span> Inactivo</button></td>
                                            @endif                                   
                                            <td> {{ $lista->fecha_creacion_patologia }} </td>
                                            <td> <button class="btn btn-warning btn-xs edit_phatologies_function"  value="{{ $lista->id_patologia }}" ><span class="glyphicon glyphicon-edit"></span> Editar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-info" > <span class="glyphicon glyphicon-print"></span> Imprimir Lista de Patologias </button>
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#create_phatologies" data-whatever="@mdo"> <span class="glyphicon glyphicon-plus"></span> Agregar nueva Patologia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create_phatologies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nueva Patologia <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_phatologies" action="{{url('create_phatologies')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Patologia</label>
                                <input name="name_phatologie" class="form-control" type="text" value="">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Patologia</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="phatologie_description"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
<div class="modal fade" id="edit_phatologies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Patologia <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_phatologies_edit" action="{{url('edit_phatologies')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_pathologie"  id="id_pathologie" value="">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Patologia</label>
                                <input name="name_phatologie" class="form-control" type="text" value="" id="name_pat">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Patologia</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." id="phatologie_description" name="phatologie_description" value="description_phatlogie"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
</script>