<div class="form-group">
	{!! Form::label('alarmadoLbl', ' TIENE ALARMA ?'
		, ['class'	=> 'col-sm-3']) 
	!!}
	<div class="col-sm-9">
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

	{!! Form::label('hostname', 'HOSTNAME'
		, ['class'	=> 'col-sm-2']) 
	!!}
	{!! Form::text('hostname', null,
		['class' 		=> 'col-sm-4 '
			,'placeholder'	=> 'Introduce el hostname del equipo'
		])
	!!}
</p>
	{!! Form::label('iphw', 'IP HARDWARE'
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('iphw', null,
		['class' 		=> 'col-sm-3'
		,'placeholder'	=> 'Introduce la IP de hardware'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('serie_lbl', 'No. SERIE'
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('serie', null,
		['class' 		=> 'col-sm-4'
		,'placeholder'	=> 'No. de Serie'])

	!!}
</p>
	{!! Form::label('garantia_lbl', 'GARANTIA'
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('garantia', null,
		['class' 		=> 'col-sm-3 date-picker '
		,'placeholder'	=> 'Fecha de Garantia'])

	!!}
</div>
<div class="form-group">

	{!! Form::label('soporte_lbl', 'RESPONSABLE'
		, ['class' 		=> 'col-sm-2'])
	 !!}
	{!! Form::text('soporte', null,
		['class' 		=> 'col-sm-4'
		,'placeholder'	=> 'Introduce el correo del equipo responsable'])
	!!}

	</p>
	{!! Form::label('lbl_propiedad', 'PROPIEDAD'
		, ['class' 		=> 'col-sm-2']) 
	!!}
	<div class="col-sm-3 no-padding">
		{!! Form::select('propiedad', array(1=>'MN', 2=>'CLIENTE',3=>'PROVEEDOR'), null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('inventario_lbl', 'INVENTARIO'
		, ['class' 		=> 'col-sm-2'])
	 !!}
	<div class="col-sm-4 no-padding">
		{!! Form::select('inventario', array(1=>'ACTIVO', 2=>'INACTIVO',3=>'HISTORICO'), null, ['class' => 'form-control']) !!}
	</div>
	</p>
	{!! Form::label('whatts_lbl', 'WHATTS'
		, ['class' 		=> 'col-sm-2']) 
	!!}
	
	{!! Form::text('whatts', null,
		['class' 		=> 'col-sm-3'
		,'placeholder'	=> 'Whatts fuentes de poder '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ur_usada', 'UR USADA '
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('ur_usada', null,
		['class' 		=> 'col-sm-1'
		,'placeholder'	=> 'Numero de UR Usadas'])
	!!}
	</p>
	{!! Form::label('ur_asignada_lbl', 'UR ASIGNADA '
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('ur_asignada', null,
		['class' 		=> 'col-sm-2'
		,'placeholder'	=> 'UR asignada'])
	!!}
	</p>
	{!! Form::label('equipo_tipo', 'EQUIPO '
		, ['class' 		=> 'col-sm-1'
		]) 
	!!}
	{!! Form::text('equipo_tipo', null,
		['class' 		=> 'col-sm-3'
		,'placeholder'	=> 'Indica si es storage,serve, etc'])
	!!}
</div>
<div class="form-group">	
	{!! Form::label('marca', 'MARCA '
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('marca', null,
		['class' 		=> 'col-sm-4'
		,'placeholder'	=> 'Indica que marca'])
	!!}
	</p>	
	{!! Form::label('modelo', 'MODELO '
		, ['class' 		=> 'col-sm-2']) 
	!!}
	{!! Form::text('modelo', null,
		['class' 		=> 'col-sm-3'
		,'placeholder'	=> 'Indica que modelo'])
	!!}
</div>
<div class="form-group">
	{!! Form::Label('rack_LBL', 'RACK: '
		, ['class' 		=> 'col-sm-2']) 
	!!}
	<div class="col-sm-4 no-padding">
		{!! Form::select('id_rack', $rack->pluck('name','id'), $equipo->id_rack, ['class' => 'form-control ']) !!}
	</div>

    {!! Form::Label('estado_LBL', 'ESTATUS: '
		, ['class' 		=> 'col-sm-2']) 
	!!}
	<div class="col-sm-3 no-padding">
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
