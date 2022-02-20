<?php
    require 'config.php';
    
    $sql_count = "SELECT player_id
    FROM player_stats;";  
	$count_result = mysqli_query($link, $sql_count);  
	$row = mysqli_fetch_row($count_result);  

	$sql = "SELECT * FROM player_stats ";
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
                echo'<table class="words_table">';
                echo'<tr class="words_head">
                        <th class="word_th">id</th>
                        <th class="word_th">Name</th>
                        <th class="word_th">IP Address</th>
                        <th class="word_th">Played</th>
                        <th class="word_th">Win</th>
                        <th class="word_th">Win Pourcentage</th>
                        <th class="word_th">Score</th>
                        <th class="word_th">Time</th>
                    </tr>';

                while ($row = $result->fetch_assoc()) {
                  
                    echo '<tr class="word_tr">
                            <td class="word_td">'.$row["player_id"].'</td>
                            <td class="word_td"> '.$row["player_name"].'</td>
                            <td class="word_td"> '.$row["player_ip_address"].'</td>
                            <td class="word_td"> '.$row["player_played"].'</td>
                            <td class="word_td"> '.$row["player_win"].'</td>
                            <td class="word_td"> '.$row["player_win_prc"].' %</td>
                            <td class="word_td"> '.$row["player_score"].'</td>
                            <td class="word_td"> '.$row["player_time"].'</td>
                        </tr>';

                }
                echo'</table>';
            }
?>