<?php
    require 'config.php';
    
    $sql_count = "SELECT MIN(guess_word_id) as min_word_id,MAX(guess_word_id) as max_word_id
    FROM word;";  
    
	$count_result = mysqli_query($link, $sql_count);  
	$row = mysqli_fetch_row($count_result);  
	$min_words = $row[0];  
	$max_words = $row[1];  
    $word_rand=rand($min_words,$max_words);
	$sql = "SELECT *
			FROM word 
			WHERE guess_word_id=".$word_rand;
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
                while ($row = $result->fetch_assoc()) {
                  
                    echo $row['word'];

                }
            }
?>