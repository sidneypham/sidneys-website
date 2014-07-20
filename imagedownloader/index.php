<?php 

set_time_limit(0);
ini_set('default_socket_timeout', 100);
session_start();

/*------------ Instagram API Keys ----------------*/

define("clientID", "993fd6e65fd3415abf9a0f6adb57d93f");
define("clientSecret", "adfb744b6ea344478f70c974f113a24b");
define("redirectURI", "http://211.28.231.185:8080/imagedownloader");
define("imageDirectory", "pics/");

//Connect with Instagram
function connectToInstagram($url) {
	$ch = curl_init();

	curl_setopt_array($ch, array(
		CURLOPT_URL				=> $url,
		CURLOPT_RETURNTRANSFER	=> true,
		CURLOPT_SSL_VERIFYPEER	=> false,
		CURLOPT_SSL_VERIFYHOST	=> 2
	));

	$result = curl_exec($ch);
	curl_close($ch);

	echo $result;
	return $result;

}

//Get Instagram userID
function getUserID($userName) {
	$url = "https://api.instagram.com/v1/users/search?q=".$userName."&client_id=".clientID;
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	//return $results['data'][0]['id'];
	return $results['data'][0]['id'];
}

//Print out images on the screen
function printImages($userID) {
	$url = "https://api.instagram.com/v1/users/".$userID."/media/recent?client_id=".clientID."&count=5";
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	echo $results['data'];
	//Parse through results
	foreach($results['data'] as $items){
		$image_url = $items['images']['low_resolution']['url'];
		echo '<img src=" ' . $image_url . ' " /> <br/>';
	}
}

if ($_GET["code"]) {
	$code = $_GET['code'];
	$url = "https://api.instagram.com/oauth/access_token";
	$access_token_settings = array (
		'client_id'		=>	clientID,
		'client_secret'	=>	clientSecret,
		'grant_type'	=> 	"authorization_code",
		'redirect_uri'	=>	redirectURI,
		'code'			=>	$code
	);
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$result = curl_exec($curl);
	curl_close($curl);

	$results = json_decode($result, true);
	$userName = $results['user']['username'];
	$userID = getUserID($userName);
	printImages($userID);

}

else { ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Welcome to Sidney's Website. It is still under construction.">
	<title>Instagram Downloader</title>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>	
	<a href="../">
		<h1 class="logo">Sidney's Website</h1>
	</a>
	<ul class="navbar">
		<li>
			<a href="../" title="Home">Home</a>
		</li>
		<li>
			<a href="../about" title="About">About</a>
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
			<a href="../other" title="Other">Other Stuff</a>
		</li>
	</ul>
	
	<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI ?>&response_type=code" class="button">Login</a>

	<footer>
		<p>Sidney's Website</p>
	</footer>	
		
	
</body>
</html>

<?php 
}
?>