
"use strict";

function alert_get(action, num){

	let actionFull = '';

	switch(action){
		case "del":
			actionFull = "Delete";
			break;
		case "inc":
			actionFull = "Increase Health";
			break;
		case "dec":
			actionFull = "Decrease Health";
			break;

	}

	alert(actionFull);
	window.location="index.php?action=" + action + "&num="+ num ;
	document.getElementById("status").innerHTML = "Processing...";
}

function reset_data(){
	//alert("Resetting!");
	window.location="index.php?reset=true";
}

function roll_dice(){
	alert("About to fight!");
	window.location="index.php?roll=true";
}