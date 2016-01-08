@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Inicio
				</div>

				<div class="panel-body" align="center">
					
					<!-- @if( Auth::user()->clave_area === "100" ) -->
					<table aling="center">
						<tr>
							@if( Auth::user()->clave_rol === "1000" )
								<td>Empleado </td>
								<td>Catalogo de Roles</td>
								<td>Catalogo de Areas</td>
							@endif

						</tr>
						<tr>

							@if( Auth::user()->clave_rol === "1000" )
								<td><a href= "{{ url('/admin/users') }}" >{!! Html::image('img/user.png', 'a picture'
									, array('class' => 'img-circle', 'width'=>'140px', 'title' => 'Empleado')) !!}</td>
								<td><a href= "{{ route('admin.roles.index') }}" >{!! Html::image('img/rol.png', 'Catalogo de Roles', array('class' => 'img-circle')) !!}}</a></td>
								<td><a href= "{{ route('admin.areas.index') }}" >{!! Html::image('img/area.png', 'Catalogo de Areas', array('class' => 'img-circle', 'width'=>'150px')) !!} </a></td>
							@endif
							
							@if( Auth::user()->clave_area === "100" )
								<td><a href= "{{ route('fnz.proy.index') }}" >{!! Html::image('img/mnu_fiananzas.jpg', 'Finanzas', array('class' => 'img-circle','width'=>'250px')) !!}</a></td>	
							@endif
							
							@if( Auth::user()->clave_rol === "1002" )
								<td><a href= "{{ route('bpo.proyectos.index') }}" >{!! Html::image('img/mnu_bpo-1.png', 'Finanzas', array('class' => 'img-circle','width'=>'250px')) !!}</a></td>	
							@endif
						</tr>
						@if( Auth::user()->clave_rol === "1000" )
						<tr>
							<td><p></p></td>
						</tr>
						<tr>
							<td>Catalogo de puestos</td>
							<td>Catalogo de estatus</td>

						</tr>
						<tr>
							<td><a href= "{{ route('admin.puestos.index') }}" >{!! Html::image('img/puesto.png', 'Catalogo de Puesto', array('class' => 'img-circle', 'width'=>'150px')) !!} </a></td>
							<td><a href= "{{ route('admin.estatus.index') }}" >{!! Html::image('img/activoInactivo.png', 'Catalogo de estatus', array('class' => 'img-circle', 'width'=>'150px')) !!} </a></td>
						</tr>
						@endif
					</table>
				</div>
			<!-- @endif -->
				@if( Auth::user()->clave_area != "100" )
				<div class="alert alert-danger" role="alert">
					<p>
						<h1>Area Restringida</h1>
						
					</p>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
