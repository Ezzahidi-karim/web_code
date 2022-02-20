<?php
    require 'config.php';
    $pw=$_POST['password'];
    $pws=password_hash($pw, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET user_password = '$pws' WHERE users.user_id = 1;";
    if ($link->query($sql) === TRUE) {
            echo json_encode(array('a' => '1'));  
    } else {
    echo json_encode(array('b' => '1'));  

    }

?>