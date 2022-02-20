<?php
require 'config.php';
   
$ip=$_POST['ip'];
$sql = "SELECT * FROM player_stats WHERE player_ip_address='$ip' ";
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
               
                while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="stats_played">Played <br><div>'.$row['player_played'].'</div></div>
                    <div class="stats_played">Win <br><div>'.$row['player_win_prc'].'%</div></div>
                    <div class="stats_played">Score <br> <div>'.$row['player_score'].'</div></div>
                    ';
                }

            }
?>