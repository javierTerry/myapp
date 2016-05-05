<div class="form-group">
	{!! Form::label('plataforma', 'Plataforma') !!}
	{!! Form::text('plataforma', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce la plataforma'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ingresos', 'INGRESOS') !!}
	{!! Form::text('ingresos', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'indtroduce el ingreso '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('grossmar', 'GROSSMAR') !!}
	{!! Form::text('grossmar', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa grossmar'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('ebitda', 'EBITDA') !!}
	{!! Form::text('ebitda', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa la cantidad (si %)'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('grossideal', 'GROSSIDEAL') !!}
	{!! Form::text('grossideal', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa la cantidad (si %)'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ebitdaideal', 'EBITDAIDEAL') !!}
	{!! Form::text('ebitdaideal', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa la cantidad (si %)'])
	!!}
	
	{!! Form::label('fecha_ing', 'FECHA') !!}
	{!! Form::text('fecha_ing', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
</div>