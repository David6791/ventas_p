<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        Datos Generales de Paciente
                    </h3>
                </div>
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/icon.jpg') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $dates[0]->nombres }} {{ $dates[0]->ap_paterno }} {{ $dates[0]->ap_materno }}</h3>

                <p class="text-muted text-center">Paciente</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Matricula</b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item">
                    <b>Cedula de Identidad:</b> <a class="pull-right">{{ $dates[0]->ci_paciente }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Fecha Nacimiento</b> <a class="pull-right">{{ $dates[0]->fecha_nacimento }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Telefono - Celular</b> <a class="pull-right">{{ $dates[0]->telefono }} - {{ $dates[0]->celular }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Direccion</b> <a class="pull-right">{{ $dates[0]->direccion }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Nacionalidad</b> <a class="pull-right">{{ $dates[0]->pais_nacimiento }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Lugar de Nacimiento</b> <a class="pull-right">{{ $dates[0]->localidad_nacimiento }}</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Datos Medicos del Paciente
                    </h3>
                </div>
                <div class="box-body">
                    @forelse($dates_medic as $li)
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{ $li->pregunta_mostrar }}
                                            </th>
                                            <th width="100px" ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p for="" id="{{ $li->id_patent_date_medic }}">{{ $li->descripcion }}</p>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-xs edit_dates_medic_patient" value="{{ $li->id_patent_date_medic }}"> <span class="glyphicon glyphicon-edit"></span> Editar</button>    
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>                         
                    @empty
                        <label for="">No existen datos medicos</label>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Patologias del Paciente </h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <th>Nro.</th>
                            <th>Nombre Patologia</th>
                            <th>Descripcion</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?> 
                            @forelse($pat as $d)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $d->nombre_patologia }}</td>
                                <td>No hay descripcion</td>
                                <td> <button class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash"></span> Eliminar</button> </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>No Existen datos</td>
                                </tr>
                                </tr>
                            @endforelse
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                <button class="btn btn-success btn-xm edit_pat_patients" value="{{ $dates[0]->id_paciente }}"> <span class="glyphicon glyphicon-edit"></span> Editar</button></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- modal para editar los roles de usuario -->
<div class="modal fade" id="modal-edit-dates_medic">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_edit_date_medic_patient" id="form_edit" novalidate action="{{url('edit_date_medic_patient')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name= "id_date_medic" value="" id="id_date_medic">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Dato Medico</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" id="name_date_medic"> </label><small class="text-red" id=""></small>
                                                <textarea type="text" class="form-control name_form" id="descripcion" name= "rol_edit" placeholder=""> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

<!-- modal para editar las patologias del Paciente -->
<div class="modal fade" id="modal_edit_pat_patients">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal form-label-left sendform_edit_pat_patient" id="form_edit" novalidate action="{{url('edit_pat_patient')}}" method="post" autocomplete="off">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name= "id_patient" value="" id="id_patient">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Patologias del Paciente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body with-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered table-hover delete_pat">
                                                <thead>
                                                    <th>Nro.</th>
                                                    <th>Patologia</th>
                                                    <th>Quitar</th>
                                                </thead>
                                                <tbody class="delete_add_table">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered table-hover add_pat">
                                                <thead>
                                                    <th>Nro.</th>
                                                    <th>Patologia</th>
                                                    <th>Agregar</th>
                                                </thead>
                                                <tbody class="delete_delete_table">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>        
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>