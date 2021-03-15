@extends('app')

@section('content')
<div class="page-header">
	<h1>
		F A S E
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

		<a class="btn btn-success" href=" {{ route('infra.fase.create') }} " role="button"> Nuevo  </a>

		<div class="table-responsive text-center">
			<table class="table table-striped table-bordered table-hover" id="dynamic-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>DC</th>
						<th>FASE</th>
						<th>NO RACKS</th>
						<th>DESCRIPCION</th>
						<th class="sorting_disabled notexport"></th>
					</tr>
				</thead>
				<tbody>
					@forelse( $fases as $item)
						<tr>
							<td>{{ $item -> id}}</td>
							<td>{{ $item -> dc}}</td>
							<td>{{ $item -> name}}</td>
							<td>{{ $item -> no_rack}}</td>
							<td>{{ $item -> desc}}</td>						
							<td>	
								<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal{{ $item -> id }}" >
									<i class="ace-icon fa fa-trash-o"></i>
								</a>
								<a href="{{ route('infra.fase.edit', $item -> id) }}" class="btn btn-info" ><i class="ace-icon fa fa-pencil"></i></a>

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
										      	{!! Form::open([ 'route' => ['infra.fase.destroy', $item], 'metdod' => 'PUT' ]) !!}
										      		{{method_field('DELETE')}}
													<button type="submit" class="btn btn-danger" >
														OK
													</button>
													 <input type="button"  value="Close" data-dismiss="modal" class="btn btn-info" /> 							
												{!! Form::close() !!}
										    </div> <!-- modal-footer -->
									    </div> <!-- modal-content -->
								  	</div> <!-- modal-dialog -->
								</div> <!--modal fad -->
							</td>
							
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
