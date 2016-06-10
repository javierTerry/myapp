
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
	<div class="col-lg-5">
		{!! Form::label('', 'Periodo Reportado') !!}
		</p>
		 <div class="col-lg-5">
			{!! Form::label('', 'de') !!}
			{!! Form::text('', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha de'])
			!!}
		</div>
		<div class="col-lg-5">
			{!! Form::label('', 'Hasta') !!}
			{!! Form::text('', null,
			['class' 		=> 'date form-control'
			,'placeholder'	=> 'Fecha hasta'])
			!!}
		</div>
	</div>
</div>