@if(Session::has('notices'))
<p>
	<div class="alert alert-warning" role="alert">
		@foreach(Session::get('notices') as $notice)
		<p></p>
		<strong> {{ $notice }} </strong>
		@endforeach
	</div>
</p>

@endif