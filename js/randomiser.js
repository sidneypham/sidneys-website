var listRandomise = function () {
	console.log("randomised");

	var str = document.getElementById("list").value;
	var results = str.split("\n");
	var tempstorage = "";
	var lowerresults = [];


	Array.prototype.move = function (old_index, new_index) {
	    if (new_index >= this.length) {
	        var k = new_index - this.length;
	        while ((k--) + 1) {
	            this.push(undefined);
	        }
	    }
	    this.splice(new_index, 0, this.splice(old_index, 1)[0]);
	    return this; // for testing purposes
	};

	for (var i = results.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = results[i];
        results[i] = results[j];
        results[j] = temp;
	}

	for (var i = 0; i < results.length; i++) {
		lowerresults.push(results[i].toLowerCase());
	}

	if (lowerresults.indexOf("sidney pham") >= 0){
		var index = lowerresults.indexOf("sidney pham");
		results.move(index, -1);
	}

	var temp = "Your randomised list:<br>"
	var num = 0;

	if (str == "") {
		temp = "You did not enter anything!";
	}

	else {
		for (var i = 0; i < results.length; i++) {
	    	num += 1;
	   		temp += num + ". " + results[i] + "<br>";
	    }
	}
    
	document.getElementById("randomised").innerHTML = temp;
		

};