	@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Puestos</div>

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
					{!! Form::model(Request::only(['desc','clave']), [ 'route' => ['admin.puestos.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}				
						<div class="form-group">
							{!! Form::text( 'desc', null, ['class' => 'form-control', 'placeholder' => 'Descripcion' ]) !!}
							{!! Form::text( 'clave', null, ['class' => 'form-control', 'placeholder' => 'Clave' ]) !!}
						</div>
						<button type="submit" class="btn btn-default">
							Buscar
						</button>
					
					{!! Form::close() !!}
					<p>
						<a class="btn btn-success" href=" {{ route('admin.puestos.create') }} " role="button">
							Nuevo Puesto
						</a>
					</p>
					Usuarios registrados {{ $puestos ->total()}}, Total de paginas {{ $puestos ->lastPage()}} , Pagina actual {{ $puestos ->currentPage()}}  
					{!! $puestos->appends(Request::only(['desc','clave']))->render() !!} 
					</p>
					<table class="table table-striped"> 
						<tr>
							<th>Clave del puesto</th>
							<th>Descripción del puesto</th>
							<th>Acciones</th>
						</tr>
						@foreach($puestos as $puesto)
						<tr>
							<th>{{ $puesto -> clave_puesto}}</th>
							<th>{{ $puesto -> desc_puesto}}</th>
							
							<th>
								{!! Form::open([ 'route' => ['admin.puestos.destroy', $puesto], 'method' => 'DELETE' ]) !!}					  
									<button type="submit" class="btn btn-danger" >Eliminar </button> 
									<a href="{{ route('admin.puestos.edit', $puesto->id) }}" class="btn btn-info" >Editar</a>
								{!! Form::close() !!}
								
								
							</th>
						</tr>
						@endforeach
					</table>
					{!! $puestos->appends(Request::only(['desc','clave']))->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
