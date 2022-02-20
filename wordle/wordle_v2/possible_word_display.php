<?php
    require 'config.php';
    
    $sql_count = "SELECT possible_word_id,possible_word
    FROM possible_word;";  
    
	$count_result = mysqli_query($link, $sql_count);  
	$row = mysqli_fetch_row($count_result);  
	//$min_words = $row[0];  
	//$max_words = $row[1];  
    //echo "min :".$min_words."<br>";
    //echo "max :".$max_words."<br>";
    //$word_rand=rand($min_words,$max_words);
	$sql = "SELECT * FROM possible_word ";
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
                echo'<table class="words_table">';
                echo'<tr class="words_head">
                        <th class="word_th">Id</th>
                        <th class="word_th">Possible Words</th>
                    </tr>';

                while ($row = $result->fetch_assoc()) {
                  
                    echo '<tr class="word_tr">
                            <td class="word_td">'.$row["possible_word_id"].'</td>
                            <td class="word_td"> '.$row["possible_word"].'</td>
                        </tr>';

                }
                echo'</table>';
            }
?>