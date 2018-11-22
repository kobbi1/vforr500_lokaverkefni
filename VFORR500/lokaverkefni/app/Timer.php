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

    public function getConvertedTimeAttribute()
    { 
  		return $this->getHours() . ":" . $this->getMinutes() . ":" . $this->getSeconds();
    }

    public function getHours() {
    	$hours = ($this->timer-($this->timer%60))/60;
    	if($hours < 10) {
    		$hours = "0" . $hours;
    	}
    	return $hours;
    }
    public function getMinutes() {
    	$minutes = $this->timer%60;
    	if($minutes < 10) {
    		$minutes = "0" . $minutes;
    	}
    	return $minutes;
    }
    public function getSeconds() {
    	return "00";
    }
}
