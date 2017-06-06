@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">	FINANZAS - CARTERA </div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					@include('utils.upload')
					
				</div>
				
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>FECHA</th>
						<th>OPCIONES</th>
					</tr>
					<tbody>
							@forelse($carteras as $value)
								<tr>
									<th>{{ $value -> cartera_periodo}}</th>
									<th>{{ $value -> created_at}}</th>
									
									<th> {!! Form::open([ 'route' => ['bpo.proyectos.destroy', $value], 'method' => 'DELETE' ]) !!}
										<button type="submit" class="btn btn-danger" >
											Eliminar
										</button>
										<a href="{{ route('bpo.proyectos.edit', $value -> id) }}" class="btn btn-info" >Editar</a>
										<a href="{{ route('bpo.proyectos.seguimientos', $value -> id) }}" class="btn btn-primary" >Seguimiento</a> 
										{!! Form::close() !!} 
									</th>
								
								</tr>
							@empty
							    <p>No hay carteras cargadas</p>
							@endforelse
						 </tbody>
				</table>
				</p>
				
				
			</div>
		</div>
	</div>
</div>


@endsection
