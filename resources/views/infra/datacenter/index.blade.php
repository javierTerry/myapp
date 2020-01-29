@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					FINANZAS
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
						<a class="btn btn-success" href=" {{ route('fnz.proy.create') }} " role="button"> Nuevo  </a>
					</p>
					Proyectos {{ $proyectos ->total()}}, Total de paginas {{ $proyectos ->lastPage()}} , Pagina actual {{ $proyectos ->currentPage()}}
					</p>
					
					{!! $proyectos->render() !!}
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>FECHA</th>
							<th>PLATAFORMA</th>
							<th>GROSSMAR</th>
							<th>EBITDA</th>
							<th>GROSSIDEAL</th>
							<th>EBITDAIDEAL</th>
							<th>INGRESOS</th>
							<th>OPCIONES</th>
						</tr>
						@forelse( $proyectos as $proyecto)
							<tr>
								<th>{{ $proyecto -> id}}</th>
								<th>{{ $proyecto -> fecha_ing}}</th>
								<th>{{ $proyecto -> plataforma}}</th>
								<th>{{ $proyecto -> grossmar}} %</th>
								<th>{{ $proyecto -> ebitda}} %</th>
								<th>{{ $proyecto -> grossideal}} %</th>
								<th>{{ $proyecto -> ebitdaideal}} %</th>
								<th>{{ $proyecto -> ingresos}}</th>
								<th> {!! Form::open([ 'route' => ['fnz.proy.destroy', $proyecto], 'method' => 'DELETE' ]) !!}
								<button type="submit" class="btn btn-danger" >
									Eliminar
								</button><a href="{{ route('fnz.proy.edit', $proyecto -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} </th>
							</tr>
						@empty
						    <p>No Proyectos</p>
						@endforelse
						
					</table>
						Proyectos {{ $proyectos ->total()}}, Total de paginas {{ $proyectos ->lastPage()}} , Pagina actual {{ $proyectos ->currentPage()}}
					</p>
					
					{!! $proyectos->render() !!}					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
