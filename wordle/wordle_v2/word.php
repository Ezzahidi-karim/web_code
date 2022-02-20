<?php 
	require 'config.php';

	$error="";
	$exist=false;
    $sql_count = "SELECT MAX(guess_word_id) as max_word_id
    FROM word;";  
    
	$count_result = mysqli_query($link, $sql_count);  
	$row = mysqli_fetch_row($count_result);  

	$last_id = $row[0];  
    $new_id=$last_id+1;

	$word=strtoupper($_POST['word']);

	$select="SELECT word  FROM word WHERE word=?";
	$stmt = $link->prepare($select);
	$stmt->bind_param("s",$word);
	if($stmt->execute()){
		$stmt->store_result();
		if($stmt->num_rows()==1){
			//$error="1";
			echo json_encode(array('a' => '1')); 
			$exist=true;
            exit();  

		}else{
			$exist=false;
		}

		$stmt->close();
	}

	if($exist===false){

		if (empty($word)){
			echo json_encode(array('b' => '1')); 
            exit();  
            
		}
        else if (strlen($word)!=5){
			echo json_encode(array('f' => '1')); 
            exit();  
            
		}else if (preg_match("/^[a-zA-Z]*$/",$word)) {
            $sql="INSERT INTO possible_word(possible_word_id,possible_word) VALUES (?,?)";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("ss",$new_id,$word);
			if($stmt->execute()){
			echo json_encode(array('c' => '1')); 
            echo "3";
			}
			$stmt->close();

			$sql="INSERT INTO word(word) VALUES (?)";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("s",$word);
			if($stmt->execute()){
			echo json_encode(array('c' => '1')); 
            echo "3";
			}
			$stmt->close();

		}else{
			echo json_encode(array('d' => '1')); 
			exit();

		}
	}else{
		echo "5";
			exit();
		
	}
		$link->close();

	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
  		  $data = htmlspecialchars($data);
  		  return $data;
		}
 ?>