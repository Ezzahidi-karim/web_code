<?php 
require_once "config.php";
$user_email = $user_password = "";
$user_email=test_input($_POST['user_email']);
$user_password=test_input($_POST['user_password']);
$errors = $user_email_err =  $user_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if($user_email==""){
         $errors = "Please enter a valid email.";
       echo json_encode(array('a' => '1')); 
       exit(); 
    }else if($user_password==""){
         $errors = "Please enter a valid password.";
          echo json_encode(array('b' => '1'));  
    }
    if(empty($errors)){
        // Prepare a select statement
        $sql = "SELECT user_id, user_name,user_email, user_password,user_function,user_img FROM users WHERE  user_email =?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_user_email);
            $param_user_email = $user_email;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $user_id, $user_name,$user_email, $hashed_user_password,$user_function,$user_img);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($user_password, $hashed_user_password,)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["user_name"] = $user_name;    
                            $_SESSION["user_email"] = $user_email;              
                            $_SESSION["user_img"] = $user_img;                            
                            $_SESSION["user_function"] = $user_function;     
                            echo json_encode(array('c' => '1'));  

                        } else{
                        $user_password_err = "The password you entered was not valid.";
                             echo json_encode(array('d' => '1'));  
                        }
                    }
                } else{
                             echo json_encode(array('e' => '1'));  
                    $user_email_err = "No account found with that user_email.";
                }
            } else{
                echo json_encode(array('f' => '1'));  
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($link);
}

// Login button end




        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

            
?>