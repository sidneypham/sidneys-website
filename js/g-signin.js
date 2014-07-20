(function() {
    	var po = document.createElement('script'); 
    	po.type = 'text/javascript'; 
    	po.async = true;
        po.src = 'https://apis.google.com/js/client:plusone.js';
        var s = document.getElementsByTagName('script')[0]; 
        s.parentNode.insertBefore(po, s);
    })();
	
	$(document).ready(function(){
		function signinCallback(authResult) {
		if (authResult['access_token']) {
		    // Successfully authorized
		    document.getElementById('signinButton').setAttribute('style', 'display: none');
		    document.getElementById('signoutButtonList').style.display = "block";
		    
		    
		    console.log("should be inline-block now");
		    document.getElementById('signoutButtonList').setAttribute('style', 'float: right');

		    gapi.client.load("plus", "v1", function() {
		    	gapi.client.plus.people.get({
		    		"userId": "me"
		    	}).execute(function (result) {
		    		document.getElementById("profile").innerHTML = JSON.stringify(result, null, 2);
		    		document.getElementById("userprofile").innerHTML = '<p><a href="#"><img src=\"' + result.image.url.slice(0, -2) + "80" + '\" style="display:table;margin:auto;float:right;border-radius:50%"></a></p>' + '<p style="clear:both;">Hello, ' + result.displayName + '!</p>';
		    	});

		    	var request = gapi.client.plus.people.list({
			        'userId': 'me',
			        'collection': 'visible'
			      });
			      request.execute(function(people) {
			        for (var personIndex in people.items) {
			          person = people.items[personIndex];
			          $('#visiblePeople').append('<img src="' + person.image.url + '">');
			        }
			    });

		    });

		}

		else if (authResult['error']) {
		    // There was an error.
		    // Possible error codes:
		    //   "access_denied" - User denied access to your app
		    //   "immediate_failed" - Could not automatially log in the user
		    console.log('There was an error: ' + authResult['error']);
		}
	}

	function signOut () {
		gapi.auth.signOut();
		document.getElementById('signoutButtonList').setAttribute('style', 'display: none');
		document.getElementById('signinButton').setAttribute('style', 'display: initial');
		document.getElementById('signinButton').setAttribute('style', 'float: right');
	}

	function disconnectUser(access_token) {
		var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + access_token;

	    // Perform an asynchronous GET request. 
	    $.ajax({
		    type: 'GET',
		    url: revokeUrl,
		    async: false,
		    contentType: "application/json",
		    dataType: 'jsonp',
		    success: function(nullResponse) {
		      // Do something now that user is disconnected
		      // The response is always undefined.
		    },
		    error: function(e) {
		      // Handle the error
		      // console.log(e);
		      // You could point users to manually disconnect if unsuccessful
		      // https://plus.google.com/apps
	    	}
	 	});
	}
	// Could trigger the disconnect on a button click
	$('#revokeButton').click(disconnectUser);
	})   
    