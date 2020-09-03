<div class="form-group">
	{!! Form::label('name', 'NOMBRE') !!}
	{!! Form::text('name', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Nombre RACK'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('ur', 'UNIDADES DE RACK') !!}
	{!! Form::text('ur', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Cantidad de unidad que tiene el rack'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('coordenada', 'COORDENADAS') !!}
	{!! Form::text('coordenada', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Coordenadas del rack'])
	!!}
</div>
<div class="form-group">
    Fase 
    
    <select class="form-control" name="id_fase">
    	<option value="" > Selecciona </option>
        @foreach($fase as $item)

   	        <option value="{{ $item->id }}" {{ ( $rack->id_fase == $item->id) ? 'selected' : '' }} > {{ $item->name }} </option> 

        @endforeach

    </select>
</div>

<div class="form-group">
	{!! Form::label('', 'Cantidad de equipos') !!}
	{!! Form::text('', null,
	['class' 		=> 'form-control'
	,'placeholder'	=> 'Cantidad de equipos en el rack'])
	!!}
</div>
<div class="form-group" id="chart_wrap">
	<div id="piechart" style="width: 100%; height: 500px;"		>
		 <script >
			#chart_wrap {
			    position: relative;
			    padding-bottom: 100%;
			    height: 0;
			    overflow:hidden;
			}

			#piechart {
			    position: relative;
			    top: 0;
			    left: 0;
			    width:100%;
			    height:100%;
			};

		</script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);

			function drawChart() {
			  var data = google.visualization.arrayToDataTable([
			    ['Task', 'Hours per Day'],
			    ['Work',     11],
			    ['Eat',      2],
			    ['Commute',  2],
			    ['Watch TV', 2],
			    ['Sleep',    7]
			  ]);

			  var options = {
			    title: 'UNIDADES DE RACK'
			  };

			  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			  chart.draw(data, options);
			}

			$(window).on("throttledresize", function (event) {
			    var options = {
			        width: '100%',
			        height: '100%'
			    };

			    var data = google.visualization.arrayToDataTable([]);
			    drawChart(data, options);
			});
	    </script>
	</div>
</div>