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
	<title>Login</title>
	<meta name="viewport" content="width=device-width" >
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="style/login/login.css">
	
	<script>
		$(document).ready(function(){
			$("#login_button").click(function(){

				$("#err_msg").fadeOut('fast');
				var form_data = new FormData();
				var form=$("#login_form").serializeArray();
				$.each(form,function(key,input){
				form_data.append(input.name,input.value);
				});
				$.ajax({
					url: 'login_check.php',
					type: 'post',
				    data: form_data,
				    cache:false,
				    processData: false,
    				contentType: false,
				    beforeSend: function(data){
				    /* Show image container */
				    },
				    success: function(response){
						
				    	if (response[2] =='a') {
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Please enter a valid email.');

					      }else if (response[2]=='b') {        
					      	  setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please enter a valid password.');  

					      }else if (response[2]=='c') {          
					          $("#success_msg").fadeIn('fast');
				    		  setInterval(function() {window.location.href="index.php";})
					      }else if (response[2]=='d') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('wrong password.');           

					      }else if (response[2]=='e') {  
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('No account found with this email.');      

					      }else if (response[2]=='f') { 
					          $("#err_msg").fadeIn('fast');
					          $('#err_msg').html('Please verify you login and password.');
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

<div class="login_2">
        <div class="login_container">
            <div class="login_content">
                <form action="" method="" class="login_form" id="login_form">
                    <div class="form_content">
                        <div class="logo_container">Wordle Game</div>
                    </div>
                    <div class="form_content">
                        <div class="login_title">Sign in to your account.</div>
                    </div>
                    <div class="form_content">
                        <div class="err_msg" id="err_msg">Error</div>
                        <div class="success_msg" id="success_msg">You are logged in! Redirection...</div>
                    </div>
                    <div class="form_content">
                        <label for="user_email" class="label_inputs">Email</label>
                        <input class="inputs" type="text" name="user_email" id="user_email" placeholder="Your email addresse">
                    </div>
                    <div class="form_content">
                        <label for="user_password" class="label_inputs">Password</label>
                        <input class="inputs" type="password" name="user_password" id="user_password"  placeholder="Your password">
                    </div>
                    <div class="form_content">
                        <input class="buttons" type="button" name="login_button" id="login_button" value="Sign In">
                    </div>
                </form>
            </div>
        </div>
</div>

</script>
</body>
</html>