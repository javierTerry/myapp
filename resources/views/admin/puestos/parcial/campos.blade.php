<div class="form-group">
	{!! Form::label('clave_puesto', 'Clave del Puesto') !!}
	{!! Form::text('clave_puesto', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Clave del Puesto'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('desc_puesto', 'Descripcion del Puesto') !!}
	{!! Form::text('desc_puesto', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Descripcion de la actividad principal del puesto'])
	!!}
</div>