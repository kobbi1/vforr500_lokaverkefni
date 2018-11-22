@extends("layouts/app")

@section("title", "Create")

@section("content")
<div>
<h1 class="text-center">Create New Timer</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form  action="/timers" method="POST" class="w-full max-w-md">
	@csrf
	<div class="flex flex-wrap -mx-3 mb-6">
    	<div class="form-group">
    		<h3 class="text-center">Title</h3>
    		<input class="form-control text-center" id="grid" placeholder="Pizza" type="text"  name="title" value="{{ old("title") }}">
    	</div>
    	<div class="form-group">
    		<h3 class="text-center5">Time</h3>
            <input type="number" class="form-control text-center" placeholder="Minutes" min="1"  id="grid" name="timer" value="{{ old("timer") }}">
    	</div>
    	<div class="w-full md:w-1/2 px-3">
    		<button class="btn btn-primary form-control" id="grid" type="submit">Submit</button>
    	</div>
	</div>
</form>
</div>
@endsection