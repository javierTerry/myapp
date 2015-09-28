<div class="form-group">
	{!! Form::label('clave_rol', 'Clave del rol') !!}
	{!! Form::text('clave_rol', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Clave del rol'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('desc_rol', 'Descripcion del rol') !!}
	{!! Form::text('desc_rol', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Descripcion de la actividad principal del rol'])
	!!}
</div>