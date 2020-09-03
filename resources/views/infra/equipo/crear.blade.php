@extends('app')

@section('content')
<div class="page-header">
	<h1>
		E Q U I P O -
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Agregar 
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row"> 
	@include('errors.parcial.campos_error')
	@include('errors.parcial.campos_notices')
	<div class="col-sm-5 infobox-container">
		<div class="panel-body">

			{!! Form::open([ 'route' => 'infra.equipo.store', 'method' => 'POST' , 'class' => 'form-horizontal','role' => 'form']) !!}
				@include('infra.equipo.parcial.campos')
				 	<div class="form-actions center no-padding-right">
						<button type="submit" class="btn btn-success" >Guardar Cambios</button>	
					</div>
			{!! Form::close() !!}
			
		</div>
	</div>

	<div class="col-sm-7">
		<div class="panel-body">
			@include('infra.equipo.parcial.historial')
			
		</div>
	</div>
</div>



@endsection