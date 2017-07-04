@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">	H O M E - K P I S  - A P L I C A C I O N E S - 
					<a href=" {{ route('kpi.aplicaciones.soa.index') }} " > S O A</a>  - S E G U I M I E N T O
				</div>
				<div class="panel-body">
					@include('errors.parcial.campos_error')
					@include('errors.parcial.campos_notices')
					
				</div>
				Registros {{ $rows ->total()}}, Total de paginas {{ $rows ->lastPage()}} , Pagina actual {{ $rows ->currentPage() }} </p>{!! $rows -> render() !!}
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>CLIENTE</th>
						<th>I P</th>
						<th>F S A R</th>
						<th>F S D R</th>
						<th>ESTATUS</th>
					</tr>
					<tbody>
						@forelse($rows as $row)
							<tr>
								<th>{{ $row -> id}}</th>
								<th>{{ $row -> cliente}}</th>
								<th>{{ $row -> ip}}</th>
								<th>{{ $row -> fsar}}</th>
								<th>{{ $row -> fsdr}}</th>
								<th>{{ $row -> estatus_respaldo}}</th>
							</tr>
						@empty
						    <p>No Existen seguimiento</p>
						@endforelse
					 </tbody>
				</table>
				</p>
				{!! $rows -> render() !!}
				</p>
				Registros {{ $rows ->total()}}, Total de paginas {{ $rows ->lastPage()}} , Pagina actual {{ $rows ->currentPage()}}
			</div>
		</div>
	</div>
</div>


@endsection
