@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">	FINANZAS - CARTERA - SEGUIMIENTO </div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
				</div>
				<table class="table table-striped">
					<tr>
						<th>CLIENTE</th>
						<th>FECHA</th>
						<th>AL CORRIENTE</th>
						<th>A TREINTA</th>
						<th>AL SESENTA</th>
						<th>A NOVENTA</th>
					</tr>
					<tbody>
						@forelse($seguimientos as $value)
							<tr>
								<th>{{ $value -> cliente}}</th>
								<th>{{ $value -> fecha}}</th>
								<th>$ {{ $value -> cartera_vencida['alcorriente'] }}</th>
								<th>$ {{ $value -> cartera_vencida['atreinta'] }}</th>
								<th>$ {{ $value -> cartera_vencida['asesenta'] }}</th>
								<th>$ {{ $value -> cartera_vencida['anoventa'] }}</th>
							</tr>
						@empty
						    <p>No hay carteras cargadas</p>
						@endforelse
					</tbody>
				</table>		
			</div>
		</div>
	</div>
</div>


@endsection
