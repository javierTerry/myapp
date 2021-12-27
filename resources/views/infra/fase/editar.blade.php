@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar Fase : {{ $fase -> name}}</div>

				<div class="panel-body">
					{!! Form::model($fase, [ 'route' => ['infra.fase.update',$fase], 'method' => 'PUT' ]) !!}
						  	@include('infra.fase.parcial.campos')					  
						<button type="submit" class="btn btn-success" >Guardar </button>
						<a href="{{ route('infra.fase.index') }}" class="btn btn-danger" >Cancelar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
