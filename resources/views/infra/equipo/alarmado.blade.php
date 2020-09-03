@extends('app')

@section('content')

<div class="page-header">
	<h1>
		I N V E N T A R I O 
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Equipos Alarmados
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		@include('errors.parcial.campos_error')
		@include('errors.parcial.campos_notices')

		<div class="table-responsive text-center">
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>

			<table class="table table-striped table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						
						<th>ID</th>
						<th>HOSTNAME</th>
						<th>I P</th>
						<th>NS</th>
						<th>MODELO</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach( $equipos as $item)
					<tr>
						
						<td>{{ $item -> id}}</td>
						<td>{{ $item -> hostname}}</td>
						<td>{{ $item -> iphw}}</td>
						<td>{{ $item -> serie}}</td>
						<td>{{ $item -> modelo}}</td>
						
					</tr>		
					@endforeach
						
				</tbody>
			</table> <!-- id="dynamic-table" -->
		</div> <!-- class="table-responsive text-center"--> 
	</div> <!-- class="col-xs-12" -->
</div> <!-- class="row" -->

@endsection

