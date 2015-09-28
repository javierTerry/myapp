<div class="form-group">
	{!! Form::label('clave_status', 'Clave del estatus') !!}
	{!! Form::text('clave_estatus', null,
	['class' 		=> 'form-contestatus'
	,'placeholder'	=> 'Clave del estatus'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('desc_estatus', 'Descripcion del estatus') !!}
	{!! Form::text('desc_estatus', null,
	['class' 		=> 'form-contestatus'
	,'placeholder'	=> 'Descripcion de la actividad principal del estatus'])
	!!}
</div>