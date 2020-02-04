@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					D A T A C E N T E R
				</div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					
					{!! Form::model(Request::only(['name','email']), [ 'route' => ['fnz.proy.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}
					<div class="form-group">
						{!! Form::text( 'name', null, ['class' => 'form-control', 'placeholder' => 'Definir campos para busquedar' ]) !!}
					</div>
					<button type="submit" class="btn btn-default" disabled="disabled">
						Buscar
					</button>

					{!! Form::close() !!}
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
							
						</tr>
						@forelse( $dcs as $dc)
							<tr>
								<th>{{ $dc -> id}}</th>
								<th>{{ $dc -> name}}</th>
								<th>{{ $dc -> desc}}</th>
								<th>{{ $dc -> plataforma}}</th>
								
								<th> {!! Form::open([ 'route' => ['fnz.proy.destroy', $dc], 'method' => 'DELETE' ]) !!}
								<button type="submit" class="btn btn-danger" >
									Eliminar
								</button><a href="{{ route('fnz.proy.edit', $dc -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} </th>
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
