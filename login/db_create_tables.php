<?php 
	require 'config.php';

	$sql='CREATE TABLE User(
	id_user INT AUTO_INCREMENT PRIMARY KEY,
	img_user VARCHAR(255),
	username VARCHAR(255),
	email VARCHAR(255),
	password VARCHAR(255)
	)';
	if($link->query($sql) === true){
		echo "Table user created successfully!";
	}else{
		echo "Error";

	}
 ?>