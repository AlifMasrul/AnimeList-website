<!DOCTYPE html>
<html>
<head>
	<title>DZANIMELIST Logout</title>
	<link rel="icon" type="image/x-icon" href="icon.png">
	<style>
		body {
			background-color: #1D2023;
			color: #CCD0D8;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			padding: 20px;
			text-align: center;
		}

		a {
			color: #84A4FC;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		a:hover {
			color: #1463F3;
		}

		h2 {
			color: #84A4FC;
			font-size: 28px;
			font-weight: bold;
			margin-bottom: 20px;
			text-transform: uppercase;
		}

		p {
			margin-bottom: 10px;
		}

		.success {
			color: green;
			font-weight: bold;
		}

		.error {
			color: red;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php 
	session_start(); 
	if (isset($_SESSION["UserID"])) 
	{ 
	 session_unset(); 
	 session_destroy(); 

	 echo "<br><p class='success'>You have successfully logged out.</p>"; 
	 echo "<br>Click<a href='Login_Page.html'> here</a> to LOGIN again."; 
	 echo "<br>Click<a href='Register.html'> here</a> to Register your account"; 
	 echo "<br>Click<a href='HomePage.html'> here</a> to go to HomePage";

	} else { 
	 echo "<p class='error'>No session exists or session is expired. Please log in again.</p>"; 
	 echo "<br>Click<a href='Login_Page.html'> here</a> to LOGIN again."; 
	 echo "<br>Click<a href='Register.html'> here</a> to REGISTER your account";
	 echo "<br>Click<a href='HomePage.html'> here</a> to go to HomePage";
	} 
	?>
</body>
</html>
