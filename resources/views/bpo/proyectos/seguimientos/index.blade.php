@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
					B P O - P R O Y E C T O S - S E G U I M I E N T O S - A G R E G A R
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
					@include('errors.parcial.campos_error')
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
					{!! Form::open([ 'route' => 'bpo.proyectos.seguimientos.store', 'method' => 'POST', 'class' => 'form-horizontal' ])!!}
						@include('bpo.proyectos.seguimientos.parcial.campos')
						  <button type="submit" class="btn btn-info" >Guardar </button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection