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
		    	<div class="btn btn-success" data-toggle="modal" data-target="#timer{{$timer->id}}">Open</div>
			</div>
			<div class="modal fade bd-example-modal-lg" id="timer{{$timer->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
			    		<h3 class="card-title" >{{ $timer->title }}</h3>
			    	</div>
			      	<div class="modal-body">
			      		<h2 id="{{$timer->id}}" class="{{$timer->convertedTime}}">{{ $timer->convertedTime }}</h2>
			      	</div>
			      	<div class="text-center buttons">
				      	<div class="btn btn-success start">Start</div>
				      	<div class="btn btn-primary pause">Pause</div>
			    		<div class="btn btn-danger stop">Reset</div>
			      	</div>
			      	<div class="modal-footer">
			      		<span class="button btn-secondary closeButton" data-dismiss="modal" aria-label="Close">Close</span>
			      	</div>
			    </div>
			  </div>
			</div>
	    	
		</div>
	</div>
    @endforeach

	
@endsection
