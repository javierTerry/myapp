<div class="form-group">
	{!! Form::label('hostname', 'HOSTNAME') !!}
	{!! Form::text('hostname', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el hostname del equipo'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('iphw', 'IP HW') !!}
	{!! Form::text('iphw', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce la IP de hardware'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('serie', 'NO SERIE') !!}
	{!! Form::text('serie', null,
	['class' 		=> 'form-control'
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