<?php 
    require_once "config.php";
    $errors='';
    $username=test_input($_POST['username']);
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);
    $confirm_password=test_input($_POST['confirm_password']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
     

      if (empty($username)) {
        $errors="username is required.";
        echo "a"; 
        exit(); 
      } 
      if (empty($email)) {
        $errors="Email is required.";
        echo "b"; 
        exit(); 
      }
      if(empty($password)){
        $errors = "Please enter a password.";   
        echo "l"; 
        exit();   
      } 
      if(strlen(trim($_POST["password"])) < 6){
        $errors = "Password must have atleast 6 characters.";
        echo "e"; 
        exit();
      }
      if(empty(trim($_POST["confirm_password"]))){
        $errors = "Please confirm password."; 
        echo "f"; 
        exit();  
      } 
      if(empty($errors) && ($password != $confirm_password)){
        $errors = "Password did not match.";
        echo "g"; 
        exit();  
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors = "Invalid email format";
          echo "h"; 
          exit();  
      }

        $sql = "SELECT email FROM user WHERE email = ?";
        if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_email);   
                // Set parameters
              $param_email = trim($_POST["email"]);
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                /* store result */
                  mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $errors = "This email is already taken.";
                    echo "i"; 
                    exit(); 
                } 
              } 
                mysqli_stmt_close($stmt);
        }
      if (!preg_match("/^[a-zA-Z-0-9 ]*$/",$username)) {
        $errors = "Only letters and white space allowed"; 
        echo "j"; 
        exit(); 
      }
      
      $sql = "SELECT username FROM user WHERE username = ?";
      if($stmt = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
                // Set parameters
        $param_username = $username;
            
              // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
                /* store result */
          mysqli_stmt_store_result($stmt);
                
          if(mysqli_stmt_num_rows($stmt) == 1){
            $errors = "This username is already taken.";
            echo "k"; 
            exit(); 
          } 
        } 
        mysqli_stmt_close($stmt);
      }
      if(empty($errors)){
        $sql = "INSERT INTO user (username,email, password) VALUES (?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email,$param_password);
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
             // Creates a password hash
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              echo "c"; 
              exit(); 
            } else{
                echo "m"; 
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