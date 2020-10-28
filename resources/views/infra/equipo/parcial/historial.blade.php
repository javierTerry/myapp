<div class="col-xs-12 label label-lg {{ ( $equipo->alarmado ) ? 'label-danger' : 'label-info' }}  arrowed-in arrowed-right">
	<b>Historial del equipo</b>
</div>
<br></br>


<a href="#" class="btn btn-inverse" data-toggle="modal" data-target="#modal{{ null }}" ><i class="ace-icon glyphicon-plus"> Seguimiento</i></a>

<div class="modal fade" id="modal{{ null }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
  aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-body">
	        	<p class="bigger-50 bolder center grey">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					
					Describe la actividad, alarma o partes en falla.  	
				</p>
	      	</div>
		     <div class="modal-footer">
		     	{!! Form::open([ 'route' => 'infra.equipoHistorial.store', 'method' => 'POST' ]) !!}
					@include('infra.equipo.parcial.historialSeguimiento')
					<button type="submit" class="btn btn-danger" >
						Guardar
					</button>
					 <input type="button"  value="Close" data-dismiss="modal" class="btn btn-info" /> 							
				{!! Form::close() !!}
		    </div> <!-- modal-footer -->
	    </div> <!-- modal-content -->
  	</div> <!-- modal-dialog -->
</div> <!--modal fad -->

