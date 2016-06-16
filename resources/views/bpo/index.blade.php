@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
					B P O - P R O Y E C T O S
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

					{!! Form::model(Request::only(['proyecto']), [ 'route' => ['bpo.proyectos.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}
					<div class="form-group">
						{!! Form::text('serch_proyecto', null, ['class' => 'form-control', 'placeholder' => 'Proyectos' ]) !!}
					</div>
					<button type="submit" class="btn btn-default">
						Buscar
					</button>

					{!! Form::close() !!}
					<p>
						<a class="btn btn-info" href=" {{ route('bpo.proyectos.create') }} " role="button"> Nuevo  </a>
					</p>
					
					<div id="tabla">
						Proyectos {{ $bpos ->total()}}, Total de paginas {{ $bpos ->lastPage()}} , Pagina actual {{ $bpos ->currentPage()}}
					</p>
					
					{!! $bpos -> render() !!}
						<table class="table table-striped table-hover">
						<thead class="">
							<tr>
								<th>ID</th>
								<th>PROYECTO</th>
								<th>CLIENTE</th>
								<th>PROVEEDOR</th>
								<th>AVANCE</th>
								<th>OPCIONES</th>
							</tr>
						</thead>
						 <tbody>
							@forelse($bpos as $bpo)
								<tr>
									<th>{{ $bpo -> id}}</th>
									<th>{{ $bpo -> proyecto}}</th>
									<th>{{ $bpo -> cliente}}</th>
									<th>{{ $bpo -> proveedor}}</th>
									<th>{{ $bpo -> avance_real}}</th>
									<th> {!! Form::open([ 'route' => ['bpo.proyectos.destroy', $bpo], 'method' => 'DELETE' ]) !!}
										<button type="submit" class="btn btn-danger" >
											Eliminar
										</button>
										<a href="{{ route('bpo.proyectos.edit', $bpo -> id) }}" class="btn btn-info" >Editar</a>
										<a href="{{ route('bpo.proyectos.seguimientos', $bpo -> id) }}" class="btn btn-primary" >Seguimiento</a> 
										{!! Form::close() !!} 
									</th>
								
								</tr>
							@empty
							    <p>No Proyectos</p>
							@endforelse
						 </tbody>
						</table>
						Proyectos {{ $bpos ->total()}}, Total de paginas {{ $bpos ->lastPage()}} , Pagina actual {{ $bpos ->currentPage()}}
					</p>
					
					{!! $bpos -> render() !!}
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection