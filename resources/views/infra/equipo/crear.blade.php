@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-heading"> Nuevo -  EQUIPO </div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::open([ 'route' => 'infra.equipo.store', 'method' => 'POST' ]) !!}
						@include('infra.equipo.parcial.campos')
						  <div class="form-actions center no-padding-right">
								<button type="submit" class="btn btn-success" >Guardar Cambios</button>
								
							</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
