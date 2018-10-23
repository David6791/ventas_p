<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <h3 class="box-title">Notas Medicas</h3>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <?php $a = 1 ?>
                @forelse($notes_medic as $as)
                    <label for="">{{$a++}}.- {{ $as->name_date }}:</label> <br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            {{ $as->observations }}
                        </div>
                    </div>
                @empty
                    <label for="">No existen datos para mostrar...</label>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <h3 class="box-title">Reconsulta: </h3> <label for="" class="text-green"> Si tiene Reconsulta</label>
        </div>
        <div class="row">
            <div class="col-md-5">Observaciones para Reconsulta</div>
        </div>        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                {{ $datos_1[0]->observation_re_medical_consusltation }}
            </div>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <h3 class="box-title">
                Observaciones de la Cita Medica
            </h3>
        </div>        
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        {{ $datos_1[0]->observation_medical_appoinments }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <center>
            <button class="btn btn-success"> Editar Datos</button>
        </center>
    </div>
</div>