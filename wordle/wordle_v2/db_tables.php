<?php 
	
	require 'config.php';
	

	$sql="CREATE TABLE word (
	guess_word_id INT AUTO_INCREMENT PRIMARY KEY,
	word VARCHAR(255)
	)";
	// execute query
	if ($link->query($sql)===true) {
		echo "Table word created successfully!<br>";
	}else{
		echo "Error creating table word!<br>";

	}

    $sql="CREATE TABLE possible_word (
        possible_word_id INT PRIMARY KEY,
        possible_word VARCHAR(255)
        )";
        // execute query
        if ($link->query($sql)===true) {
            echo "Table possible_word created successfully!<br>";
        }else{
            echo "Error creating table possible_word!<br>";
    
        }

    $sql="CREATE TABLE users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(255),
            user_img VARCHAR(255),
            user_email VARCHAR(255),
            user_password VARCHAR(255),
            user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            user_function VARCHAR(255)
            )";
            // execute query
            if ($link->query($sql)===true) {
                echo "Table Users created successfully!<br>";
            }else{
                echo "Error creating table Users!<br>";
        
            }
        
    $sql="CREATE TABLE player (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    word_id VARCHAR(255),
    player_ip_address VARCHAR(255),
    player_ip_address VARCHAR(255),
    player_try VARCHAR(255),
    player_win VARCHAR(255),
    player_score VARCHAR(255),
    player_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    // execute query
    if ($link->query($sql)===true) {
        echo "Table player created successfully!<br>";
    }else{
         echo "Error creating table player!<br>";
        
    }

    $sql="CREATE TABLE player_stats (
        player_id INT AUTO_INCREMENT PRIMARY KEY,
        player_name VARCHAR(255),
        player_ip_address VARCHAR(255),
        player_played INT,
        player_win INT,
        player_win_prc FLOAT,
        player_score INT,
        player_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // execute query
        if ($link->query($sql)===true) {
            echo "Table player_stats successfully!<br>";
        }else{
             echo "Error creating table player_stats!<br>";
        }


?>