<div class="form-group">
	{!! Form::label('name', 'NOMBRE') !!}
	{!! Form::text('name', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el id descriptivo para el RACK'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ur', 'UNIDADES DE RACK') !!}
	{!! Form::text('ur', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Cantidad de unidad que tiene el rack'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('coordenada', 'COORDENADAS') !!}
	{!! Form::text('coordenada', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce las coordenadas del rack'])
	!!}
</div>
<div class="form-group">
    Fase 
    
    <select class="form-control" name="id_fase">
    	<option value="" > Selecciona </option>
        @foreach($fase as $item)

   	        <option value="{{ $item->id }}" {{ ( $rack->id_fase == $item->id) ? 'selected' : '' }} > {{ $item->name }} </option> 

        @endforeach

    </select>
</div>