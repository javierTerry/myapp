@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
					B P O - Proyectos - Seguimientos
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
						{!! Form::text('serch_proyecto', null, ['class' => 'form-control', 'placeholder' => 'id Seguimiento' ]) !!}
					</div>
					<button type="submit" class="btn btn-default">
						Buscar
					</button>

					{!! Form::close() !!}
					<p>
						<a class="btn btn-info" href=" {{ route('bpo.proyectos.seguimientos.index', $bpos[0]->id) }} " role="button"> Agregar Seguimiento  </a>
					</p>
					<div id="tabla_head">
						<table class="table table-striped table-hover">
						<thead class="">
							<tr>
								<th>ID</th>
								<th>PROYECTO</th>
								<th>CLIENTE</th>
								<th>PROVEEDOR</th>
								<th>AVANCE</th>
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
								
								</tr>
							@empty
							    <p>No Proyectos</p>
							@endforelse
						 </tbody>
						</table>
					</div>
					
					<div id="tabla_seguimientos">
						<table class="table table-striped table-hover">
						@if ( count($seguimientos) === 1)
						    
						<thead class="">
							<tr>
								<th>ID</th>
								<th>PROYECTO</th>
								<th>CLIENTE</th>
								<th>PROVEEDOR</th>
								<th>AVANCE</th>
							</tr>
						@endif
						</thead>
						 <tbody>
							@forelse($seguimientos as $seguimiento)
								<tr>
									<th>{{ $seguimiento -> id}}</th>
									<th>{{ $seguimiento -> proyecto}}</th>
									<th>{{ $seguimiento -> cliente}}</th>
									<th>{{ $seguimiento -> proveedor}}</th>
									<th>{{ $seguimiento -> avance_real}}</th>
								
								</tr>
							@empty
							    <p>No Existen Seguimientos</p>
							@endforelse
						 </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection