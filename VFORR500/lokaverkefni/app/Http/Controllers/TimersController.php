<?php

namespace App\Http\Controllers;

use App\Timer;
use App\User;
use Illuminate\Http\Request;

class TimersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Timer $timer)
    {
        $timers = Timer::latest("id")->where("user_id", auth()->id())->get();

        return view("timers\index",compact('timers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("timers/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:20",
            "timer" => "required"
        ]);

        $thread = Timer::create([
            "title" => request("title"),
            "timer" => request("timer"),
            "user_id" => auth()->id()
        ]);
        return redirect("timers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Timer $timer)
    {
        return view("timers/edit",compact("timer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timer $timer)
    {
        $timer->update(request()->all());
        return redirect("timers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timer $timer)
    {
        $timer->delete();
        return redirect("/timers");
    }
}
