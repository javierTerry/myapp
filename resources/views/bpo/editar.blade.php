@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-heading">
						<a href=" " > B P O</a> -
						<a href=" {{ URL::to('/bpo/proyectos/') }} " > P R O Y E C T O S</a> 	
					</div>
					Actualizar Proyecto '{{ $bpo -> PROYECTO	}}'
				</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::model($bpo, [ 'route' => ['bpo.proyectos.update',$bpo->id], 'method' => 'PUT', 'class' => 'form-horizontal'  ]) !!}
						  	@include('bpo.parcial.campos')					  
						<button type="submit" class="btn btn-info" >Guardar </button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
