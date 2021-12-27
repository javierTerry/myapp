{!! Form::model(Request::only(['name']), [ 'route' => ['infra.dcs.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}
<div class="form-group">
	{!! Form::text( 'name', null, ['class' => 'form-control', 'placeholder' => 'Definir campos para busquedar' ]) !!}
</div>

<button type="submit" class="btn btn-default" >
	Buscar
</button>

{!! Form::close() !!}