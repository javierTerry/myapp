<div class="col-xs-12 label label-lg label-success arrowed-in arrowed-right">
	<b>Descripcion del equipo</b>
</div>
<br></br>
<div class="form-group">
	{!! Form::label('alarmadoLbl', ' TIENE ALARMA ?'
		, ['class'	=> 'col-xs-3']) 
	!!}
		<div class="col-xs-6">
			<label>
				<input name="alarmadoSwtich" id="switchAlarma"  class="ace ace-switch ace-switch-5"  
					type="checkbox" {{ ( $equipo->alarmado ) ? 'checked' : '' }} 
				 />
				<span class="lbl"></span>
			</label>
		</div>

</div>

<div class="form-group">
	{!! Form::text('alarmado', $equipo->alarmado ,
		['class' 		=> 'hidden'
		,'id' => 'alarmado'])
	!!} 
</div>

<div class="form-group">
	{!! Form::label('hostname', 'HOSTNAME'
		, ['class'	=> 'col-xs-3 ']) 
	!!}
		{!! Form::text('hostname', null,
			['class' 		=> 'col-xs-9 '
			,'placeholder'	=> 'Introduce el hostname del equipo'])
		!!}
</div>
<div class="form-group">
	{!! Form::label('iphw', 'IP HARDWARE'
		, ['class' 		=> 'col-xs-3']) 
	!!}
	{!! Form::text('iphw', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Introduce la IP de hardware'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('No. SERIE', 'NO. SERIE'
		, ['class' 		=> 'col-xs-3']) 
	!!}
	{!! Form::text('serie', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Introduce el numero de serie '])
	!!}
</div>
	

<div class="form-group">
	{!! Form::label('soporte', 'RESPONSABLE'
		, ['class' 		=> 'col-xs-3'])
	 !!}
	{!! Form::text('soporte', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Introduce el correo del equipos responsable'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ur_usada', 'UNIDAD RACK '
		, ['class' 		=> 'col-xs-3']) 
	!!}
	{!! Form::text('ur_usada', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Introduce el numero de unidades de rack Usadas'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('equipo_tipo', 'EQUIPO '
		, ['class' 		=> 'col-xs-3 '
		]) 
	!!}
	{!! Form::text('equipo_tipo', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Indica si es storage,serve, etc'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('marca', 'MARCA '
		, ['class' 		=> 'col-xs-3']) 
	!!}
	{!! Form::text('marca', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Indica que marca'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('modelo', 'MODELO '
		, ['class' 		=> 'col-xs-3']) 
	!!}
	{!! Form::text('modelo', null,
		['class' 		=> 'col-xs-9'
		,'placeholder'	=> 'Indica que modelo'])
	!!}
</div>

<div></div>
<div class="form-group ">
	{!! Form::Label('rack', 'Rack: '
		, ['class' 		=> 'col-xs-3 no-padding-left']) 
	!!}
	<div class="col-xs-9 no-padding">
		{!! Form::select('id_rack', $rack->pluck('name','id'), $equipo->id_rack, ['class' => 'form-control ']) !!}
	</div>
</div>

<div class="form-group">
    {!! Form::Label('estado', 'ESTADO: '
		, ['class' 		=> 'col-xs-3']) 
	!!}
	<div class="col-xs-9 no-padding">
		{!! Form::select('power', array(1=>'ENCENDIDO', 0=>'APAGADO'), $equipo->power, ['class' => 'form-control ']) !!}
	</div>
</div>



<script type="text/javascript">
	$(function() {
	    $( "#switchAlarma" ).click(function(){
	    	console.log($(this).get(0).checked);
	    	var alarmado = ( $(this).get(0).checked) ? 1 : 0	    	
	    	document.getElementById("alarmado").value = alarmado

	    	var x = document.getElementById("myDIV");
			  if (x.style.display === "none") {
			    x.style.display = "block";
			  } else {
			    x.style.display = "none";
			  }
	    });
	});

</script>








FOC2020R263