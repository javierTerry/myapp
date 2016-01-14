<div class="form-group">
	{!! Form::label('proyecto', 'Proyecto') !!}
	{!! Form::text('proyecto', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce proyecto'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('cliente', 'Cliente') !!}
	{!! Form::text('cliente', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el cliente '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('proveedor', 'Proveedor') !!}
	{!! Form::text('proveedor', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el cliente '])
	!!}
</div>

<div class="form-group">
	{!! Form::label('fechaini', 'Fecha inicial') !!}
	{!! Form::text('fechaini', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
	
	{!! Form::label('fechafin', 'Fecha Final') !!}
	{!! Form::text('fechafin', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Fecha'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('fechacompra', 'Fecha Compra') !!}
	{!! Form::text('fechacompra', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'indtroduce la fecha de compra'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('costocompro', 'Costo de la compra') !!}
	{!! Form::text('costocompro', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa el  costo de la compra'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('costoreal', 'Costo Real de la compra') !!}
	{!! Form::text('costoreal', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa el costo de la compra '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('precioventa', 'Precio de la venta') !!}
	{!! Form::text('precioventa', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa grossideal'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('avance', 'Avance del proyecto') !!}
	{!! Form::text('avance', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Ingresa el avance del proyecto'])
	!!}
</div>