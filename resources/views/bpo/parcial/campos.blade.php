<div class="form-group">
	{!! Form::label('proyecto', 'Proyecto') !!}
	{!! Form::text('PROYECTO', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce proyecto'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('cliente', 'Cliente') !!}
	{!! Form::text('CLIENTE', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el cliente '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('proveedor', 'Proveedor') !!}
	{!! Form::text('PROVEEDOR', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el cliente '])
	!!}
</div>

<div class="form-group">
	{!! Form::label('FECHAINI', 'Fecha inicial') !!}
	{!! Form::text('FECHAINI', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
	
	{!! Form::label('FECHAFIN', 'Fecha Final') !!}
	{!! Form::text('FECHAFIN', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('FECHACOMPRA', 'Fecha Compra') !!}
	{!! Form::text('FECHACOMPRA', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'indtroduce la fecha de compra'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('costocompro', 'Costo de la compra') !!}
	{!! Form::text('COSTOCOMPRO', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa el  costo de la compra'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('costorealCOSTOREAL', 'Costo Real de la compra') !!}
	{!! Form::text('COSTOREAL', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa el costo de la compra '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('precioventa', 'Precio de la venta') !!}
	{!! Form::text('PRECIOVENTA', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa grossideal'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('avance', 'Avance del proyecto') !!}
	{!! Form::text('AVANCE', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa el avance del proyecto'])
	!!}
</div>