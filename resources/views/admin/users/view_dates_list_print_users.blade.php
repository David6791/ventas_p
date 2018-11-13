<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
            Lista de Usuarios para Imrpimir Credenciales
            </h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="x_panel">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NRO.</th>
                                    <th>CI.</th>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>FECHA NACIMIENTO</th>
                                    <th>ESTADO IMPRESION</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                    @foreach($users as $lista)
                                        <tr>   
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->ci }}</td>
                                            <td>{{ $lista->name }} {{ $lista->apellidos }}</td>
                                            
                                            <td>{{ $lista->fecha_nacimiento }}</td>
                                            @if(($lista->print_cre)=='s')
                                            <td> Impreso </td>
                                            <td><a class="btn btn-primary btn-xs" target="_blank" href="print_credential_user/{{$lista->id}}"> <span class="glyphicon glyphicon-print"></span> Re-Imprimir</a></td>                                             
                                            @else
                                            <td> No Impreso </td>
                                            <td><a class="btn btn-success btn-xs" target="_blank" href="print_credential_user/{{$lista->id}}"> <span class="glyphicon glyphicon-print"></span> Imprimir</a></td>
                                            @endif                                            
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
<script>
    $('#datatable').DataTable();
</script>