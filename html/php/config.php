<?php
	$dbhostname = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "uor";
	//connection to the database
	$dbhandle = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname) or die("Unable to connect to MySQL");	
?>