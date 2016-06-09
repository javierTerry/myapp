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
	{!! Form::label('', 'Proveedor') !!}
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
			{!! Form::text('fecha_inicial_planeada', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha Inicial'])
			!!}
		</div>
		<div class="col-lg-5">
			{!! Form::label('fechafin', 'Fecha Final') !!}
			{!! Form::text('fecha_final_planeada', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha Final'])
			!!}
		</div>
	</div>
	<div class="col-lg-5">
		{!! Form::label('', 'Real') !!}
		</p>
		 <div class="col-lg-5">
			{!! Form::label('', 'Fecha inicial') !!}
			{!! Form::text('fecha_inicial_real', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha Inicial'])
			!!}
		</div>
		<div class="col-lg-5">
			{!! Form::label('', 'Fecha Final') !!}
			{!! Form::text('fecha_final_real', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha Final'])
			!!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-lg-3">
		{!! Form::label('costocompro', 'Costo del proyecto') !!}
		{!! Form::text('costo_compra', null,
		['class' 		=> 'maskMoney_  form-control'
		,'placeholder'	=> 'Ingresa el  costo del proyecto'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('costoreal', 'Costo Real del proyecto') !!}
		{!! Form::text('costo_real', null,
		['class' 		=> 'maskMoney_  form-control'
		,'placeholder'	=> 'Ingresa el costo del proyecto'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('precioventa', 'Precio del proyecto') !!}
		{!! Form::text('precio_venta', null,
		['class' 		=> 'maskMoney_ form-control'
		,'placeholder'	=> 'Ingresa el precio'])
		!!}
	</div>
</div>

<div class="form-group">
	<div class="col-lg-3">
		{!! Form::label('avance', 'Porcentaje de avance real') !!}
		{!! Form::text('avance_real', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Porcentaje real'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('', 'Porcentaje de avance planeado') !!}
		{!! Form::text('avance_planeado', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Porcentaje Planeado'])
		!!}
	</div>
	<div class="col-lg-3">
		{!! Form::label('', 'Desviación del proyecto') !!}
		{!! Form::text('desviacion', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Porcentaje de desvición'])
		!!}
	</div>
</div>
<div class="form-group">
	<div class="col-lg-3">
		{!! Form::label('', 'Periodo Reportado') !!}
		{!! Form::text('periodo_reportado', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Periodo Reportado '])
		!!}
	</div>
</div>
