<?php 
	require 'config.php';

	$error="";
	$exist=false;
	$word=$_POST['word'];

	$select="SELECT possible_word  FROM possible_word  WHERE possible_word=?";
	$stmt = $link->prepare($select);
	$stmt->bind_param("s",$word);
	if($stmt->execute()){
		$stmt->store_result();
		if($stmt->num_rows()==1){
			echo json_encode(array('a' => '1')); 
			$exist=true;

		}else{
			echo json_encode(array('b' => '1')); 
			
			$exist=false;
		}

		$stmt->close();
	}
