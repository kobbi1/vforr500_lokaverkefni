@extends("layouts/app")
@section("title", "Timer")
@section("content")
<h1 class="text-center">Your Timers</h1>
@foreach($timers as $timer)
	<div class="card mb-4 w-50 mx-auto">
		<div class="card-body">
			<div style="width:45%" class="text-left ml-0  d-inline-block">
				<a href="/timers/{{$timer->id}}/edit">
					<button type="button" class="btn btn-outline-primary text-left">Edit</button>
				</a>
			</div>
			<div style="width:54%" class="text-right mr-0 d-inline-block ">
				<form method="POST" action="{{ $timer->path() }}">
	    			@csrf
	    			@method("DELETE")
	    			<button class="btn btn-outline-danger text-right">X</button>	
	    		</form>
			</div>
			<div class="text-center">
				<h3 class="card-title">{{ $timer->title }}</h3>
				<h2 id="{{$timer->id}}">{{ $timer->convertedTime }}</h2>
		    	<div class="btn btn-success start">Start</div>
		    	<div class="btn btn-primary pause" style='display:none'>Pause</div>
		    	<div class="btn btn-danger stop" style='display:none'>Reset</div>
			</div>
	    	
		</div>
	</div>
    @endforeach
@endsection
