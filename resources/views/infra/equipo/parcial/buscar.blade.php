{!! Form::model(Request::only(['hostname']), [ 'route' => ['infra.equipo.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}
<div class="form-group">
	{!! Form::text( 'hostname', null, ['class' => 'form-control', 'placeholder' => 'Definir campos para busquedar' ]) !!}
</div>

<button type="submit" class="btn btn-default" >
	Buscar
</button>

{!! Form::close() !!}