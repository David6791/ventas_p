<section class="content"> 
    <div class="row">
        <div class="col-md-3">
        <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/icon.jpg') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $rows[0]->name }} {{ $rows[0]->apellidos }}</h3>

                <p class="text-muted text-center">{{ $rows[0]->ocupacion }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Matricula</b> <a class="pull-right">{{ $rows[0]->matricula_medico }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Cedula de Identidad:</b> <a class="pull-right">{{ $rows[0]->ci }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Fecha Nacimiento</b> <a class="pull-right">{{ $rows[0]->fecha_nacimiento }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Telefono - Celular</b> <a class="pull-right">{{ $rows[0]->telefono }} - {{ $rows[0]->celular }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Direccion</b> <a class="pull-right">{{ $rows[0]->domicilio }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Nacionalidad</b> <a class="pull-right">{{ $rows[0]->nacionalidad }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Lugar de Nacimiento</b> <a class="pull-right">{{ $rows[0]->localidad }}</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.box-body -->
            </div>
        <!-- /.box -->
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        Especialidades del Medico
                    </h3>
                </div>
                <div class="box-body">
                    <form class="sendform" action="{{url('update1', $rows[0]->id)}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-header">
                                    <h3 class="box-title text-green">Especialidades que Tiene</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-user-information">
                                        <thead>
                                            <th>Nro.</th>
                                            <th>Especialidad</th>
                                            <th>Agregar</th>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="eliminar_especialidad[]" value="0" checked></td>
                                            <?php $a = 1 ?>                                         
                                            @foreach($rows1 as $lista)
                                                @if($lista->estado === 'activo')
                                                <tr>
                                                    <td>{{$a++}}</td>                                            
                                                    <td>{{$lista->nombre_especialidad}}</td>
                                                    <td><input type="checkbox" name="eliminar_especialidad[]" value="{{$lista->id_especialidad}}"></td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-header">
                                    <h3 class="box-title text-red">Especialidades para Asignar</h3>
                                </div>
                                <div class="box-body">
                                    <table class="table table-user-information">
                                        <thead>
                                            <th>Nro.</th>
                                            <th>Especialidad</th>
                                            <th>Eliminar</th>
                                        </thead>
                                        <tbody>
                                                <input type="hidden" name="agregar_especialidad[]" value="0" checked>
                                            <?php $a = 1 ?>                                         
                                            @foreach($espe as $lista)
                                                <tr>
                                                    <td>{{$a++}}</td>                                            
                                                    <td>{{$lista->nombre_especialidad}}</td>
                                                    <td><input type="checkbox" name="agregar_especialidad[]" value="{{$lista->id_especialidad}}"></td>
                                                </tr>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <center><button class="btn btn-success btn-ms"> <span class="glyphicon glyphicon-floppy-save"></span> Guardar Cambios </button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>