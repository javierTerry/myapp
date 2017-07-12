@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">	D B A D M I N S  - U P L O A D </div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					@include('utils.upload')
					
				</div>
				
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>FECHA ARCHIVO</th>
						<th>FECHA DE UPLOAD</th>
					</tr>
					<tbody>
						@forelse($rows as $row)
							<tr>
								<th>{{ $row -> id}}</th>
								<th>{{ $row -> fecha}}</th>
								<th>{{ $row -> created_at}}</th>
							
							</tr>
						@empty
						    <p>No Proyectos</p>
						@endforelse
					 </tbody>
				</table>
				</p>
				
				
			</div>
		</div>
	</div>
</div>


@endsection
