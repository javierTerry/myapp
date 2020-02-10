@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar Equipo : {{ $equipo -> hostname}}</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::model($equipo, [ 'route' => ['infra.equipo.update',$equipo], 'method' => 'PUT' ]) !!}
						  	@include('infra.equipo.parcial.campos')					  
						<button type="submit" class="btn btn-success" >Guardar </button>
						<a href="{{ route('infra.equipo.index') }}" class="btn btn-danger" >Cancelar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
