<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>

	<div class="col-sm-9">
		<input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
	</div>
</div>
<div class="space-6"></div>

<br></br>
<p></p>

<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Full Length </label>

	<div class="col-sm-9">
		<input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
	</div>
</div>


<div class="form-group">
	{!! Form::label('hostname', 'HOSTNAME'
		, ['class'	=> 'col-sm-3 control-label no-padding-right']) 
	!!}
	<div class="col-sm-9">
		{!! Form::text('hostname', null,
			['class' 		=> 'col-xs-10 col-sm-12'
			,'placeholder'	=> 'Introduce el hostname del equipo'])
		!!}
	</div>
</div>


<div class="form-group">
	{!! Form::label('iphw', 'IP HW'
		, ['class' 		=> 'col-sm-2 ']) 
	!!}
	{!! Form::text('iphw', null,
		['class' 		=> 'col-xs-10'
		,'placeholder'	=> 'Introduce la IP de hardware'])
	!!}
</div>

<div class="form-group">
	<label class="col-sm-2 control-label " for=""> No. SERIE </label>
		{!! Form::text('serie', null,
			['class' 		=> 'col-xs-10'
			,'placeholder'	=> 'Introduce el numero de serie '])
		!!}
</div>
	

<div class="form-group">
	{!! Form::label('soporte', 'RESPONSABLE') !!}
	{!! Form::text('soporte', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el correo del equipos responsable'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ur_usada', 'Unidad Rack ') !!}
	{!! Form::text('ur_usada', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el numero de unidades de rack ysadas'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('equipo_tipo', 'Equipo ') !!}
	{!! Form::text('equipo_tipo', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Indica si es storage,serve, etc'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('marca', 'MARCA ') !!}
	{!! Form::text('marca', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Indica que marca'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('modelo', 'MODELO ') !!}
	{!! Form::text('modelo', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Indica que modelo'])
	!!}
</div>

<div class="form-group">
    Rack
    <select class="form-control" name="id_rack">
    	<option value=""> Seleccionar </option>
        @foreach($rack as $item)
        <option value="{{$item->id}}" {{ ($equipo->id_rack == $item->id) ? 'selected' : '' }} >{{$item->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    Estado
    <select class="form-control" name="power">
        <option value="1" {{ ($equipo->power == '1') ? 'selected' : '' }} > Encendido</option>
        <option value="0" {{ ($equipo->power == '0') ? 'selected' : '' }}> Apagado</option>
    </select>
</div>

<div class="form-group">
    Alarma
    <select class="form-control" name="alarmado">
        <option value="0" {{ ($equipo->alarmado == '0') ? 'selected' : '' }}>Sin Alarma</option>
        <option value="1" {{ ($equipo->alarmado == '1') ? 'selected' : '' }}>Alarmado</option>
    </select>
</div>