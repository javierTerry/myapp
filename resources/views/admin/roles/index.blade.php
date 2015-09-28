@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Roles</div>

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
					{!! Form::model(Request::only(['desc','clave']), [ 'route' => ['admin.roles.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}				
						<div class="form-group">
							{!! Form::text( 'desc', null, ['class' => 'form-control', 'placeholder' => 'Descripcion' ]) !!}
							{!! Form::text( 'clave', null, ['class' => 'form-control', 'placeholder' => 'Clave' ]) !!}
						</div>
						<button type="submit" class="btn btn-default">
							Buscar
						</button>
					
					{!! Form::close() !!}
					<p>
						<a class="btn btn-success" href=" {{ route('admin.roles.create') }} " role="button">
							Nuevo Rol
						</a>
					</p>
					Usuarios registrados {{ $roles ->total()}}, Total de paginas {{ $roles ->lastPage()}} , Pagina actual {{ $roles ->currentPage()}}  
					{!! $roles->appends(Request::only(['desc','clave']))->render() !!} 
					</p>
					<table class="table table-striped"> 
						<tr>
							<th>Clave del rol</th>
							<th>Descripción del rol</th>
							<th>Acciones</th>
						</tr>
						@foreach($roles as $rol)
						<tr>
							<th>{{ $rol -> clave_rol}}</th>
							<th>{{ $rol -> desc_rol}}</th>
							
							<th>
								{!! Form::open([ 'route' => ['admin.roles.destroy', $rol], 'method' => 'DELETE' ]) !!}					  
									<button type="submit" class="btn btn-danger" >Eliminar </button> 
									<a href="{{ route('admin.roles.edit', $rol->id) }}" class="btn btn-info" >Editar</a>
								{!! Form::close() !!}
								
								
							</th>
						</tr>
						@endforeach
					</table>
					{!! $roles->appends(Request::only(['desc','clave']))->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
