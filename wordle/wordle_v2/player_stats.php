<?php
    require "config.php";

    $new_p_ip =$_POST['player_ip_address'];
    $new_p_win =$_POST['win'];
    $new_p_score =$_POST['score'];
    $new_p_played =1;
    $new_p_win_prc =(100*$new_p_win)/$new_p_played;
    $new_p_win_prc = substr($new_p_win_prc, 0, 5);


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

            if($exist=="true"){
                
                $sql_count = "SELECT *  FROM player_stats WHERE player_ip_address='$new_p_ip';";  
                
                $count_result = mysqli_query($link, $sql_count);  
                $row = mysqli_fetch_row($count_result);  

                $old_p_ip = $row[2];  
                $old_p_played = $row[3];  
                $old_p_win = $row[4];  
                $old_p_win_prc = $row[5];  
                $old_p_score = $row[6];  

                $new_p_played =$old_p_played+1;
                $new_p_win =$old_p_win+$new_p_win;
                $new_p_win_prc = (100*$new_p_win)/$new_p_played;
                $new_p_win_prc = substr($new_p_win_prc, 0, 5);

                $new_p_score =$old_p_score+$new_p_score;
                //create random name
                $sql = "UPDATE player_stats 
                SET player_played = '$new_p_played' , player_win = '$new_p_win' , player_win_prc = '$new_p_win_prc' , player_score = '$new_p_score'
                WHERE player_ip_address = '$new_p_ip';";
                if ($link->query($sql) === TRUE) {
                        echo json_encode(array('a' => '1'));  
                } else {
                    echo json_encode(array('b' => '1'));  

                }
                
            }

            
       

        
  

?>