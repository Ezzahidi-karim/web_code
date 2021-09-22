<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$link = new mysqli($servername, $username, $password);
	// Check connection
	if ($link->connect_error) {
  		die("Connection failed: " . $link->connect_error);
	}

	// Create database
	$sql = "CREATE DATABASE robot";
	if ($link->query($sql) === TRUE) {
	  echo "Database created successfully";
	} else {
 	 echo "Error creating database: " . $link->error;
	}
 ?>