<div class="row arriba">
    <div class="col-md-4">
        POLICLINICO VIRGEN DE COPACABANA
    </div>
</div>
<div class="row arriba1">
    <div class="col-md-4">
        Seguro Policial
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    Apellido Paterno:
                </div>
                <div class="contents">
                    {{ strtoupper($rows[0]->ap_paterno) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    Apellido Materno:
                </div>
                <div class="contents">
                    {{ strtoupper($rows[0]->ap_materno) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    Nombres:
                </div>
                <div class="contents">
                    {{ strtoupper($rows[0]->nombres) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    CI:
                </div>
                <div class="contents">
                    {{ ($rows[0]->ci_paciente) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    FECHA NACIMIENTO:
                </div>
                <div class="contents">
                    {{ ($rows[0]->fecha_nacimento) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row qr">
            <div class="col-md-12">
                <!--img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate('http://192.168.1.106:8000/ver_historial/'.$rows[0]->ci_paciente)) }} "-->
                <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate('http://192.168.0.152:8000/ver_historial/'.$rows[0]->ci_paciente)) }} ">
            </div>
        </div> <br> <br> <br> <br> <br> <br>
        <div class="row qr1">
            <div class="col-md-12">
                Firma Paciente
            </div>
        </div>
    </div>
</div>

<style>
    @page{
        margin-top:0;
        margin-left:15;
        margin-right:15;
        margin-bottom:0;
    }
    .arriba{
        margin-top:13px;
        margin-left:10px;
        font-size:10px;
        color:green;
    }
    .arriba1{
        margin-top:0px;
        margin-left:20px;
        font-size:10px;
        color:green;
    }
    .qr{
        margin: auto;
        margin-left:220px;
        margin-top:-130px;
    }
    .title{
        color:green;
        font-size:10px;
    }
    .contents{
        font-size:15px;
    }
    .qr1{
        margin: auto;
        margin-top:30px;
        margin-left:150px;

    }
</style>
