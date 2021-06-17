@if(Session::has('success'))
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	exito
	@foreach(Session::get('success') as $msj)
		<p></p>
		<strong> {{ $msj }} </strong> <i class="ace-icon fa fa-check green"></i>
	@endforeach
</div>

@endif