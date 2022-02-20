<?php
    require 'config.php';
    
    $sql_count = "SELECT guess_word_id,word
    FROM word;";  
    
	$count_result = mysqli_query($link, $sql_count);  
	$row = mysqli_fetch_row($count_result);  
	
	$sql = "SELECT * FROM word ";
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
                echo'<table class="words_table">';
                echo'<tr class="words_head">
                        <th class="word_th">Id</th>
                        <th class="word_th">Words</th>
                       
                    </tr>';

                while ($row = $result->fetch_assoc()) {
                  
                    echo '<tr class="word_tr">
                            <td class="word_td">'.$row["guess_word_id"].'</td>
                            <td class="word_td" id="word_id"  value="'.$row['word'].'"> '.$row["word"].'</td>
                           
                        </tr>';

                }
                echo'</table>';
            }
?>
