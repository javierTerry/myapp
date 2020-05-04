<div class="form-group">
	{!! Form::textarea('descripcion', null,
		['class' 		=> 'form-control'
		,'placeholder'	=> 'Describre la actividad realizada'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('reporto', 'TICKET '
		, ['class' 		=> 'col-xs-3']) 
	!!}
	{!! Form::text('ticket', '' ,
		[ 'class' 		=> 'col-xs-9'
		 ,'palceholder' 	=> 'Ingresa el Numero de caso '])
	!!} 
</div>

<div class="form-group">
	{!! Form::text('reporto', Auth::user()->email ,
		['class' 		=> 'hidden'])
	!!} 
</div>

<div class="form-group">
	{!! Form::text('id_equipo', $equipo->id ,
		['class' 		=> ''])
	!!} 
</div>

