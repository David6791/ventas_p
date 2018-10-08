<div class="col-md-3">
    <input type="hidden" name="id_patient" value="{{ $dates_patient[0]->id_paciente }}">
    <div class="form-group">
        <label for="">Nombres:</label>
        <div class="form-group">
            <div class='input-group date' id='myDatepicker3'>
                <input name="name" id="date_appointsment" type='text' class="form-control" value="{{ $dates_patient[0]->nombres }}" disabled/>
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>   
</div>
<div class="col-md-1"></div>
<div class="col-md-3">
    <div class="form-group">
        <label for="">Apellidos:</label>
        <div class="form-group">
            <div class='input-group date' id='myDatepicker3'>
                <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}" disabled/>
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>   
</div>
<div class="col-md-1"></div>
<div class="col-md-3">
    <div class="form-group">
        <label for="">Lugar de Nacimiento</label>
        <div class="form-group">
            <div class='input-group date' id='myDatepicker3'>
                <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates_patient[0]->localidad_nacimiento }}" disabled/>
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>   
</div> <br>
<div class="col-md-3">
    <div class="form-group">
        <label for="">Fecha Nacimiento:</label>
        <div class="form-group">
            <div class='input-group date' id='myDatepicker3'>
                <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates_patient[0]->fecha_nacimento }}" disabled/>
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>   
</div>
<div class="col-md-1"></div>
<div class="col-md-3">
    <div class="form-group">
        <label for="">Direccion:</label>
        <div class="form-group">
            <div class='input-group date' id='myDatepicker3'>
                <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates_patient[0]->direccion }}" disabled/>
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>   
</div>
<div class="col-md-1"></div>
<div class="col-md-3">
    <div class="form-group">
        <label for="">Celular</label>
        <div class="form-group">
            <div class='input-group date' id='myDatepicker3'>
                <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates_patient[0]->celular }}" disabled/>
                <span class="input-group-addon">
                </span>
            </div>
        </div>
    </div>   
</div> <br>
<div class="col-md-1"></div>
<div class="col-md-12">
    <div class="form-group">
        <label for="">Describa brevemente los motivos de la cita Medica</label>
            <div class="form-group">
                <textarea name="description_appointment" id="" class="col-md-12" placeholder="Escriba aqui...">

                </textarea>
            </div>            
    </div>
    
</div>

<div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Registrar Cita Medica</button>
    </div>
    <div class="col-md-4"></div>
</div>
