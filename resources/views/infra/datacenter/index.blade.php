@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">

				@include('infra/navigator')
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')

					@include('infra.datacenter.parcial.buscar')
					
					<p>
						<a class="btn btn-success" href=" {{ route('infra.dcs.create') }} " role="button"> Nuevo  </a>
					</p>
					DataCenters {{ $dcs ->total()}}, Total de paginas {{ $dcs ->lastPage()}} , Pagina actual {{ $dcs ->currentPage()}}
					</p>
					
					{!! $dcs->render() !!}
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>NAME</th>
							<th>DESCRIPCION</th>
							<th>No. de Fases</th>
							<th></th>
							<th></th>
							
						</tr>
						@forelse( $dcs as $dc)
							<tr>
								<th>{{ $dc -> id}}</th>
								<th>{{ $dc -> name}}</th>
								<th>{{ $dc -> desc}}</th>
								<th>{{ $dc -> no_fase}}</th>

								<th>	
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
											<span class="sr-only">Toggle Navigation</span>
											<span class="btn btn-link">Acciones</span>
										</button>
									</div>

									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
										<ul >
											{!! Form::open([ 'route' => ['infra.dcs.destroy', $dc], 'method' => 'DELETE' ]) !!}
											<button type="submit" class="btn btn-danger" >
												Eliminar
											</button>			
										
											<a href="{{ route('infra.dcs.edit', $dc -> id) }}" class="btn btn-info" >Editar</a>  
											{!! Form::close() !!}				
										</ul>
									</div>
									
								</th>
							</tr>
						@empty
						    <p>No existen DCs</p>
						@endforelse
						
					</table>
						DataCenters {{ $dcs ->total()}}, Total de paginas {{ $dcs ->lastPage()}} , Pagina actual {{ $dcs ->currentPage()}}
					</p>
					
					{!! $dcs->render() !!}					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
