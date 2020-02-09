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
					
					{!! Form::close() !!}
					<p>
						<a class="btn btn-success" href=" {{ route('infra.fase.create') }} " role="button"> Nuevo  </a>
					</p>
					Fases {{ $fases ->total()}}, Total de paginas {{ $fases ->lastPage()}} , Pagina actual {{ $fases ->currentPage()}}
					</p>
					
					{!! $fases->render() !!}
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>FASE</th>
							<th>NO RACKS</th>
							<th>DESCRIPCION</th>

						</tr>
						@forelse( $fases as $item)
							<tr>
								<th>{{ $item -> id}}</th>
								<th>{{ $item -> name}}</th>
								<th>{{ $item -> no_rack}}</th>
								<th>{{ $item -> desc}}</th>
								
								
								<th> {!! Form::open([ 'route' => ['fnz.proy.destroy', $item], 'method' => 'DELETE' ]) !!}
								<button type="submit" class="btn btn-danger" >
									Eliminar
								</button><a href="{{ route('infra.fase.edit', $item -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} </th>
							</tr>
						@empty
						    <p>No existen Fases</p>
						@endforelse
						
					</table>
						Fases {{ $fases ->total()}}, Total de paginas {{ $fases ->lastPage()}} , Pagina actual {{ $fases ->currentPage()}}
					</p>
					
					{!! $fases->render() !!}					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
