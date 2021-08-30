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
	<title>Login</title>
	<meta name="viewport" content="width=device-width" >
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<link rel="stylesheet" type="text/css" href="style/modal.css">
	<link rel="stylesheet" type="text/css" href="style/error_msg.css">
	<link rel="stylesheet" type="text/css" href="style/fonts.css">
	<script type="text/javascript" src="js/modal.js"></script>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#login_btn").click(function(){

				setInterval($("#err_msg").hide(),'fast');

				var form_data = new FormData();
				var form=$("#login_form").serializeArray();
				$.each(form,function(key,input){
				form_data.append(input.name,input.value);
				});

				$.ajax({
					url: 'check_login.php',
					type: 'post',
				    data: form_data,
				    cache:false,
				    processData: false,
    				contentType: false,
				    beforeSend: function(data){
				    /* Show image container */
				    },
				    success: function(response){
				    	if (response=='a') {
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please enter a valid email.');

					      }else if (response=='b') {        
					      	  setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please enter a valid password.');

					      }else if (response=='c') {          
					          setInterval($("#myModal").fadeIn(),'fast');
				    		  setTimeout(function() {$('#myModal').hide();},3000);
				    		  setInterval(function() {window.location.href="welcome.php";});

					      }else if (response=='d') { 
					      	  setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('wrong password.'); 

					      }else if (response=='e') {  
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('No account found with this email.'); 

					      }else if (response=='f') { 
					          setInterval($("#err_msg").fadeIn(),'fast');
					          $('#err_msg').html('Please verify you login and password.');
					      }
				    }
				});
				setTimeout(function() {$('#err_msg').fadeOut();},20000);

			});
		});
		
	</script>
</head>
<body>
<div class="login">
	
	<div class="content">
		<div class="card">	

			<form class="form" id="login_form" method="post" action="<?php htmlspecialchars('welcome.php'); ?>">
					<img src="img/profile.png" class="Profile_img">
					<h2 class="title">Login</h2>
					<div class="err_msg" id="err_msg" ></div>
					<input class="inputs" type="text" name="username" placeholder="Email  or Username" autofocus="true" autocomplete="false" required="true"><br>
					<input class="inputs" type="Password" name="password" placeholder="Password " required="true"><br>

					<div class="Remember">
					<input class="rb" id="remembre_cb" type="checkbox" name="remembre" value="remembre" >
					<label class="lbl_rb" for="remembre_cb">Remember me</label> 
					<a class="fg links" href="forgot_password.php">Forgot password?</a>
					</div>
					<input class="buttons" type="submit" id="login_btn" name="login" value="Log in" onclick="return false;">
				
				<div class="redirect">
					<p class="">Don't have an Account? <a class="links" href="signup.php">Sign up here!</a></p>
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
		          <p class="m_title">You are connected!</p>
	          </div>
           </div>
	
</body>
</html>