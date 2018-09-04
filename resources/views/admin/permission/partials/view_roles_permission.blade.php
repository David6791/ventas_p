<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Roles Asignados a: {{ $dates[0]->name }}</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal form-label-left sendform_modifi_role_permission" novalidate action="{{url('add_permissions_roles')}}" method="post" autocomplete="off">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id_user_role" id="" value="{{ $dates[0]->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-header">
                                    <h4 class="box-title text-green"> Roles Asignados</h4>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Nombre Rol</th>
                                            <th>Fecha Designacion</th>
                                            <th><span class="glyphicon glyphicon-trash"></span> Quitar Designacion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1 ?>
                                        @foreach($row as $lista)
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->name_per }}</td>
                                            <td>{{ $lista->created_at }}</td>
                                            <td><input type="checkbox" class="flat-red" name="delete_permission[]" value="{{$lista->id_per_rol}}"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="box-header">
                                    <h4 class="box-title text-red"> Roles para Asignar</h4>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Nombre Rol</th>
                                            <th>Fecha Designacion</th>
                                            <th> <span class="glyphicon glyphicon-plus"></span> Agregar Designacion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1 ?>
                                        @foreach($row1 as $lista)
                                        <tr>
                                            <td>{{ $a++ }}</td>   
                                            <td>{{ $lista->name }}</td>                                         
                                            <td>{{ $lista->created_at }}</td>
                                            <td><input type="checkbox" class="flat-red" name="add_permission[]" value="{{$lista->id}}"></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-floppy-save"></span> Guardar Cambios</button>
                            </div>
                            <div class="col-md-2">
                                <button href="index_roles_roles" class="btn btn-danger btn-sm load-page"> <span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>