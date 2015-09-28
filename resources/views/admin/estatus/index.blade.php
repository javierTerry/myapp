@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Estatus
				</div>

				<div class="panel-body">
					@if( isset($notices))
					<p>
						<div class="alert alert-warning" role="alert">
							@foreach($notices as $notice)
							<p></p>
							<strong> {{ $notice }} </strong>
							@endforeach
						</div>
					</p>
					@endif
					{!! Form::model(Request::only(['desc','clave']), [ 'route' => ['admin.estatus.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}				
						<div class="form-group">
							{!! Form::text( 'desc', null, ['class' => 'form-control', 'placeholder' => 'Descripcion' ]) !!}
							{!! Form::text( 'clave', null, ['class' => 'form-control', 'placeholder' => 'Clave' ]) !!}
						</div>
						<button type="submit" class="btn btn-default">
							Buscar
						</button>
					
					{!! Form::close() !!}
					<p>
						<a class="btn btn-success" href=" {{ route('admin.estatus.create') }} " role="button"> Nuevo Estatus </a>
					</p>

					Usuarios registrados {{ $estatus ->total()}}, Total de paginas {{ $estatus ->lastPage()}} , Pagina actual {{ $estatus ->currentPage()}}
					{!! $estatus->appends(Request::only(['desc','clave']))->render() !!}
					</p>
					<table class="table table-striped">
						<tr>
							<th>Clave del estatus</th>
							<th>Descripción del estatus</th>
							<th>Acciones</th>
						</tr>
						@foreach($estatus as $estatu)
						<tr>
							<th>{{ $estatu -> clave_estatus}}</th>
							<th>{{ $estatu -> desc_estatus}}</th>

							<th> {!! Form::open([ 'route' => ['admin.estatus.destroy', $estatu], 'method' => 'DELETE' ]) !!}
							<button type="submit" class="btn btn-danger" >
								Eliminar
							</button><a href="{{ route('admin.estatus.edit', $estatu->id) }}" class="btn btn-info" >Editar</a> 
							{!! Form::close() !!} </th>
						</tr>
						@endforeach
					</table>
					{!! $estatus->appends(Request::only(['desc','clave']))->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
