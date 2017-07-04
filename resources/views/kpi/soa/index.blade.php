@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">	H O M E - K P I S  - A P L I C A C I O N E S - S O A </div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					@include('utils.upload')
					
					
				</div>
				
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>ARCHIVO ORIGEN</th>
						<th>FECHA DE UPLOAD</th>
						<th>OPCIONES</th>
					</tr>
					<tbody>
						@forelse($rows as $row)
							<tr>
								<th>{{ $row -> id}}</th>
								<th>{{ $row -> nombre_file}}</th>
								<th>{{ $row -> created_at}}</th>
								<th><a href="{{ route('kpi.aplicaciones.soa.show', $row -> fecha_file) }}" class="btn btn-primary" >Seguimiento</a> <th>
							</tr>
						@empty
						    <p>No Existen Respaldos</p>
						@endforelse
					 </tbody>
				</table>
				</p>
				
				
			</div>
		</div>
	</div>
</div>


@endsection
