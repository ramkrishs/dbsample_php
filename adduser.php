<?php

// Inialize session
session_start();

// Include database connection settings
include('dbc.php');

//connection string
$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(isset($_POST['fname']))
{


$fname = mysqli_real_escape_string($dbc, $_POST['fname']);
$lname = mysqli_real_escape_string($dbc, $_POST['lname']);
$email = mysqli_real_escape_string($dbc, $_POST['emailid']);

//INSERT query

	$insertquery= "INSERT INTO users (firstName, lastName, emailID) VALUES ('$fname', '$lname','$email')";

	if (!mysqli_query($dbc,$insertquery)) {
	  die('Error: ' . mysqli_error($dbc));
	}
	echo " 1 user details added";
}

mysqli_close($dbc);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Add User</title>
	<!-- Local style sheet -->
	<link rel="stylesheet" href="css/style.css" media="all" />
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1.0; user-scalable=no"/>
	
	  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	    <![endif]-->
</head>
<body>
<?php include 'user.php'; ?>

<form class="input_form" action="adduser.php" method="post" >
<input type="text" name="fname" placeholder="First Name">
<input type="text" name="lname" placeholder="Last Name">
<input type="text" name="emailid" placeholder="Email id">
<input type="submit" value="login" >
</form>
<br>



<!-- javascript files -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>