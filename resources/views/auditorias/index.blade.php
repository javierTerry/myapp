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
						<th>ID</th>
						<th>ESTATUS</th>
						<th>FECHA</th>
						<th>DC</th>
						<th>SOLICITANTE</th>
						<th>RESPONSABLE</th>
						<th>% DE VALIDACION</th>
						<th class="sorting_disabled notexport">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $items as $item)
					<tr>
						
						<td >{{ $item -> id}}</td>
						<td>
							<div style="display:none"> {{ $item -> estatus }} </div>
							<i class="ace-icon glyphicon {{ ($item -> estatus == 0) ? 'glyphicon-off' : ''}} bigger-130 blue"> </i>
							<i class="ace-icon glyphicon {{ ($item -> estatus == 1) ? 'glyphicon-play' : ''}} bigger-130 purple"> </i>
							<i class="ace-icon glyphicon {{ ($item -> estatus == 2) ? 'glyphicon-ok' : ''}} bigger-130 green"> </i>
							<i class="ace-icon glyphicon {{ ($item -> estatus == 3) ? 'glyphicon-time' : ''}} bigger-130 red"> </i>
							
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
