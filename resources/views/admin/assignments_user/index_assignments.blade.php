<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Lista Asignacion de Horarios</h3>
    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Tipo Usuarios</th>
                    <th>Turno Asignados</th>
                    <th>Fecha Creacion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($rows as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->name }} {{ $lista->apellidos }}</td>
                    <td>{{ $lista->nombre_tipo }}</td>
                    <td>
                        <button class="btn btn-warning btn-xs viewAssignments" name="id_user" value="{{$lista->id_user}}"> <span class="glyphicon glyphicon-eye-open"></span> Ver Asignaciones</button>
                    </td>
                    <td>{{ $lista->nombre_tipo }}</td>
                    <td><button class="btn btn-primary btn-xs editAssignments" name="id_assignments" value="{{$lista->id_user}}"> <span class="glyphicon glyphicon-edit"></span> Editar Asignacion</button> <button class="btn btn-success btn-xs" name="id_user" value="{{$lista->id_user}}"> <span class="glyphicon glyphicon-print"></span> Imprmir</button> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <span class="glyphicon glyphicon-plus  "></span> Agregar Nueva Asignacion</button></div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Crear Nueva Asignacion <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="send_form_assignments" action="{{url('create_assignments')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Usuario Especialidad</label>
                                <select name="id_user" id="" class="select2_group form-control">
                                    @foreach($users as $list)
                                        <option value="{{$list->id}}">{{$list->nombre_tipo}}: {{$list->name}} {{$list->apellidos}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nombre Turno </th>
                            <th class="column-title">Hora Inicio </th>
                            <th class="column-title">Hora Fin </th>
                            <th class="column-title no-link last"><span class="nobr">Seleccionar</span></th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($schedul as $list)
                            <tr class="even pointer">
                                <td class="a-center "> {{$list->name_schedules}} </td>
                                <td class="a-center "> {{$list->schedules_start}} </td>
                                <td class="a-center "> {{$list->schedules_end}} </td>
                                <td class="a-center "> <input type="checkbox" class="flat" name="add_schedule[]" value="{{$list->id_schedule}}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
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
<div class="modal fade" id="modalViewAssignments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Ver todas las Asignacion <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="send_form_assignments" action="{{url('create_assignments')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nombres y Apellidos</label>
                                <p id="view_name"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tipo Usuario</label>
                                <p id="view_tipo"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover tabla_llenar">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Nombre Turno </th>
                                <th class="column-title">Hora Inicio </th>
                                <th class="column-title">Hora Fin </th>
                                <th class="column-title no-link last"><span class="nobr">Seleccionar</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">

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
<div class="modal fade" id="modalEditAssignments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Asignaciones <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="send_form_assignments_edit" action="{{url('save_edit_assignments')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_user" id="id_user1" value="">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nombres y Apellidos</label>
                                <p id="view_name1"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tipo Usuario</label>
                                <p id="view_tipo1"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped jambo_table bulk_action table_add">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Nro. </th>
                                <th class="column-title">Nombre Turno </th>
                                <th class="column-title">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped jambo_table bulk_action table_remove">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Nro. </th>
                                <th class="column-title">Nombre Turno </th>
                                <th class="column-title">Agregar</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
