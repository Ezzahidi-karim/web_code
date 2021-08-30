<?php 
	$servername="localhost";
	$username="root";
	$password="";

	$link =new mysqli($servername,$username,$password);
	// check the connection 
	if($link->connect_error){
		die("Connection failed: ". $link->connect_error);
	}
	//Create database 
	$sql="CREATE DATABASE web_code";
	if($link->query($sql) === true){
		echo "Database created successfully";
	}else{
		echo "Error creating database " .$link->error;
	}
 ?>