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
									<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal{{ $item -> id }}" ><i class="ace-icon fa fa-trash-o"></i></a>
									<a href="{{ route('infra.dcs.edit', $item -> id) }}" class="btn btn-info" ><i class="ace-icon fa fa-pencil"></i></a>

								</div><!-- id="bs-example-navbar-collapse-2 -->			

								<div class="modal fade" id="modal{{ $item -> id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
								  aria-hidden="true">
									<div class="modal-dialog" role="document">
									    <div class="modal-content">
									    	<div class="modal-body">
									        	<p class="bigger-50 bolder center grey">
													<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
													
													Seguro que quieres eliminar el ID {{ $item -> id }} con NOMBRE {{ $item -> name}}?  	
												</p>
									      	</div>
									      <div class="modal-footer">
									      	{!! Form::open([ 'route' => ['infra.dcs.destroy', $item], 'metdod' => 'PUT' ]) !!}
									      		{{method_field('DELETE')}}
												<button type="submit" class="btn btn-danger" >
													OK
												</button>
												 <input type="button"  value="Close" data-dismiss="modal" class="btn btn-info" /> 							
											{!! Form::close() !!}
									      </div>
									    </div>
								  	</div>
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
				
<script>

	var dialogEliminar = $( ".dialog-eliminar" ).on('click', function(e) {
			e.preventDefault();
			
			console.log( $(this).attr('id') )
			;
			dialogModal = $( ".dialog-modal" ).removeClass('hide').dialog({
				resizable: false,
				width: '320',
				modal: true,
				title: " Eliminar registro?",
				title_html: true,
			});
	});



	$ (".btnClosePopup").on('click', function(e) {
		$( ".dialog-modal" ).addClass('hide dialog-modal');
		console.log("Cerrando");
	});
	</script>

@endsection
