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
	<div class="col-lg-5">
		{!! Form::label('', 'Planeada') !!}
		</p>
		 <div class="col-lg-5">
			{!! Form::label('fechaini', 'Fecha inicial') !!}
			{!! Form::text('fechaini', null,
			['class' 		=> 'form-control'
			,'placeholder'	=> 'Fecha Inicial'])
			!!}
		</div>
		<div class="col-lg-5">
			{!! Form::label('fechafin', 'Fecha Final') !!}
			{!! Form::text('fechafin', null,
			['class' 		=> 'form-control'
			,'placeholder'	=> 'Fecha Final'])
			!!}
		</div>
	</div>
	<div class="col-lg-5">
		{!! Form::label('', 'Real') !!}
		</p>
		 <div class="col-lg-5">
			{!! Form::label('fechaini', 'Fecha inicial') !!}
			{!! Form::text('fechaini', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha Inicial'])
			!!}
		</div>
		<div class="col-lg-5">
			{!! Form::label('fechafin', 'Fecha Final') !!}
			{!! Form::text('fechafin', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha Final'])
			!!}
		</div>
	</div>
	<div class="col-lg-2">
		</p>
		</p>
		{!! Form::label('fechacompra', 'Fecha Compra') !!}
		</p>
		</p>
		{!! Form::text('fechacompra', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Fecha de compra'])
		!!}
	</div>
</div>
<div class="form-group">
	<div class="col-lg-3">
		{!! Form::label('costocompro', 'Costo de la compra') !!}
		{!! Form::text('costocompro', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa el  costo de la compra'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('costoreal', 'Costo Real de la compra') !!}
		{!! Form::text('costoreal', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa el costo de la compra '])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('precioventa', 'Precio de la venta') !!}
		{!! Form::text('precioventa', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa grossideal'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('avance', 'Avance del proyecto') !!}
		{!! Form::text('avance', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa el avance del proyecto'])
		!!}
	</div>
</div>

<div class="form-group">
	<div class="col-lg-3">
		{!! Form::label('costocompro', 'Porcentaje de avance planeado') !!}
		{!! Form::text('costocompro', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa el  costo de la compra'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('costoreal', 'Costo Real de la compra') !!}
		{!! Form::text('costoreal', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa el costo de la compra '])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('precioventa', 'Precio de la venta') !!}
		{!! Form::text('precioventa', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa grossideal'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('precioventa', 'Precio de la venta') !!}
		{!! Form::text('precioventa', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Ingresa grossideal'])
		!!}
	</div>
</div>
