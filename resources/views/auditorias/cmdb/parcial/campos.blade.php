<div class="form-group" style="float:left;width:50%;">
    {!! Form::label('datacenter', 'Datacenter') !!}
	{!! Form::select('datacenter', $dcs
	, $item->datacenter 
	,['class' 		=> 'form-control'
		,'placeholder'	=> 'Seleccionar	'
		,'required'	=> 'true'
	] ); !!}
</div>

<div style="float:right ;width:50%;" class="form-group">
	{!! Form::label('validacion', '% de Validacion') !!}
	{!! Form::number('validacion', null,
	['class' 		=> 'form-control'
		,'placeholder'	=> 'Valor para el % de equipos para auditar	'
		,'required'	=> 'true'
		,'type'		=> 'number'
		,'min'		=> '1'
		,'max'		=> '100'
	])
	!!}
</div>

<div class="form-group">
	{!! Form::label('solicitante', 'Solicitante') !!}
	{!! Form::email('solicitante', null,
		['class' 		=> 'form-control'
			,'placeholder'	=> 'Introduce el correo del Solicitante'
			,'type'		=> 'email'
			,'required'	=> 'true'
		])
	!!}
</div>

<div class="form-group">
	{!! Form::label('notas', 'Notas') !!}
	{!! Form::text('notas', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce notas, comentarios o WO '])
	!!}
</div>


<div class="form-group" >
    {!! Form::label('estatus', 'Estatus') !!}
	{!! Form::select('estatus', $comboEstatus
	, $item->estatus 
	,['class' 		=> 'form-control'
		,'placeholder'	=> 'Seleccionar	'
		,'required'	=> 'true'
	] ); !!}
</div>
