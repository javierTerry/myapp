@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar area {{ $area-> clave_area}}</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::model($area, [ 'route' => ['admin.areas.update',$area], 'method' => 'PUT' ]) !!}
						  	@include('admin.areas.parcial.campos')					  
						<button type="submit" class="btn btn-info" >Guardar </button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
