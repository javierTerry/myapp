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
				<th>Centro de Datos</th>
				<th>Fase</th>
				<th>Rack</th>
				<th>Nombre CI</th>
				<th>NS</th>
				<th>Nombre Del Producto</th>
				<th>Modelo / Version</th>
				<th>Total Memoria Fisica</th>
				<th>Nombre Propietario</th>
				<th>Contacto del propietario</th>
				<th>Verificador</th>
				<th>Fecha</th>
				<th>Gestor de Configuracion</th>
				<th>Fecha Validacion</th>
				<th>Observaciones</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@endsection
