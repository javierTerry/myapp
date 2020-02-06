<div class="form-group">
	{!! Form::label('name', 'NOMBRE') !!}
	{!! Form::text('name', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el id descriotivo de DataCenter'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ur', 'UNIDAD DE RACK') !!}
	{!! Form::text('ur', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce una descripción del DataCenter  '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('coordenada', 'COORDENADAS') !!}
	{!! Form::text('coordenada', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce una descripción del DataCenter  '])
	!!}
</div>
