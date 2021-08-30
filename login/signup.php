<?php 

	session_start();
	if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])==true ) {
		header("location: welcome.php");
		exit;
	}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width" >
	<link rel="stylesheet" type="text/css" href="style/sign_up.css">
	<link rel="stylesheet" type="text/css" href="style/modal.css">
	<link rel="stylesheet" type="text/css" href="style/error_msg.css">
	<link rel="stylesheet" type="text/css" href="style/fonts.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	<script type="text/javascript" src="js/modal.js"></script>	

	<script>
		$(document).ready(function(){
			$("#signup_btn").click(function(){
				
				setInterval($("#err_msg").hide(),'fast');
				var form_data = new FormData();
				var form=$("#signup_form").serializeArray();
				$.each(form,function(key,input){
				form_data.append(input.name,input.value);
				});

				$.ajax({
					url: 'check_signup.php',
					type: 'post',
				    data: form_data,
				    cache:false,
				    processData: false,
    				contentType: false,
				    beforeSend: function(data){
				    /* Show image container */
				    },
				    success: function(response){
				    	if (response =='a') {
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Username field is required.');
					      }else if (response=='c') { 
							  setInterval($("#myModal").fadeIn(),'fast');
				    		  setTimeout(function() {$('#myModal').hide();},3000);
				    		  setInterval(function() {window.location.href="login.php";});
					      }else if (response=='b') {        
					      	  setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Email field is required.');  
					      }else if (response=='l') { 
					      	  setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please enter a password.');           
					      }else if (response=='e') {  
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Password must have atleast 6 characters.');            
					      }else if (response=='f') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please confirm the password.');
					      }else if (response=='g') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Password did not match.');
					      }else if (response=='h') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please enter a valid email format!');
					      }
					      else if (response=='i') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('This email already in use!');
					      }else if (response=='j') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Only letters and white space allowed');
					      }else if (response=='k') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('This username already in use!');
					      }else if (response=='m') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('you did not signed up');
					      }else{
					      	alert(response);
					      }
				    }
				    
				});
				setTimeout(function() {$('#err_msg').fadeOut();},20000);

			});
		});
		
	</script>
</head>
<body>
<div class="register">
	
	<div class="content">
		<div class="card">	
			
			<form class="form" id="signup_form" method="post" action="<?php htmlspecialchars('login.php'); ?>">

					<h2 class="title">Join Us for free</h2>
					<div class="err_msg" id="err_msg" >error!</div>

					<input class="inputs" type="text" name="username" placeholder="Username" autofocus="true" autocomplete="false" required="true"><br>
					<input class="inputs" type="text" name="email" placeholder="Email Address" autofocus="true" autocomplete="false" required="true"><br>
					<input class="inputs" type="Password" name="password" placeholder="Password " required="true"><br>
					<input class="inputs" type="Password" name="confirm_password" placeholder="Confirm your Password " required="true"><br>

					<input class="buttons" type="submit" id="signup_btn" name="signup" value="Sign Up" onclick="return false;">
				
				<div class="redirect">
					<p class="">Alredy you have an Account? <a class="links" href="login.php">Login here!</a></p>
				</div>
			</form>
		</div>
		
		
	</div>
</div>
 <!-- The Modal -->
          <div id="myModal" class="modal">
  <!-- Modal content -->
	          <div class="modal_content">
		          <span class="close">&times;</span>
		          <div class="loader" id='loader'>
		  				<img  class="loader" src='gif/success.gif' >
					</div><br>
		          <p class="m_title">Welcome to your Community!</p>
	          </div>
           </div>
	

</body>
</html>