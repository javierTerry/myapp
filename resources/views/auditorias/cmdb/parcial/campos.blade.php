<div style="float:left;width:50%;" class="form-group">
	{!! Form::label('datacenter', 'DataCenter') !!}
	{!! Form::text('datacenter', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce una descripción del DataCenter  '])
	!!}
</div>

<div style="float:right ;width:50%;" class="form-group">
	{!! Form::label('validacion', '% de Validacion') !!}
	{!! Form::text('validacion', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Valor para el % de equipos para auditar'])
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

<div class="form-group">
	{!! Form::label('estatus', 'Estatus') !!}
	{!! Form::text('estatus', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> ''])
	!!}
</div>