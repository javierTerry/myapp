@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-30 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"> Nuevo - Reporte de Auditoria </div>

				<div class="panel-body">
					{!! Form::open([ 'route' => 'auditoria.cmdb.store', 'method' => 'POST' ]) !!}
						@include('auditorias.cmdb.parcial.campos')
						  <button type="submit" class="btn btn-success" >Guardar </button>
						  <a href="{{ route('auditoria.cmdb.index') }}" class="btn btn-danger" >Cancelar</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

