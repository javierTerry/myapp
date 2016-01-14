@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar Proyecto, Plataforma: {{ $proyecto -> plataforma}}</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::model($proyecto, [ 'route' => ['fnz.proy.update',$proyecto], 'method' => 'PUT' ]) !!}
						  	@include('finanzas.parcial.campos')					  
						<button type="submit" class="btn btn-info" >Guardar </button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
