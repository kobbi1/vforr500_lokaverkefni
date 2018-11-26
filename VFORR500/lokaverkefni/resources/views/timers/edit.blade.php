@extends("layouts/app")

@section("title", "Create")

@section("content")
<div>
<h1 class="text-center">Edit Timer</h1>
<form  action="{{ $timer->path() }}" method="POST" class="w-full max-w-md">
	@csrf
    @method("patch")
	<div class="flex flex-wrap -mx-3 mb-6 customCard">
    	<div class="form-group">
    		<h3 class="text-center">Title</h3>
    		<input class="form-control" id="grid" placeholder="Pizza" type="text"  name="title" value="{{$timer->title}}">
    	</div>
    	<div class="form-group">
    		<h3 class="text-center">Time</h3>
            <input type="number" class="form-control" placeholder="Minutes" min="1"  id="grid" name="timer" value="{{$timer->timer}}">
    	</div>
    	<div class="w-full md:w-1/2 px-3">
    		<button class="btn btn-primary form-control" id="grid" type="submit">Submit</button>
    	</div>
	</div>
</form>
</div>
@endsection