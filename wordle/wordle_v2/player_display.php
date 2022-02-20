<?php
   
$new_p_ip=$_POST['ip'];
    $new_p_win =0;
    $new_p_score =0;
    $new_p_played =0;
    $new_p_win_prc =0;
require 'config.php';

    $select="SELECT player_ip_address  FROM player_stats WHERE player_ip_address=?";
    $stmt = $link->prepare($select);
    $stmt->bind_param("s",$new_p_ip);
    if($stmt->execute()){
        $stmt->store_result();
        if($stmt->num_rows()==1){
            $exist="true";
        }else{
            $exist="false";

        }
        $stmt->close();
    }
    
    
    if($exist=="false"){
        do {
            $new_p_name='Player_'.rand(1,100000000);
            $result=$link->query("SELECT player_name FROM player_stats WHERE player_name = '.$new_p_name.'");
            $num_rows = $result->num_rows;

        }
        while ($num_rows > 0);

        $sql = "INSERT INTO player_stats (player_name,player_ip_address, player_played,player_win,player_win_prc,player_score) VALUES (?,?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssiidi", $param_player_name,$param_player_ip_address,$param_player_played,$param_player_win,$param_player_win_prc,$param_player_score);
            // Set parameters
            $param_player_name=$new_p_name;
            $param_player_ip_address=$new_p_ip;
            $param_player_played=$new_p_played;
            $param_player_win=$new_p_win;
            $param_player_win_prc=$new_p_win_prc;
            $param_player_score=$new_p_score;
            // Creates a user_password hash
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

            exit(); 
            } else{
            exit(); 
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //display profile data
$sql = "SELECT * FROM player_stats WHERE player_ip_address='$new_p_ip' ";
			$result=$link->query($sql);
            if ($result-> num_rows>0) {
               
                while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="player_content">
                        <div class="player_name">'.$row["player_name"].'</div>
                        <div class="player_Score">Score : '.$row["player_score"].'</div>
                    </div>';
                }

            }
?>