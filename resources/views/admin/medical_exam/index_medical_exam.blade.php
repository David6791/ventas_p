<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Examenes Medicos</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Examen Medico</th>
                                        <th>Descripcion Examen Medico</th>
                                        <th>Fecha Registro</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1 ?>
                                    @foreach($list as $lista)
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->name_medical_exam }}</td>
                                            <td>{{ $lista->description_medical_exam }}</td>
                                            <td>{{ $lista->date_regsiter }}</td>
                                            <td>
                                                @if($lista->state_medical_exam == 'activo')
                                                    <button type="button" name="button" value="{{ $lista->id_medical_exam }}" class="btn btn-success btn-xs low_exam_medic">Activo</button>
                                                @else
                                                    <button type="button" name="button" value="{{ $lista->id_medical_exam }}" class="btn btn-danger btn-xs low_exam_medic">Inactivo</button>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-xs edit_medical_exam" value="{{ $lista->id_medical_exam }}">Editar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#medical_exam_modal" data-whatever="@mdo">Agregar Nuevo Examen Medico</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="medical_exam_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Examen Medico <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_medical_exam" action="{{url('create_medical_exam')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre Examen Medico</label> <br>
                                <small class="text-red" id=""></small>
                                <input name="nombre_examen_medico" class="form-control name_form" type="text" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Examen Medico</label> <br>
                            <small class="text-red" id=""></small>
                            <textarea class="form-control  col-md-6 name_form" rows="3" placeholder="Escribir ..." name="descripcion"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Registrar Examen Medico</button>
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
<div class="modal fade" id="modal_edit_medical_exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Examen Medico <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_edit_medical_exam" action="{{url('edit_medical_exam')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" val="" id="id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre Examen Medico</label> <br>
                                <small class="text-red" id=""></small>
                                <input name="nombre_examen_medico" class="form-control name_form" id="n_e_m" type="text" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Examen Medico</label> <br>
                            <small class="text-red" id=""></small>
                            <textarea class="form-control  col-md-6 name_form" rows="3" placeholder="Escribir ..." id="d_e_m" name="descripcion"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Registrar Examen Medico</button>
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
