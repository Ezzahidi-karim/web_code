<?php
    require 'config.php';
    
    $sql_count = "SELECT player_id
    FROM player;";  
	$count_result = mysqli_query($link, $sql_count);  
	$row = mysqli_fetch_row($count_result);  

	$sql = "SELECT * FROM player ";
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
                echo'<table class="words_table">';
                echo'<tr class="words_head">
                        <th class="word_th">id</th>
                        <th class="word_th">word</th>
                        <th class="word_th">ip Address</th>
                        <th class="word_th">try</th>
                        <th class="word_th">win</th>
                        <th class="word_th">Score</th>
                        <th class="word_th">Time</th>
                    </tr>';

                while ($row = $result->fetch_assoc()) {
                  
                    echo '<tr class="word_tr">
                            <td class="word_td">'.$row["player_id"].'</td>
                            <td class="word_td"> '.$row["word_id"].'</td>
                            <td class="word_td"> '.$row["player_ip_address"].'</td>
                            <td class="word_td"> '.$row["player_try"].'</td>
                            <td class="word_td"> '.$row["player_win"].'</td>
                            <td class="word_td"> '.$row["player_score"].'</td>
                            <td class="word_td"> '.$row["player_time"].'</td>
                        </tr>';

                }
                echo'</table>';
            }
?>