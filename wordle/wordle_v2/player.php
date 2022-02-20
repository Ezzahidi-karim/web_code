<?php 
    require_once "config.php";

    $player_ip_address=test_input($_POST['player_ip_address']);
    $word_id=test_input($_POST['word_id']);
    $player_try=test_input($_POST['player_try']);
    $player_win=test_input($_POST['player_win']);
    $player_score=test_input($_POST['player_score']);
    
    if($word_id!=''){
        $sql = "INSERT INTO player (player_ip_address,word_id, player_try,player_win,player_score) VALUES (?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_player_ip_address,$param_word_id,$param_player_try,$param_player_win,$param_player_score);
            // Set parameters
            $param_player_ip_address=$player_ip_address;
            $param_word_id=$word_id;
            $param_player_try=$player_try;
            $param_player_win=$player_win;
            $param_player_score=$player_score;
             // Creates a user_password hash
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              echo "success";
              echo json_encode(array('c' => '1')); 
              exit(); 
            } else{
                echo "You didn't signed up";
                echo json_encode(array('d' => '1')); 
              exit(); 
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
        echo"nothing";

    }

   
     function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

     
?>