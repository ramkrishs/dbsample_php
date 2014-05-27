<?php

// Inialize session
session_start();

// Include database connection settings
include('dbc.php');

$user=$_POST['user'];
$pass=$_POST['pass'];

//connection string
$dbc = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

//SELECT query

$selectquery= " SELECT * FROM  `login` WHERE `username` = '$user' and `password` = '$pass' ";

$result = mysqli_query($dbc,$selectquery);

$rowcount=mysqli_num_rows($result);

if ($rowcount>0) {
	# code...
	header('Location: user.php');
}
else {

	header('Location: index.php');
}
?>