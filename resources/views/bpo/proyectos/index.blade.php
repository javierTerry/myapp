@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href=" " > B P O</a> -
					<a href=" {{ URL::to('/bpo/proyectos/') }} " > P R O Y E C T O S</a> -
					<a href=" " > S E G U I M I E N T O S</a> 
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
					
					Seguimientos {{ $seguimientos ->total()}}, Total de paginas {{ $seguimientos ->lastPage()}} , Pagina actual {{ $seguimientos ->currentPage()}}
					</p>
					
					{!! $seguimientos->render() !!}
					<div id="tabla_seguimientos">
						<table class="table table-striped table-hover">
						@if ( count($seguimientos) > 0)
						    
						<thead class="">
							<tr>
								<th>ID</th>
								<th>AVANCE PLANEADO</th>
								<th>AVANCE REAL</th>
								<th>DESVIACIÓN</th>
								<th>FECHA DE</th>
								<th>FECHA HASTA</th>
								<th>OBSERVACIONES</th>
								<th>OPCIONES</th>
								
							</tr>
						@endif
						</thead>
						 <tbody>
							@forelse($seguimientos as $seguimiento)
								<tr>
									<th>{{ $seguimiento -> id}}</th>
									<th>{{ $seguimiento -> avance_planeado}}</th>
									<th>{{ $seguimiento -> avance_real}}</th>
									<th>{{ $seguimiento -> desviacion}}</th>
									<th>{{ $seguimiento -> fecha_de }}</th>
									<th>{{ $seguimiento -> fecha_hasta}}</th>
									<th>{{ $seguimiento -> observaciones}}</th>
									<th> {!! Form::open([ 'route' => ['bpo.proyectos.seguimientos.update', $bpo -> id, $seguimiento -> id, 0], 'method' => 'PUT' ]) !!}
										<button type="submit" class="btn btn-danger" >
											Eliminar
										</button>
										<a href="{{ route('bpo.proyectos.seguimientos.edit', [$bpo -> id, $seguimiento -> id]) }}" class="btn btn-info" >Editar</a>
										{!! Form::close() !!} 
									</th>
								
								</tr>
							@empty
							    <p>No Existen Seguimientos</p>
							@endforelse
						 </tbody>
						</table>
					</div>
					Seguimientos {{ $seguimientos ->total()}}, Total de paginas {{ $seguimientos ->lastPage()}} , Pagina actual {{ $seguimientos ->currentPage()}}
					</p>
					
					{!! $seguimientos->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection