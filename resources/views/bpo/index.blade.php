@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">s
				<div class="panel-heading">
					B P O
				</div>
				<div class="panel-body">

					@if( isset($notices) && !empty($notices))
					<p>
						<div class="alert alert-warning" role="alert">
							@foreach($notices as $notice)
							<p></p>
							<strong> {{ $notice }} </strong>
							@endforeach
						</div>
					</p>
					@endif

					{!! Form::model(Request::only(['name','email']), [ 'route' => ['bpo.proyectos.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}
					<div class="form-group">
						{!! Form::text( 'name', null, ['class' => 'form-control', 'placeholder' => 'Definir campos para busquedar' ]) !!}
					</div>
					<button type="submit" class="btn btn-default" disabled="disabled">
						Buscar
					</button>

					{!! Form::close() !!}
					<p>
						<a class="btn btn-info" href=" {{ route('bpo.proyectos.create') }} " role="button"> Nuevo  </a>
					</p>
				
					</p>
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>PROYECTO</th>
							<th>FECHA INICIAL</th>
							<th>FECHA FINAL</th>
							<th>FECHA COMPRA</th>
							<th>CLIENTE</th>
							<th>COSTO COMPRA</th>
							<th>COSTO REAL</th>
							<th>PRECIO VENTA</th>
							<th>PROVEEDOR</th>
							<th>AVANCE</th>
							<th>OPCIONES</th>
						</tr>
						@forelse($bpos as $bpo)
							<tr>
								<th>{{ $bpo -> id}}</th>
								<th>{{ $bpo -> PROYECTO}}</th>
								<th>{{ $bpo -> FECHAINI}}</th>
								<th>{{ $bpo -> FECHAFIN}}</th>
								<th>{{ $bpo -> FECHACOMPRA}}</th>
								<th>{{ $bpo -> CLIENTE}}</th>
								<th>{{ $bpo -> COSTOCOMPRO}}</th>
								<th>{{ $bpo -> COSTOREAL}}</th>
								<th>{{ $bpo -> PRECIOVENTA}}</th>
								<th>{{ $bpo -> PROVEEDOR}}</th>
								<th>{{ $bpo -> AVANCE}}</th>
								<th> {!! Form::open([ 'route' => ['bpo.proyectos.destroy', $bpo], 'method' => 'DELETE' ]) !!}
								<button type="submit" class="btn btn-danger" >
									Eliminar
								</button><a href="{{ route('bpo.proyectos.edit', $bpo -> id) }}" class="btn btn-info" >Editar</a> {!! Form::close() !!} </th>
							</tr>
						@empty
						    <p>No Proyectos</p>
						@endforelse
					</table>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection