<div class="row">
	<div class="x_panel">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="x_panel">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-7">
							<h4><label>TRATAMIENTO QUE DEBE SEGUIR EL PACIENTE</label></h4>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<label for="">Fecha Inicio Tratamiento:</label> {{ $treat[0]->date_start_treatment }}
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<label for="">Fecha Fin Tratamiento:</label> {{ $treat[0]->date_start_treatment }}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-3">
							<label for="">MEDICAMENTOS PARA EL TRATAMIENTO</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-3">
							<table id="" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nro.</th>
										<th>Nombre Medicamento</th>
										<th>Cantidad</th>
									</tr>
								</thead>
								<tbody>
									<?php $a = 1 ?>
									@foreach($treat as $lista)
									<tr>
										<td>{{ $a++ }}</td>
										<td>{{ $lista->name_medicine }}</td>
										<td>{{ $lista->quantity_medicine }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-10">
							<label for="">INDICACIONES PARA EL TRATAMIENTO</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							{{ $treat[0]->description_treatment }}
						</div>
					</div> <br>
                    <div class="row alinear">
                        <div class="col-md-6 alinear">
                            <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-print"> Imprimir Tratamiento</span> </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button alinear" class="btn btn-success"> <span class="glyphicon glyphicon-print"> Editar Tratamiento</span> </button>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
.alinear{
    position:relative;
    text-align: center;
}
</style>