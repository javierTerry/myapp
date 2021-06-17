@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-heading"> Nuevo -  R A C K </div>
				<div class="panel-body">
					{!! Form::open([ 'route' => 'infra.rack.store', 'method' => 'POST' ]) !!}
						@include('infra.rack.parcial.campos')
						  <button type="submit" class="btn btn-success" >Guardar </button>
						  <a href="{{ route('infra.rack.index') }}" class="btn btn-danger" >Cancelar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
