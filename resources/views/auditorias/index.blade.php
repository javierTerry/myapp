@extends('app')

@section('content')

<div class="page-header">
	<h1>
		A U D I T O R I A S 
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Vista general &amp; Estadisticas
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<a class="btn btn-success" href=" {{ route('auditoria.cmdb.create') }} " role="button"> Nuevo  </a>

		<div class="table-responsive text-center">
			<table class="table table-striped table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>ESTATUS</th>
						<th>FECHA</th>
						<th>DC</th>
						<th>SOLICITANTE</th>
						<th>RESPONSABLE</th>
						<th>% DE VALIDACION</th>
						<th>ACCIONES</th>

					</tr>
				</thead>
				<tbody>
					@foreach( $items as $item)
					<tr>
						
						<td>{{ $item -> id}}</td>
						<td>
							{{ $item -> estatus}}
							<i class="ace-icon fa {{ $item-> alarmado ? 'fa-times red2' : 'fa-check bigger-110 green' }}"></i>
						</td>
						<td>{{ $item -> fecha}}</td>
						<td>{{ $item -> datacenter}}</td>
						<td>{{ $item -> solicitante}}</td>
						<td>{{ $item -> responsable}}</td>
						<td>{{ $item -> validacion}}%</td>
						<td> 
							<a href="{{ route('auditoria.cmdb.edit', $item -> id) }}" class="btn btn-info" ><i class="ace-icon fa fa-pencil"></i></a>
						</td>
					</tr>		
					@endforeach
						
				</tbody>
				
			</table> <!-- id="dynamic-table" -->
		</div> <!-- class="table-responsive text-center"--> 
	</div> <!-- class="col-xs-12" -->
</div> <!-- class="row" -->
				
@endsection
