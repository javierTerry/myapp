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
						<th>NAME</th>
						<th>DESCRIPCION</th>
						<th>No. de Fases</th>
						<th class="sorting_disabled notexport"></th>
					</tr>
				</thead>
				
			</table> <!-- id="dynamic-table" -->
		</div> <!-- class="table-responsive text-center"--> 
	</div> <!-- class="col-xs-12" -->
</div> <!-- class="row" -->
				
@endsection
