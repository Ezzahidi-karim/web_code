<?php 

session_start();
	if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])==true ) {
		header("location: index.php");
		exit;
	}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Register</title>
	<meta name="viewport" content="width=device-width" >

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/user_register/user_register.css">
	<script>
		$(document).ready(function(){
			$("#register_button").click(function(){
				
				$("#err_msg").hide('fast');
				var form_data = new FormData();
				var form=$("#user_register_form").serializeArray();
				$.each(form,function(key,input){
				form_data.append(input.name,input.value);
				});
				$.ajax({
					url: 'user_register_check.php',
					type: 'post',
				    data: form_data,
				    cache:false,
				    processData: false,
    				contentType: false,
				    beforeSend: function(response){
				    /* Show image container */
				    },
				    success: function(response){
				    	if (response[2] =='a') {
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Username field is required.');

					      }else if (response[2]=='c') { 

					          $("#success_msg").fadeIn('fast');
					      }else if (response[2]=='b') {        
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Email field is required.');  
					      }else if (response[2]=='l') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Please enter a password.');           
					      }else if (response[2]=='e') {  
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Password must have atleast 6 characters.');            
					      }else if (response[2]=='f') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Please confirm the password.');
					      }else if (response[2]=='g') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Password did not match.');
					      }else if (response[2]=='h') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Please enter a valid email format!');
					      }
					      else if (response[2]=='i') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('This email already in use!');
					      }else if (response[2]=='j') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Only letters and white space allowed');
					      }else if (response[2]=='k') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('This username already in use!');
					      }else if (response[2]=='m') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('you did not signed up');
					      }else{
                              alert(response);
                          }
				    },
				    complete:function(data){

				   }
				});

			});
		});
		
	</script>
</head>
<body>

<div class="user_register">
        <div class="user_register_container">
            <div class="user_register_content">
                <form action="" method="" class="user_register_form" id="user_register_form">
                    <div class="form_content">
                        <div class="logo_container">Wordle Game</div>
                    </div>
                    <div class="form_content">
                        <div class="user_register_title">Sign Up only For Admin</div>
                    </div>
                    <div class="form_content">
                        <div class="err_msg" id="err_msg">Error</div>
                        <div class="success_msg" id="success_msg">Congatulations! you are Joined our team!</div>
                    </div>
                    <div class="form_content">
                        <label for="user_name" class="label_inputs">Username</label>
                        <input class="inputs" type="text" name="user_name" id="user_name" placeholder="Your Username" value="karim">
                    </div>
                    <div class="form_content">
                        <label for="user_email" class="label_inputs">Email</label>
                        <input class="inputs" type="text" name="user_email" id="user_email" placeholder="Your email addresse" value="karim@gmail.com">
                    </div>
                    <div class="form_content">
                        <label for="user_password" class="label_inputs">Password</label>
                        <input class="inputs" type="password" name="user_password" id="user_password"  placeholder="Your password" value="123456">
                    </div>
                    <div class="form_content">
                        <label for="user_confirm_password" class="label_inputs">Confirm your Password</label>
                        <input class="inputs" type="password" name="user_confirm_password" id="user_confirm_password"  placeholder="Confirm Your password" value="123456">
                    </div>
                    <div class="form_content">
                        <input class="buttons" type="button" name="register_button" id="register_button" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
</div>



</body>
</html>