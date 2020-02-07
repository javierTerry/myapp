<div class="form-group">
	{!! Form::label('hostname', 'HOSTNAME') !!}
	{!! Form::text('hostname', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el hostname del equipo'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ip', 'IP') !!}
	{!! Form::text('ip', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce la IP de hardware'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('serial', 'SERIAL') !!}
	{!! Form::text('serial', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el numero de serie '])
	!!}
</div>
<div class="form-group">
	{!! Form::label('responsable', 'RESPONSABLE') !!}
	{!! Form::text('responsable', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el correo del equipos responsable'])
	!!}
</div>

<div class="form-group">
    Rack
    <select class="form-control" name="id_rack">
        @foreach($racks as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>