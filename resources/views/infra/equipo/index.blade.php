@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				@include('infra/navigator')
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					
					{!! Form::close() !!}
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
							
						</tr>
						@forelse( $equipos as $item)
							<tr>
								<th>{{ $item -> id}}</th>
								<th>{{ $item -> hostname}}</th>
								<th>{{ $item -> iphw}}</th>
								<th>{{ $item -> serie}}</th>
								
								
								<th> {!! Form::open([ 'route' => ['infra.equipo.destroy', $item], 'method' => 'DELETE' ]) !!}
								<button type="submit" class="btn btn-danger" >
									Eliminar 
								</button>
								<p>
								<a href="{{ route('infra.equipo.edit', $item -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} </th>
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
