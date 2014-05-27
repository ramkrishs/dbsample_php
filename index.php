<?php

// Inialize session
session_start();



?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Login page</title>
	<!-- Local style sheet -->
	<link rel="stylesheet" href="css/style.css" media="all" />
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1.0; user-scalable=no"/>
	
	  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	    <![endif]-->
</head>
<body>

<form class="input_form" name="login" action="login.php" method="post" >
<input type="text" name="user" placeholder="User Name">
<input type="password" name="pass" placeholder="Password">
<input type="submit" value="login" >
</form>
<br>
<a href="register.php">Click here to Sign up</a>


<!-- javascript files -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
