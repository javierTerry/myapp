@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">	FINANZAS - CARTERA - AGLOMERADO</div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					
				</div>
				
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>FECHA</th>
						<th>OPCIONES</th>
					</tr>
					<tbody>
							@forelse($aglomerado as $key => $cliente)
								<tr>
									<th>{{ $key}}</th>
									
									@forelse($cliente as $key1 => $value)
											<th>{{ $value}}</th>
									@empty
									    <p>No hay informacion</p>
									@endforelse		
									
								
								</tr>
							@empty
							    <p>No hay informacion</p>
							@endforelse
						 </tbody>
				</table>
				</p>
				
				
			</div>
		</div>
	</div>
</div>


@endsection
