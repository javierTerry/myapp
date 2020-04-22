@extends('app')

@section('content')
<div class="page-header">
	<h1>
		E Q U I P O -
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Editar &amp; Alarmas
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row"> 
	<div class="col-sm-6 infobox-container">
		<div class="panel-body">
			@include('errors.parcial.campos_error')
			{!! Form::model($equipo, [ 'route' => ['infra.equipo.update',$equipo], 'method' => 'PUT' ]) !!}
				  	@include('infra.equipo.parcial.campos')					  
				<button type="submit" class="btn btn-success" >Guardar </button>
				<a href="{{ route('infra.equipo.index') }}" class="btn btn-danger" >Cancelar</a>
			{!! Form::close() !!}
		</div>
	</div>

	<div class="col-sm-6">
		
	</div>
</div>


@endsection
