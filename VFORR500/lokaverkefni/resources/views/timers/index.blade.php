@extends("layouts/app")
@section("title", "Timer")
@section("content")
<h1 class="text-center">Your Timers</h1>
@foreach($timers as $timer)
	<div class="card mb-4 w-50 mx-auto" style="border:none;">
		<div class="card-body cardCSS">
			<div class="text-left ml-0  d-inline-block editButtonDiv">
				<a href="/timers/{{$timer->id}}/edit">
					<button type="button" class="btn btn-outline-primary text-left">Edit</button>
				</a>
			</div>
			<div class="text-right mr-0 d-inline-block deleteButtonDiv">
				<form method="POST" action="{{ $timer->path() }}">
	    			@csrf
	    			@method("DELETE")
	    			<button class="btn btn-outline-danger text-right">X</button>	
	    		</form>
			</div>
			<div class="text-center">
				<h3 class="card-title">{{ $timer->title }}</h3>
				<h2 class="{{$timer->convertedTime}}">{{ $timer->convertedTime }}</h2>
		    	<div class="btn btn-success start">Start</div>
		    	<div class="btn btn-primary pause">Pause</div>
		    	<div class="btn btn-danger stop">Reset</div>
			</div>
	    	
		</div>
	</div>
    @endforeach
@endsection
