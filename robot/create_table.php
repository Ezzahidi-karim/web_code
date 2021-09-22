<?php 
	
	require 'config.php';
	

	$sql="CREATE TABLE user (
	id_text INT AUTO_INCREMENT PRIMARY KEY,
	answer array()
	)";
	// execute query
	if ($link->query($sql)===true) {
		echo "Table User created successfully!<br>";
	}else{
		echo "Error creating table User!<br>";

	}



	$link->close();

 ?>