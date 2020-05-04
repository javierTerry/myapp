<br></br>
	<table class="table table-striped table-bordered table-hover" id="dynamic-table">
		<thead>
			<tr>
				<th></th>
				<th>ID</th>
				<th>DESCRIPCION</th>
				<th>CONSULTOR</th>
				<th>FECHA</th>
				<th class="sorting_disabled"></th>
					<th class="sorting_disabled"></th>
			</tr>
		</thead>
		<tbody>
			@foreach( $equipoHisorial as $item)
			<tr>
				<td></td>
				<td>{{ $item -> id}}</td>
				<td>{{ $item -> descripcion}}</td>
				<td>{{ $item -> reporto}}</td>
				<td>{{ $item -> fecha_reporte}}</td>
				<td></td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>

