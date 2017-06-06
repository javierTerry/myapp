@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">	FINANZAS - CARTERA </div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					@include('utils.upload')
					
				</div>
				
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>FECHA</th>
							<th>PLATAFORMA</th>
							<th>GROSSMAR</th>
							<th>EBITDA</th>
							<th>GROSSIDEAL</th>
							<th>EBITDAIDEAL</th>
							<th>INGRESOS</th>
							<th>OPCIONES</th>
						</tr>
					</table>
					</p>
					
				
			</div>
		</div>
	</div>
</div>


@endsection
