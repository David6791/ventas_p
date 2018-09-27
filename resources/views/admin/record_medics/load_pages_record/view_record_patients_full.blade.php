<div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
            
            <h3 class="box-title text-green">Paciente: {{ $list_record[0]['nombres'] }} {{ $list_record[0]['ap_paterno'] }} {{ $list_record[0]['ap_materno'] }}</h3>
            
              
            </div>
            <?php $a = 1 ?>
            @foreach($list_record as $li)            
            @if($a==1)
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#{{ $li['id_medical_appointments'] }}">
                        Historial Nro. {{ $a++ }}
                        </a>
                    </h4>
                </div>
                <div id="{{ $li['id_medical_appointments'] }}" class="panel-collapse collapse in">
                    <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                    </div>
                </div>
            </div>
            @else
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#{{ $li['id_medical_appointments'] }}">
                        Historial Nro. {{ $a++ }}
                        </a>
                    </h4>
                </div>
                <div id="{{ $li['id_medical_appointments'] }}" class="panel-collapse collapse">
                    <div class="box-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                    </div>
                </div>
            </div>
            @endif
            
            @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>