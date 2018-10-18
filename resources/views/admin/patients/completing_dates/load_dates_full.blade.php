<div class="col-md-6">
    <table class="table table-user-information">
        <tbody>
            <tr>
                <td class="col-md-4"><label for="">CI.:</label></td>
                <td> {{ $dates_patient[0]->ci_paciente }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">NOMBRES:</label></td>
                <td> {{ $dates_patient[0]->nombres }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">APELLIDOS:</label> </td>
                <td>{{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">FECHA NACIMIENTO:</label> </td>
                <td>{{ $dates_patient[0]->fecha_nacimento }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">GENERO:</label> </td>
                <td>{{ $dates_patient[0]->sexo }}</td>
            </tr>
        </tbody>
    </table>                                        
    </div>
    <div class="col-md-6">
    <table class="table table-user-information">
        <tbody>
            <tr>
                <td class="col-md-4"><label for="">DIRECCION:</label></td>
                <td> {{ $dates_patient[0]->direccion }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">PAIS DE NACIMIENTO:</label></td>
                <td> {{ $dates_patient[0]->pais_nacimiento }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">LUGAR DE NACIMIENTO:</label></td>
                <td> {{ $dates_patient[0]->localidad_nacimiento }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">TELEFONO - CELULAR:</label> </td>
                <td>{{ $dates_patient[0]->telefono }} - {{ $dates_patient[0]->celular }}</td>
            </tr>
            <tr>
                <td class="col-md-5"><label for="">FECHA DE REGISTRO:</label> </td>
                <td>{{ $dates_patient[0]->fecha_creacion }}</td>
            </tr>
        </tbody>
    </table>                                        
</div>