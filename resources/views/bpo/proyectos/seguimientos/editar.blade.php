@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar Seguimiento ID '{{ $seguimientos -> id	}}'</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					{!! Form::model($seguimientos, [ 'route' => ['bpo.proyectos.seguimientos.update.form',$bpo ->id, $seguimientos->id], 'method' => 'PUT', 'class' => 'form-horizontal'  ]) !!}
						  @include('bpo.proyectos.seguimientos.parcial.campos')					  
						<button type="submit" class="btn btn-info" >Actualizar </button>
						<a href="{{ route('bpo.proyectos.seguimientos', $bpo -> id) }}" class="btn btn-primary" > Regresar </a>
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
