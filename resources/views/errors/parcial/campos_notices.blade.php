@if( isset($notices) && !empty($notices))
	<p>
		<div class="alert alert-warning" role="alert">
			@foreach($notices as $notice)
			<p></p>
			<strong> {{ $notice }} </strong>
			@endforeach
		</div>
	</p>
@endif
