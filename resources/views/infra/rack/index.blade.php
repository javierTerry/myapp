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
					
					@include('infra.rack.parcial.buscar')

					<p>
						<a class="btn btn-success" href=" {{ route('infra.rack.create') }} " role="button"> Nuevo  </a>
					</p>
					Racks {{ $racks ->total()}}, Total de paginas {{ $racks ->lastPage()}} , Pagina actual {{ $racks ->currentPage()}}
					</p>
					
					{!! $racks->render() !!}
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>NAME</th>
							<th>COORDENADA</th>
							<th>NO EQUIPOS</th>
							<th></th>
							<th></th>

						</tr>
						@forelse( $racks as $item)
							<tr>
								<th>{{ $item -> id}}</th>
								<th>{{ $item -> name}}</th>
								<th>{{$item -> coordenada}}</th>
								<th>{{ $item -> no_equipo}}</th>
																
								<th> 
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
											<span class="sr-only">Toggle Navigation</span>
											<span class="btn btn-link">Acciones</span>
										</button>
									</div>

									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
										<ul >
										{!! Form::open([ 'route' => ['infra.rack.destroy', $item], 'method' => 'DELETE' ]) !!}
									<button type="submit" class="btn btn-danger" >
										Eliminar
									</button>
									<p>
									<a href="{{ route('infra.rack.edit', $item -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} 
									</ul>
								</th>
							</tr>
						@empty
						    <p>No existen Racks</p>
						@endforelse
						
					</table>
						Racks {{ $racks ->total()}}, Total de paginas {{ $racks ->lastPage()}} , Pagina actual {{ $racks ->currentPage()}}
					</p>
					
					{!! $racks->render() !!}					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
