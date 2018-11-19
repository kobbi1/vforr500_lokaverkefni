<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
	protected $fillable = ["title", "timer","user_id"];

	public function user() {
		return $this->belongsTo("App\User","user_id");
	}
    public function path() {
    	return "/timers/{$this->id}"; 
    }
}
