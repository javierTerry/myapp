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


	<div class="col-sm-5">

		<div class="col-xs-12 label label-lg label-success arrowed-in arrowed-right">
			<b>Descripcion del equipo</b>
		</div>
		<div class="tabbable">
		
			<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="tabs">
				<li class="active">
					<a data-toggle="tab" href="#tabs-1">General</a>
				</li>

				<li>
					<a data-toggle="tab" href="#tabs-2">Caracteristicas</a>
				</li>

				<li>
					<a data-toggle="tab" href="#tabs-3">Puertos</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="tabs-1" class="tab-pane in active">
					{!! Form::model($equipo, [ 'route' => ['infra.equipo.update',$equipo], 'method' => 'PUT', 'class' => 'form-horizontal' ,'role' => 'form']) 
					 !!}
						@include('infra.equipo.parcial.campos')

						<div class="form-actions center no-padding-right">
							<a href="{{ url()->previous() }}" class="btn btn-info" >Regresar</a>
							<button type="submit" class="btn btn-success" >Guardar Cambios</button>
							
						</div>
					{!! Form::close() !!}
				</div>

				<div id="tabs-2" class="tab-pane">
					<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla..</p>
				</div>

				<div id="tabs-3" class="tab-pane">
					<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Praesent eu risus hendrerit ligula tempus pretium.</p>
				</div>
			</div>
		</div><!-- end tabbable -->
	</div> <!-- end col-sm-5 -->

	<div class="col-sm-7">
		<div class="col-xs-12 label label-lg {{ ( $equipo->alarmado ) ? 'label-danger' : 'label-info' }}  arrowed-in arrowed-right">
			<b>Historial del equipo</b>
		</div>

			@include('infra.equipo.parcial.historial')
			@include('infra.equipo.parcial.historialTabla')
		
	</div>
</div>


@endsection



