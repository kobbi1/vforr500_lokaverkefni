@extends("layouts/app")
@section("content")
<h1 class="text-center">Your Timers</h1>
@foreach($timers as $timer)
	<div class="card mb-4 w-50 mx-auto">
		<div class="card-body">
			<div style="width:45%" class="text-left ml-0  d-inline-block">
				<button class="btn btn-outline-primary text-left">Edit</button>
			</div>
			<div style="width:54%" class="text-right mr-0 d-inline-block ">
				<button class="btn btn-outline-danger text-right">X</button>
			</div>
			<div class="text-center">
				<h3 class="card-title">{{ $timer->title }}</h3>
				<h2>{{ $timer->convertedTime }}</h2>
		    	<button class="btn btn-success">Start</button>
		    	<button class="btn btn-danger">Stop</button>
			</div>
	    	
		</div>
	</div>
    @endforeach
@endsection