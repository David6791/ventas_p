@include('layouts.header')
<section>
    <div class="row"> <br>
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ asset('img/photo1.png') }}') center center;">
              <h3 class="widget-user-username">Policlinico Policial</h3>
              <h5 class="widget-user-desc">"Virgen de Copacabana"</h5>
            </div>
            <div class="widget-user-image">
              <!--img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar"-->
            </div>

          </div>
            </div>
            <div class="col-md-3">
                <div class="box box-info box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del Paciente</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{ $pa[0]->nombres }}</h3>
                            <p class="text-muted text-center"> {{ $pa[0]->ap_paterno }} {{ $pa[0]->ap_materno }}</p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Cedula de Identidad</b> <a class="pull-right">{{ $pa[0]->ci_paciente }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Fecha Nacimiento</b> <a class="pull-right">{{ $pa[0]->fecha_nacimento }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Direccion</b> <a class="pull-right">{{ $pa[0]->direccion }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Telefono</b> <a class="pull-right">{{ $pa[0]->telefono }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Celular</b> <a class="pull-right">{{ $pa[0]->celular }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cita Medica</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{ $pa[0]->nombres }}</h3>
                            <p class="text-muted text-center"> {{ $pa[0]->ap_paterno }} {{ $pa[0]->ap_materno }}</p>
                            <ul class="list-group list-group-unbordered">
                                @forelse($r_cita as $a)
                                    <li class="list-group-item">
                                        <b>Fecha Cita Medica</b> <a class="pull-right">{{ $a->date_appointments }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Turno o Especialidad</b> <a class="pull-right">{{ $a->name_schedules }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Hora</b> <a class="pull-right">{{ $a->start_time }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Medico</b> <a class="pull-right">Dr. {{ $a->name }} {{ $a->apellidos }}</a>
                                    </li>
                                @empty
                                    <li class="list-group-item">
                                        <b>No tiene cita Medica</b> <a class="pull-right"></a>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ultimo Historial Medico</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{ $pa[0]->nombres }}</h3>
                            <p class="text-muted text-center"> {{ $pa[0]->ap_paterno }} {{ $pa[0]->ap_materno }}</p>
                            <ul class="list-group list-group-unbordered">
                                <?php $aa = 1 ?>
                                @forelse($r_historial_medico as $a)
                                    <li class="list-group-item">
                                        <b>{{ $aa++ }}.- {{ $a->name_date }}</b> <br> <a class="" style="text-align:justify">{{ $a->observations }}</a>
                                    </li>
                                @empty
                                    <li class="list-group-item">
                                        <b>No tiene Historial Medico</b> <a class="pull-right"></a>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
