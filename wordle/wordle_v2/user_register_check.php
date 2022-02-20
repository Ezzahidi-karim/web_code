<?php 
    require_once "config.php";
    $user_name = $user_email = $user_password = $user_confirm_password = "";
    $errors=$user_name_err =$user_email_err =  $user_password_err = $user_confirm_password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $user_name=test_input($_POST['user_name']);
      $user_email=test_input($_POST['user_email']);
      $user_password=test_input($_POST['user_password']);
      $user_confirm_password=test_input($_POST['user_confirm_password']);

      if (empty($user_name)) {
        $errors="username is required.";
        echo json_encode(array('a' => '1')); 
        exit(); 
      } 
      if (empty($user_email)) {
        $errors="Email is required.";
        echo json_encode(array('b' => '1')); 
        exit(); 
      }
      if(empty($user_password)){
        $errors = "Please enter a password.";   
        echo json_encode(array('l' => '1')); 
        exit();   
      } 
      if(strlen(trim($_POST["user_password"])) < 6){
        $errors = "Password must have atleast 6 characters.";
        echo json_encode(array('e' => '1')); 
        exit();
      }
      if(empty(trim($_POST["user_confirm_password"]))){
        $errors = "Please confirm password."; 
        echo json_encode(array('f' => '1')); 
        exit();  
      } 
      if(empty($errors) && ($user_password != $user_confirm_password)){
        $errors = "Password did not match.";
        echo json_encode(array('g' => '1')); 
        exit();  
      }

      if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
          $errors = "Invalid email format";
          echo json_encode(array('h' => '1')); 
          exit();  
      }

        $sql = "SELECT user_email FROM users WHERE user_email = ?";
        if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_user_email);   
                // Set parameters
              $param_user_email = trim($_POST["user_email"]);
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                /* store result */
                  mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $errors = "This email is already taken.";
                    echo json_encode(array('i' => '1')); 
                    exit(); 
                } 
              } 
                mysqli_stmt_close($stmt);
        }
      if (!preg_match("/^[a-zA-Z-0-9 ]*$/",$user_name)) {
        $errors = "Only letters and white space allowed"; 
        echo json_encode(array('j' => '1')); 
        exit(); 
      }
      
      $sql = "SELECT user_name FROM users WHERE user_name = ?";
      if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_user_name);
                // Set parameters
        $param_user_name = $user_name;
            
              // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
                /* store result */
          mysqli_stmt_store_result($stmt);
                
          if(mysqli_stmt_num_rows($stmt) == 1){
            $errors = "This username is already taken.";
            echo json_encode(array('k' => '1')); 
            exit(); 
          } 
        } 
        mysqli_stmt_close($stmt);
      }
      if(empty($errors)){
        $sql = "INSERT INTO users (user_name,user_email, user_password,user_function) VALUES (?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_user_name,$param_user_email,$param_user_password,$param_user_function);
            // Set parameters
            $param_user_name = $user_name;
            $param_user_email = $user_email;
            $param_user_password = password_hash($user_password, PASSWORD_DEFAULT);
            $param_user_function = 'admin';
             // Creates a user_password hash
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              echo "success";
              echo json_encode(array('c' => '1')); 
              exit(); 
            } else{
                echo "You didn't signed up";
                echo json_encode(array('m' => '1')); 
              exit(); 
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
      }
      // Close connection
         mysqli_close($link);

    }//fin request metod

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
?>