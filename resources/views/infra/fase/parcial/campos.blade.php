<div class="form-group">
	{!! Form::label('name', 'NOMBRE') !!}
	{!! Form::text('name', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce el nombre de la Fase'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('desc', 'DESCRIPCION') !!}
	{!! Form::text('desc', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Introduce una descripción para la Fase  '])
	!!}
</div>
<div class="form-group">
    DATACENTER 
    
    <select class="form-control" name="id_datacenter">
    	<option value="" > Selecciona </option>
        @foreach($dcs as $item)

   	        <option value="{{ $item->id }}" {{ ( $fase->id_datacenter == $item->id) ? 'selected' : '' }}> {{ $item->name }} </option> 

        @endforeach

    </select>
</div>