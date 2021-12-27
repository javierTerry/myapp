<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::text('name', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el id descriotivo de DataCenter'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('desc', 'DESCRIPCION') !!}
	{!! Form::text('desc', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce una descripción del DataCenter  '])
	!!}
</div>
