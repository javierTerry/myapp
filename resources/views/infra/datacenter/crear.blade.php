@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"> Nuevo - DataCenter </div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::open([ 'route' => 'infra.dcs.store', 'method' => 'POST' ]) !!}
						@include('infra.datacenter.parcial.campos')
						  <button type="submit" class="btn btn-success" >Guardar </button>
						  <a href="{{ route('infra.dcs.index') }}" class="btn btn-danger" >Cancelar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
