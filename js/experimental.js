var calculate = function () {
		console.log("calculated");
		var num = parseFloat(document.calculator.number.value);
		document.calculator.number.value = num * 10;
		document.getElementById("number").focus();
	}

	var enterPressCalculate = function () {
		if (event.keyCode == 13) {
			calculate();
		}
	}
	
	var pauseMusic = function () {
		document.getElementById("audio").pause(); 
	}

	var playMusic = function () {
		document.getElementById("audio").play(); 
	}

	var stopMusic = function () {
		document.getElementById("audio").pause();
		document.getElementById("audio").currentTime = 0; 
	}