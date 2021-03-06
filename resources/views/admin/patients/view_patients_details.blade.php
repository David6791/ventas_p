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

                <center>
                <div class="img-responsive">{!! QrCode::size(200)->generate($dates[0]->ci_paciente); !!}</div>
                </center>
                <h3 class="profile-username text-center">{{ $dates[0]->nombres }} {{ $dates[0]->ap_paterno }} {{ $dates[0]->ap_materno }}</h3>

                <p class="text-muted text-center">Paciente</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Codigo Paciente:</b> <a class="pull-right"></a>
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

                <a href="#" class="btn btn-primary btn-block edit_dates_patients_form" value="{{ $dates[0]->id_paciente }}"> <span class="fa fa-edit"></span> <b>Editar</b></a>
                <a href="#" class="btn btn-success btn-block"> <span class="fa fa-print"></span> <b>Imprmir Credencial</b></a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="editar_pciente">

        </div>
    </div>
</section>


< modal para editar los roles de usuario -->
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
