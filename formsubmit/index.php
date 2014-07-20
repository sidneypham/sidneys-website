<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Welcome to Sidney's Website. It is still under construction.">
	<title>Form Submitted!</title>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<?php 
	$connect = mysqli_connect("localhost", "root", "admin", "users");

	$username = mysqli_real_escape_string($connect, $_POST["username"]);
	$password = mysqli_real_escape_string($connect, $_POST["password"]);
	$password = md5($password);
	$plainpassword = mysqli_real_escape_string($connect, $_POST["password"]);
	$firstname = mysqli_real_escape_string($connect, $_POST["firstname"]);
	$lastname = mysqli_real_escape_string($connect, $_POST["lastname"]);
	$email = mysqli_real_escape_string($connect, $_POST["email"]);
	$message = mysqli_real_escape_string($connect, $_POST["message"]);
		
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_query($connect, "INSERT INTO users (firstname, lastname, email, username, password, message)
	VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$message')");

	mysqli_close($connect);
		?>
	<script>
		var showPassword = function () {
			document.getElementById("showpass").innerHTML = "<?php echo $plainpassword;?>";
		}
	</script>
</head>
<body>
	<div class="wrap">	
		<a href="../">
			<h1 class="logo">Sidney's Website</h1>
		</a>
		<ul class="navbar">
			<li>
				<a href="../">Home</a>
			</li>
			<li>
				<a href="../about">About</a>
			</li>
			<li>
				<a href="../experimental" title="Experimental">Experimental Page</a>
			</li>
			<li>
				<a href="/randomiser" title="Randomiser">List Randomiser</a>
			</li>
			<li>
				<a href="../chat" title="Chat">Chat</a>
			</li>
			<li>
				<a href="../other">Other Stuff</a>
			</li>
		</ul>
		<h1>Confirmation</h1>

		<p>Hello, <?php echo "$firstname "."$lastname";?>!</p>
		<p>Your username is: <?php echo "$username";?>
		<br>
		Your password is: <span id="showpass">Click button to show password</span>
		</p>
		<a onclick="showPassword()" class="button">Show password</a>		

		

		<br>
		<a href="../" class="button">Back to homepage</a>
	
		<footer>
			<p>Sidney's Website</p>
		</footer>	

	</div>
</body>
</html>