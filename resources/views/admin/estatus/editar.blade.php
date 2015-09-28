@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar Estatus {{ $estatus-> clave_puesto}}</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::model($estatus, [ 'route' => ['admin.estatus.update',$estatus], 'method' => 'PUT' ]) !!}
						  	@include('admin.estatus.parcial.campos')					  
						<button type="submit" class="btn btn-info" >Guardar </button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
