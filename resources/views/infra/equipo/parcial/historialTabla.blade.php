<br></br>
	<table class="table table-striped table-bordered table-hover" id="dynamic-table">
		<thead>
			<tr>
				
				<th>ID</th>
				<th>DESCRIPCION</th>
				<th>CONSULTOR</th>
				<th>FECHA</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach( $equipoHisorial as $item)
			<tr>
				
				<td>{{ $item -> id}}</td>
				<td>{{ $item -> descripcion}}</td>
				<td>{{ $item -> reporto}}</td>
				<td>{{ $item -> fecha_reporte}}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>

