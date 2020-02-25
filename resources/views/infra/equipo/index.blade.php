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
					
					@include('infra.equipo.parcial.buscar')
					<p>
						<a class="btn btn-success" href=" {{ route('infra.equipo.create') }} " role="button"> Nuevo  </a>
					</p>
					Equipos {{ $equipos ->total()}}, Total de paginas {{ $equipos ->lastPage()}} , Pagina actual {{ $equipos ->currentPage()}}
					</p>
					
					{!! $equipos->render() !!}
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>HOSTNAME</th>
							<th>I P</th>
							<th>NS</th>
							<th></th>
							
						</tr>
						@forelse( $equipos as $item)
							<tr>
								<th>{{ $item -> id}}</th>
								<th>{{ $item -> hostname}}</th>
								<th>{{ $item -> iphw}}</th>
								<th>{{ $item -> serie}}</th>
								
								
								<th> 
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
											<span class="sr-only">Toggle Navigation</span>
											<span class="btn btn-link">Acciones</span>
										</button>
									</div>

									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
										<ul >
											{!! Form::open([ 'route' => ['infra.equipo.destroy', $item], 'method' => 'DELETE' ]) !!}
											<button type="submit" class="btn btn-danger" >
												Eliminar 
											</button>
											<p>
											<a href="{{ route('infra.equipo.edit', $item -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} 				
										</ul>
									</div>
									
								</th>
							</tr>
						@empty
						    <p>No existen equipos</p>
						@endforelse
						
					</table>
						equipos {{ $equipos ->total()}}, Total de paginas {{ $equipos ->lastPage()}} , Pagina actual {{ $equipos ->currentPage()}}
					</p>
					
					{!! $equipos->render() !!}					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
