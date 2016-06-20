@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Areas</div>

				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					{!! Form::model(Request::only(['desc','clave']), [ 'route' => ['admin.areas.index'], 'method' => 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search' ]) !!}				
						<div class="form-group">
							{!! Form::text( 'desc', null, ['class' => 'form-control', 'placeholder' => 'Descripcion' ]) !!}
							{!! Form::text( 'clave', null, ['class' => 'form-control', 'placeholder' => 'Clave' ]) !!}
						</div>
						<button type="submit" class="btn btn-default">
							Buscar
						</button>
					
					{!! Form::close() !!}
					<p>
						<a class="btn btn-success" href=" {{ route('admin.areas.create') }} " role="button">
							Nueva Area
						</a>
					</p>
										
					Areas registrados {{ $areas ->total()}}, Total de paginas {{ $areas ->lastPage()}} , Pagina actual {{ $areas ->currentPage()}}  
					{!! $areas->appends(Request::only(['desc','clave']))->render() !!} 
					</p>
					<table class="table table-striped"> 
						<tr>
							<th>Clave del Area</th>
							<th>Descripción del Area</th>
							<th>Acciones</th>
						</tr>
						@foreach($areas as $area)
						<tr>
							<th>{{ $area -> clave_area}}</th>
							<th>{{ $area -> desc_area}}</th>
							
							<th>
								{!! Form::open([ 'route' => ['admin.areas.destroy', $area], 'method' => 'DELETE' ]) !!}					  
									<button type="submit" class="btn btn-danger" >Eliminar </button> 
									<a href="{{ route('admin.areas.edit', $area->id) }}" class="btn btn-info" >Editar</a>
								{!! Form::close() !!}
								
								
							</th>
						</tr>
						@endforeach
					</table>
					{!! $areas->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
