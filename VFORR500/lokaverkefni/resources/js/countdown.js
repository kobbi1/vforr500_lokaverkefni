var startButtons = document.getElementsByClassName("start");
var stopButtons = document.getElementsByClassName("stop");
window.onload = function() {
	console.log(startButtons);
	Object.keys(startButtons).forEach(function(button){

		startButtons[button].onclick = function(event){
			console.log("I did it!!!!")
		}
		console.log(startButtons[button])
	}); 

	console.log("banana")
};

