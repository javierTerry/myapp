@extends('app')

@section('content')

<div class="page-header">
	<h1>
		I N V E N T A R I O 
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Vista general &amp; Estadisticas
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		@include('errors.parcial.campos_error')
		@include('errors.parcial.campos_notices')

		<a class="btn btn-success" href=" {{ route('infra.equipo.create') }} " role="button"> Nuevo  </a>

		<div class="table-responsive text-center">
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>

			<table class="table table-striped table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						
						<th>ID</th>
						<th>DC</th>
						<th>RACK</th>
						<th>HOSTNAME</th>
						<th>I P</th>
						<th>NS</th>
						<th style="display:none;">MARCA</th>
						<th>MODELO</th>
						<th style="display:none;" >SOPORTE</th>
						<th style="display:none;" >POWER</th>
						<th class="sorting_disabled notexport"></th>
						
					</tr>
				</thead>
				<tbody>
					@foreach( $equipos as $item)
					<tr>
						
						<td>{{ $item -> id}}</td>
						<td>{{ $item -> dc}}</td>
						<td>{{ $item -> rack}}</td>
						<td>
							{{ $item -> hostname}}
							<i class="ace-icon fa {{ $item-> alarmado ? 'fa-times red2' : 'fa-check bigger-110 green' }}"></i>
									  
						</td>
						<td>{{ $item -> iphw}}</td>
						<td>{{ $item -> serie}}</td>
						<td style="display:none;">{{ $item -> marca}}</td>
						<td>{{ $item -> modelo}}</td>
						<td style="display:none;" >{{ $item -> soporte}}</td>
						<td style="display:none;" >{{ $item -> power}}</td>

						<td> 
							<a href="{{ route('infra.equipo.edit', $item -> id) }}" class="btn btn-info" ><i class="ace-icon fa fa-pencil"></i></a>
						</td>
					</tr>		
					@endforeach
						
				</tbody>
			</table> <!-- id="dynamic-table" -->
		</div> <!-- class="table-responsive text-center"--> 
	</div> <!-- class="col-xs-12" -->
</div> <!-- class="row" -->

@endsection