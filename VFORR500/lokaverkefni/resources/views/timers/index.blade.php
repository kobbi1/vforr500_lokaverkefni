@extends("layouts/app")
@section("content")
<h1>Timers</h1>
@foreach($timers as $timer)
	<div class="card mb-4">
		<div class="card-body">
	    	<h5 class="card-title d-flex justify-content-between">
	    		{{ $timer->title }}
	    		{{ $timer->timer}}
	    	</h5>
	    	<p class="card-text">{{ $timer->$timers }}</p>
		</div>
	</div>
    @endforeach
@endsection