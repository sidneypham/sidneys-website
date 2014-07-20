var validateForm = function () {
	var error = document.getElementById("error");
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var email = document.getElementById("email").value;
	var message = document.getElementById("message").value;
	var atpos = email.indexOf("@");
	var dotpos = email.indexOf(".");
	var lastdotpos = email.lastIndexOf(".");

	console.log(atpos + " " + dotpos);

	if (username=="" || password=="" || firstname=="" || lastname=="" || email=="") {
		error.innerHTML = "You did not complete the form.";
		return false;
	}	

	if (atpos == -1 || dotpos == -1 || atpos < 1 || lastdotpos < atpos + 2 || lastdotpos + 2 >= email.length) {
	  error.innerHTML = "Invalid email address.";
	  return false;		
	}

	return true;
};