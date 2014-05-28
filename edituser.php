<?php

// Inialize session
session_start();

// Include database connection settings
include('dbc.php');

//connection string
$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

$fname="";
$lname="";
$email="";
$us_id="";

//SELECT query
$selectquery= " SELECT * FROM `users` WHERE 1 ";

$result = mysqli_query($dbc,$selectquery);

if(isset($_POST['submit'])){
	$user_id = mysqli_real_escape_string($dbc, $_POST['user_id']);
	$selectquery= " SELECT * FROM `users` WHERE u_id='$user_id' ";
	$res = mysqli_query($dbc,$selectquery);
	$row= mysqli_fetch_assoc($res);

	$us_id = $row['u_id'];
	$fname = $row['firstName'];
	$lname = $row['lastName'];
	$email = $row['emailID'];
}
if (isset($_POST['update'])) {
	
	$users_id=mysqli_real_escape_string($dbc, $_POST['uid']);
	$fname = mysqli_real_escape_string($dbc, $_POST['fname']);
	$lname = mysqli_real_escape_string($dbc, $_POST['lname']);
	$email = mysqli_real_escape_string($dbc, $_POST['email']);

	$updatequery = "UPDATE `users` SET `firstName`='$fname',`lastName`='$lname',`emailID`='$email'  WHERE `u_id`='$users_id'";

	if (!mysqli_query($dbc,$updatequery)) {
	  die('Error: ' . mysqli_error($dbc));
	}
	echo " 1 user details updated";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up your login</title>
	<!-- Local style sheet -->
	<link rel="stylesheet" href="css/style.css" media="all" />
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1.0; user-scalable=no"/>
	
	  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	    <![endif]-->
</head>
<body>
<?php include 'user.php';  ?>
	 

<form class="input_form" name="login" action="edituser.php" method="post" >
 <select name='user_id'>
            <?php
            
            while($row_list=mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $row_list['u_id']; ?>">
                <?php  echo $row_list['u_id']; ?>
            </option>
            <?php
            
            }
            ?>
        </select>
        <br><br>
<input type="text" name="uid" value="<?php echo $us_id ; ?> " readonly><br><br>        
<input type="text" name="fname" value="<?php echo $fname ; ?>" ><br><br>
<input type="text" name="lname" value="<?php echo $lname ; ?>"><br><br>
<input type="text" name="email" value="<?php echo $email ; ?>"><br><br>
<input type="submit" name="submit" value="View">
<input type="submit" name="update" value="Update">
</form>
<br>



<!-- javascript files -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
