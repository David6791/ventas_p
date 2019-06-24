<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"> <i class="glyphicon glyphicon-menu-hamburger"></i> Menu Atencion Pacientes</h3>
            </div>
            <div class="box-body">
                <div class="vertical-menu">
                    <a class="btn  btn-sm view_patient_dates"> <i class="glyphicon glyphicon-dashboard"></i> Datos del Paciente</a>
                    <a class="btn  btn-sm view_cites_previus" > <i class="glyphicon glyphicon-dashboard"></i> Citas Anteriores</a>
                    <a class="btn  btn-sm view_attention_patient" > <i class="glyphicon glyphicon-dashboard"></i> Atencion Cita</a>
                    <!-- Solo cambiar la Clase para poder ver el formulario anterior -->
                    <!--a class="btn  btn-sm view_treatment_form" > <i class="glyphicon glyphicon-dashboard"></i> Tratamiento</a-->
                    <a class="btn  btn-sm view_treatment_form_2" > <i class="glyphicon glyphicon-dashboard"></i> Receta Medica</a>
                    <a class="btn  btn-sm view_exam_medic_select" ><i class="glyphicon glyphicon-dashboard"></i> Examen Medico</a>
                    <a class="btn  btn-sm vew_transfer_patient" > <i class="glyphicon glyphicon-dashboard"></i> Traslado de Paciente</a>
                    <a class="btn  btn-sm view_end_cite_medic" ><i class="glyphicon glyphicon-dashboard"></i> Finalizar Cita Medica</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-user"></i>  Paciente: <span class="text-green">{{ $dates_patient[0]->nombres }} {{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}</span>
                </h3>
            </div>
            <div class="box-body">
                <input type="hidden" name="id_app" value="{{ $dates_cita_end[0]->id_medical_appointments }}">
                <div class="cargar_aqui"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .vertical-menu a{
        width:100%;
        margin-top:2px;
        text-align:left;
        border:1px solid #d9d9d9;
        font-size:14px;
        color: #4d4d4d;
        transition: background-color 1s;
        -webkit-transition: background-color 1s;

    }
    .vertical-menu a:hover{
        background-color: #3973ac;
        border-radius:8px;
        color:#fff;
    }
</style>
