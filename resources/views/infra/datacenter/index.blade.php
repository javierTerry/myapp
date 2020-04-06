@extends('app')

@section('content')

<div class="page-header">
	<h1>
		D A T A C E N T E R 
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

		<a class="btn btn-success" href=" {{ route('infra.dcs.create') }} " role="button"> Nuevo  </a>

		<div class="table-responsive text-center">
			<table class="table table-striped table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>NAME</th>
						<th>DESCRIPCION</th>
						<th>No. de Fases</th>
						<th class="sorting_disabled"></th>
						<th class="sorting_disabled"></th>
						
					</tr>
				</thead>
				<tbody>
					@forelse( $dcs as $item)
						<tr>
							<td></td>
							<td>{{ $item -> id}}</td>
							<td>{{ $item -> name}}</td>
							<td>{{ $item -> desc}}</td>
							<td>{{ $item -> no_fase}}</td>

							<td>	
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
										<span class="sr-only">Toggle Navigation</span>
										<span class="btn btn-link">Acciones</span>
									</button>
								</div>

								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
									{!! Form::open([ 'route' => ['infra.dcs.destroy', $item], 'metdod' => 'DELETE' ]) !!}
										<button type="submit" class="btn btn-danger" >
											Eliminar 
										</button><a href="{{ route('infra.dcs.edit', $item -> id) }}" class="btn btn-info" >Editar</a> 
									{!! Form::close() !!} 				
								</div>

							</td>
							<td>
						</tr>
					@empty
					    <p>No existen DCs</p>
					@endforelse	
				</tbody>
			</table> <!-- id="dynamic-table" -->
		</div> <!-- class="table-responsive text-center"--> 
	</div> <!-- class="col-xs-12" -->
</div> <!-- class="row" -->
				
@endsection
