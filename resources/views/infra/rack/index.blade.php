@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					R   A   C  K
				</div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					
					{!! Form::close() !!}
					<p>
						<a class="btn btn-success" href=" {{ route('infra.rack.create') }} " role="button"> Nuevo  </a>
					</p>
					Racks {{ $racks ->total()}}, Total de paginas {{ $racks ->lastPage()}} , Pagina actual {{ $racks ->currentPage()}}
					</p>
					
					{!! $racks->render() !!}
					<table class="table table-striped">
						<tr>
							<th>NAME</th>
							<th>COORDENADA</th>
							<th>NO EQUIPOS</th>
							
						</tr>
						@forelse( $racks as $item)
							<tr>
								<th>{{ $item -> name}}</th>
								<th>{{	 $item -> coordenada}}</th>
								<th>{{	 $item -> no_equipo}}</th>
								
								
								<th> {!! Form::open([ 'route' => ['fnz.proy.destroy', $item], 'method' => 'DELETE' ]) !!}
								<button type="submit" class="btn btn-danger" >
									Eliminar
								</button><a href="{{ route('infra.rack.edit', $item -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} </th>
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
