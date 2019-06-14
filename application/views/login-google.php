<!DOCTYPE html>
<html>
<head>
	<title>Google SignIn</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<meta name="google-signin-client_id" content="112728719919-r0midtfcii8sm38rggoq1l4f1k1bhup6.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="script_googleLogin.js"></script>

	<style>
		
		.g-signin2{
			margin-left: 500px;
			margin-top: 200px;
		}

		.data{
			display: none; 
		}

	</style>

</head>
<body>
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
	<div class="data">
		<p>Profile Details</p>
		<img id="pic" class="img-circle" width="100" height="100"/>
		<p>Email Address</p>
		<p id="email" class="alert alert-danger"></p>
		<button onclick="signOut()" class="btn btn-danger">SignOut</button>
	</div>
</body>
</html>