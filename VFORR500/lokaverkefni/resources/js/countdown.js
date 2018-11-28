let countdown;

var startButtons = document.getElementsByClassName("start");
var stopButtons = document.getElementsByClassName("stop");
var pauseButtons = document.getElementsByClassName("pause");
var closeButtons = document.getElementsByClassName("closeButton");
var title_el = document.querySelector("title");
var audio = new Audio('/sounds/alarm.wav');
window.onload = function() {

	Object.keys(startButtons).forEach(function(button){
		startButtons[button].onclick = function(event){

			pauseButtons[button].style.display = "inline-block";
			stopButtons[button].style.display = "inline-block";
			startButtons[button].style.display = "none"
			var timeArray = event.path[2]["parentElement"]["childNodes"][0]["children"][1]["children"][0].innerHTML.split(":", 3);
			hours = parseInt(timeArray[0]);
			minutes = parseInt(timeArray[1]);
			seconds = parseInt(timeArray[2]);
			oldHours = hours;
			oldMinutes = minutes;
			oldSeconds = seconds
			newHours = hours;
			hoursToMinutes = newHours*60;
			var newMinutes = minutes + hoursToMinutes;
			minutesToSeconds = newMinutes*60;
			var newSeconds = seconds + minutesToSeconds;
			const now = Date.now();
			const then = now + newSeconds*1000;

			countdown = setInterval(function() {
				var secondsLeft = Math.round((then - Date.now()) / 1000);
				if(secondsLeft < 1) {
					pauseButtons[button].style.display = "none";
					clearInterval(countdown);
					audio.play();
					audio.loop = true;
				}
				let displayHours = Math.floor(secondsLeft / 3600);
				secondsLeft %= 3600;
				let displayMinutes = Math.floor(secondsLeft / 60);
				let displaySeconds = secondsLeft % 60;
				displayHours = String(displayHours).padStart(2,"0");
				displayMinutes = String(displayMinutes).padStart(2,"0");
				displaySeconds = String(displaySeconds).padStart(2,"0");
				title_el.innerHTML = displayHours + ":" + displayMinutes + ":" + displaySeconds;
				event.path[2].getElementsByTagName("h2")[0].innerHTML = displayHours + ":" + displayMinutes + ":" + displaySeconds;
			},1000)
		}
	});

	Object.keys(closeButtons).forEach(function(button) {

		closeButtons[button].onclick = function(event) {
			clearInterval(countdown);
			audio.pause();
			pauseButtons[button].style.display = "none";
			stopButtons[button].style.display = "none";
			startButtons[button].style.display = "inline-block"
			hours = String(hours).padStart(2,"0");
			minutes = String(minutes).padStart(2,"0");
			seconds = String(seconds).padStart(2,"0");
			oldHours = String(oldHours).padStart(2,"0");
			oldMinutes = String(oldMinutes).padStart(2,"0");
			oldSeconds = String(oldSeconds).padStart(2,"0");
			title_el.innerHTML = "Timer";
			event.path[2].getElementsByTagName("h2")[0].innerHTML = event.path[2].getElementsByTagName("h2")[0].className;
		}
	})

	Object.keys(stopButtons).forEach(function(button) {

		stopButtons[button].onclick = function(event) {
			clearInterval(countdown);
			audio.pause()
			pauseButtons[button].style.display = "none";
			stopButtons[button].style.display = "none";
			startButtons[button].style.display = "inline-block"
			hours = String(hours).padStart(2,"0");
			minutes = String(minutes).padStart(2,"0");
			seconds = String(seconds).padStart(2,"0");
			oldHours = String(oldHours).padStart(2,"0");
			oldMinutes = String(oldMinutes).padStart(2,"0");
			oldSeconds = String(oldSeconds).padStart(2,"0");
			title_el.innerHTML = "Timer";
			event.path[2].getElementsByTagName("h2")[0].innerHTML = event.path[2].getElementsByTagName("h2")[0].className;
		}
	})

	Object.keys(pauseButtons).forEach(function(button) {
		pauseButtons[button].onclick = function(event) {
			startButtons[button].style.display = "inline-block";
			pauseButtons[button].style.display = "none";
			clearInterval(countdown);
		}
	})
};
