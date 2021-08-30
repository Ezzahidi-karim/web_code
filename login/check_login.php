<?php 
    //Initialise the session
require_once "config.php";
$username = $password = "";
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);
$errors =  $password_err = "";

// Login button start
// Processing form data when form is submitted login
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if($username==""){
        $errors = "Please enter a valid email.";
        echo "a"; 
       exit(); 
    }else if($password==""){
         $errors = "Please enter a valid password.";
        echo "b";
    }
    if(empty($errors)){
        // Prepare a select statement
        $sql = "SELECT id_user, username,email, password,img_user FROM user WHERE username = ? OR email =?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_email);
            // Set parameters
            $param_username = $username;
            $param_email = $username;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username,$email, $hashed_password,$img_user);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password,)){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;    
                            $_SESSION["email"] = $email;              
                            $_SESSION["img"] = $img_user;                            
                            echo "c";  

                        } else{
                        $password_err = "The password you entered was not valid.";
                             echo "d";  
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                             echo "e";  
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "f";  
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