<div class="box-body">
    @forelse($dates_medic as $li)
        <div class="row">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover update_dates_medic">
                    <thead class="add_dates_medic_news">
                        <tr>
                            <th>
                                {{ $li->pregunta_mostrar }}
                            </th>
                            <th width="140px" ></th>
                        </tr>
                    </thead>
                    <tbody class="add_dates_medic_news">
                        <tr>
                            <td>
                                <p for="" id="{{ $li->id_patent_date_medic }}">{{ $li->descripcion }}</p>
                            </td>
                            <td>
                                <button class="btn btn-info btn-xs edit_dates_medic_patient" value="{{ $li->id_patent_date_medic }}"> <span class="glyphicon glyphicon-edit"></span> Editar</button>  <button class="btn btn-danger btn-xs delete_dates_medic_patient" value="{{ $li->id_patent_date_medic }}"> <span class="glyphicon glyphicon-crash"></span> Eliminar</button>   
                                
                            </td>
                        </tr>
                    </tbody>
                </table>    
            </div>
        </div>                         
    @empty
        <label for="">No existen datos medicos</label>
    @endforelse
    <div class="row">
        <center>
            <button class="btn btn-success add_date_new_medic" value="{{ $dates_patient[0]->id_paciente }}"> Agregar Nuevo dato Medico</button>
        </center>
    </div>
</div>  