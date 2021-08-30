<?php 

	session_start();
	if (!isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])==false ) {
		header("location: login.php");
		exit;
	}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome page</title>
	<link rel="stylesheet" type="text/css" href="style/welcome.css">
	<link rel="stylesheet" type="text/css" href="style/fonts.css">
</head>
<body>
	<div class="profile">
		<div class="row">
		<img class="user_img" src="img/profile.png"> </img>
		</div>

		<div class="row marge lborder ralign ">
			<div class="lbl">      Id :</div> 
			<div class="lbl">Username :</div>
			<div class="lbl">E-mail :</div>
		</div>
		<div class="row marge rborder">
			<div class="user_id"><?php echo $_SESSION["id"];?></div>
			<div class="user_name"><?php echo $_SESSION["username"];?></div>
			<div class="user_email"><?php echo $_SESSION["email"];?></div>
		</div>
		<div class="row marge">
			<form method="post" action="logout.php">
				<input class="buttons logout" type="submit" name="logout" value="Logout"></input>
			</form>
		</div>
	</div>

		

	
</body>
</html>