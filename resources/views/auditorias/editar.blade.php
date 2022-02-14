@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Actualizar Datacenter : {{ $item -> id}}</div>

				<div class="panel-body">
					{!! Form::model($item, [ 'route' => ['auditoria.cmdb.update',$item], 'method' => 'PUT' ]) !!}
						  	@include('auditorias.cmdb.parcial.campos')					  
						<button type="submit" class="btn btn-success" >Guardar </button>
						<a href="{{ route('auditoria.cmdb.index') }}" class="btn btn-danger" >Cancelar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<div class="table-responsive text-center">
	<table class="table table-striped table-bordered table-hover" id="dynamic-table">
		<thead>
			<tr>
				<th>ID Visual</th>
				<th>DC</th>
				<th>Fase</th>
				<th>Rack</th>
				<th>Nombre CI</th>
				<th>NS</th>
				<th>Nombre Del Producto</th>
				<th>Modelo / Version</th>
				<th style="display:none;">Total Memoria Fisica</th>
				<th>Nombre Propietario</th>
				<th>Contacto del propietario</th>
				<th style="display:none;">Verificador</th>
				<th style="display:none;">Fecha</th>
				<th style="display:none;">Gestor de Configuracion</th>
				<th style="display:none;">Fecha Validacion</th>
				<th style="display:none;">Observaciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $tabla as $item)
					<tr>
						
						<td>{{ $item -> idVisual}}</td>
						<td>{{ $item -> datacenter}}</td>
						<td>{{ $item -> fase}}</td>
						<td>{{ $item -> rack}}</td>
						<td>{{ $item -> nombre}}</td>
						<td>{{ $item -> ns}}</td>
						<td>{{ $item -> producto}}</td>
						<td>{{ $item -> modelo}}</td>
						<td style="display:none;"></td>
						<td>{{ $item -> propietarioNombre}}</td>
						<td>{{ $item -> propietarioContacto}}</td>
						<td style="display:none;"></td>
						<td style="display:none;"></td>
						<td style="display:none;"></td>
						<td style="display:none;"></td>
						<td style="display:none;"></td>	
						
					</tr>		
					@endforeach
		</tbody>
		<tfoot>
			
            <tr >
                <th colspan="3"><?php echo date('Y-m-d h:i:s T');?></th>
            </tr>
		</tfoot>
	</table>
</div>
@endsection
