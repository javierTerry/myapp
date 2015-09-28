<div class="form-group">
	{!! Form::label('name', 'Nombre (s)') !!}
	{!! Form::text('name', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce tu nombre'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('apellidos', 'Apellidos') !!}
	{!! Form::text('apellidos', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce tus appellidos'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('rfc', 'RFC') !!}
	{!! Form::text('rfc', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce tu RFC'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('direccion', 'Direccion Completa') !!}
	{!! Form::text('direccion', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce tu Direccion '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('jefe_inmediato', 'Jefe Inmediato') !!}
	{!! Form::text('jefe_inmediato', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'En cargado Directo'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('fecha_ing', 'Fecha de ingreso') !!}
	{!! Form::text('fecha_ing', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
	
	{!! Form::label('fecha_baja', 'Fecha de baja') !!}
	{!! Form::text('fecha_baja', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
	
	{!! Form::label('fecha_cambio', 'Fecha de cambio') !!}
	{!! Form::text('fecha_cambio', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('tel_casa', 'Tel. Fijo') !!}
	{!! Form::text('tel_casa', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> ''])
	!!}
</div>

<div class="form-group">
	{!! Form::label('clave_area', 'Clave del Area') !!}
	{!! Form::select('clave_area', $areas, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('clave_puesto', 'Clave del Puesto') !!}
	{!! Form::select('clave_puesto', $puestos, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('clave_rol', 'Clave del Rol') !!}
	{!! Form::select('clave_rol', $roles,['class' => 'form-control']) !!}
</div>