<?php 
	//user logged in
	session_start();
	
	if(!isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])!==true && $_SESSION["user_function"]!=="admin"){
		header("location : index.php");
		exit;
	}elseif(isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])==true && $_SESSION["user_function"]=="admin"){
		
	}
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <!--Css links-->
    <link rel="stylesheet" href="style/dashboard/dashboard.css">
    <link rel="stylesheet" href="style/dashboard/dash_content.css">
    <link rel="stylesheet" href="style/dashboard/dash_annimation.css">
    <link rel="stylesheet" href="style/dashboard/tables/tables.css">

    <!--Css Colors link-->
    <link rel="stylesheet" href="style/dashboard/colors/left_items_color.css">
    <link rel="stylesheet" href="style/dashboard/forms/forms_content.css">
    <link rel="stylesheet" href="style/dashboard/profile/profile.css">
    <!-- CSS Files -->
	<!-- dash Files -->
    <!--inputs css-->
    <link rel="stylesheet" href="style/inputs/inputs.css">
    <link rel="stylesheet" href="style/inputs/inputs_colors.css">
    <!--End inputs -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard">
        <div class="dash_container">
            <div class="dash_content">
                <!--left side-->
                <div class="dash_content_left">
                    <!--left side content-->
                    <div class="content_left">
                        <div class="left_items">
                            <div class="left_item" onclick="openCity(event, 'right_item1')" id="defaultOpen">Words</div>
                            <div class="left_item" onclick="openCity(event, 'right_item2')">Possible Words</div>
                            <div class="left_item" onclick="openCity(event, 'right_item3')">Players</div>
                            <div class="left_item" onclick="openCity(event, 'right_item4')">Players Ranking</div>
                            <div class="left_item" onclick="openCity(event, 'right_item5')">Admin</div>
                        </div>
                    </div>
                </div>
                <!--right side-->
                <div class="dash_content_right">
                    <div class="content_right">
                        <!--profile Data-->
                       
                    <!--right side content-->
                        <div class="right_content_items" id="right_item1" >
                          <!--right side content With middle Tabs -->  
                            <div class="forms_container">

                                <div class="forms_content">
                                    <form class="forms" id="word_form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                        <div class="inputs_container">
                                            <div class="inputs_content">
                                                <label for="word" class="labels">Guessed word</label>
                                                <input type="text" class="inputs" id="word" name="word" placeholder="Enter the Guessed Word">
                                            </div>
                                        </div>
                                        <div class="inputs_container">
                                            <div class="buttons_content">
                                                <input type="button" class=" buttons " id="save_word" value="Save ">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="list_content">
                                    <div class="word_list" id="word_list"></div>
                                </div>  
                            </div> 

                                
                        </div>
                        <div class="right_content_items" id="right_item2" >
                            <div class="forms_container">
                                <div class="forms_content">

                                    <form class="forms" id="possible_word_form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                        <div class="inputs_container">
                                            <div class="inputs_content">
                                                <label for="possible_word" class="labels">Possible word</label>
                                                <input type="text" class="inputs" id="possible_word" name="possible_word" placeholder="Enter The Possible Word">
                                            </div>
                                        </div>
                                        <div class="inputs_container">
                                            <div class="buttons_content">
                                                <input type="button" class=" buttons " id="save_possible_word" value="Save ">
                                            </div>
                                        </div>
                                            
                                    </form>
                                    <div class="list_content">
                                        <div class="word_list" id="possible_word_list"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right_content_items" id="right_item3" >
                        <h2 class="title">Players</h2>
                                <div class="list_content">
								    <div class="player_list" id="player_list"></div>

                                </div>
                        </div>
                        <div class="right_content_items" id="right_item4" >
                        <h2 class="title">Players Ranking</h2>
                                <div class="list_content">
								    <div class="player_list" id="player_ranking"></div>
                                </div>
                        </div>
                        <div class="right_content_items" id="right_item5" >
                        <div class="profile">
                            <div class="profile_gb">
                               
                                <div class="profile_container">
                                    <div class="profile_content">
                                        <div class="profile_img">
                                            <img src="icons/profile.svg" alt="" class="profile_img_src">
                                        </div>
                                    </div>
                                    <div class="profile_content">
                                        <div class="profile_name">@<?php echo $_SESSION['user_name']?></div>
                                        <div class="profile_email"><?php echo $_SESSION['user_email']?></div>
                                        <div class="profile_logout">
                                            <form class="forms_logout" action="logout.php" method="post">
                                                <label class="labels_logout" for="logout">Logout</label>

                                                <input name="logout"  class="link" id="logout" hidden="hidden"  type="Submit" value="Logout"> </input>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <h2>Change Password</h2>
                            <div class="md_content">
                                
                                <form class="forms" id="admin_form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="title"></div>


                                        <div class="inputs_container">
                                            <div class="inputs_content">
                                                <label for="password" class="labels">Password</label>
                                                <input type="text" class="inputs" id="password" name="password" placeholder="Your New Password">
                                            </div>
                                        </div>
                                        <div class="inputs_container">
                                            <div class="inputs_content">
                                                <label for="c_password" class="labels">Confirm The Password</label>
                                                <input type="text" class="inputs" id="c_password" name="c_password" placeholder="Confirm your New Password">
                                            </div>
                                        </div>
                                        <div class="inputs_container">
                                            <div class="buttons_content">
                                                <input type="button" class=" buttons " id="save_password" value="Save">
                                            </div>
                                        </div>


                                    
                                </form>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tabs
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("right_content_items");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("left_item");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" left_item_active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " left_item_active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
    
        $(document).ready(function(){
             //load words
             $.ajax({
				url: "player_list.php",
				type: "POST",
				cache: false,
				
				success: function(data) {
					$('#player_list').html(data);
				}
			});
            $.ajax({
				url: "player_ranking.php",
				type: "POST",
				cache: false,
				
				success: function(data) {
					$('#player_ranking').html(data);
				}
			});
             $.ajax({
				url: "word_display.php",
				type: "POST",
				cache: false,
				success: function(data) {
					$('#word_list').html(data);
				}
			});
            $.ajax({
				url: "possible_word_display.php",
				type: "POST",
				cache: false,
				
				success: function(data) {
					$('#possible_word_list').html(data);
				}
			});
           
            $("#save_word").click(function(){

                var form_data = new FormData();

                var other_data=$("#word_form").serializeArray();
                $.each(other_data,function(key,input){
                    form_data.append(input.name,input.value);
                });

                //var word=document.getElementById('word').value;

                $.ajax({
                    url:'word.php',
                    type:'post',
                    cache:false,
                    processData: false,
    				contentType: false,
                    data:form_data,
                    success:function(response){

                        if (response[2] =='a') {
                            alert('this word already exist');

					    }else if (response[2]=='b') { 
                            alert('Please enter a valid Word!');
							  
					    }else if (response[2]=='c') { 
                            alert('the word saved successfully!');
                            $('#word_list').load();
							  
					    }else if (response[2]=='d') { 
                            alert('Only letters are allowed');
							  
					    }else if (response[2]=='f') { 
                            alert('The word must contain 5 letters!');
							  
					    }else{
                            alert(response);
                        }
                    }
                });
            });
            $("#save_password").click(function(){

                var pw=document.getElementById('password').value;
                var c_pw=document.getElementById('c_password').value;
                if(pw!=c_pw){
                    alert("Password didn't match.");
                }else{
                    var form_data = new FormData();

                    var other_data=$("#admin_form").serializeArray();
                    $.each(other_data,function(key,input){
                        form_data.append(input.name,input.value);
                    });

                    //var word=document.getElementById('word').value;

                    $.ajax({
                        url:'admin_password.php',
                        type:'post',
                        cache:false,
                        processData: false,
                        contentType: false,
                        data:form_data,
                        success:function(response){
                            alert(response);

                            if (response[2] =='a') {
                                alert('Password changed');

                            }else if (response[2]=='b') { 
                                alert(response);
                                
                            }
                        }
                    });
                }
               
                });
            $("#save_possible_word").click(function(){

                var form_data = new FormData();

                var other_data=$("#possible_word_form").serializeArray();
                $.each(other_data,function(key,input){
                    form_data.append(input.name,input.value);
                });

                //var word=document.getElementById('word').value;

                $.ajax({
                    url:'possible_word.php',
                    type:'post',
                    cache:false,
                    processData: false,
                    contentType: false,
                    data:form_data,
                    success:function(response){

                        if (response[2] =='a') {
                            alert('this word already exist');

                        }else if (response[2]=='b') { 
                            alert('Please enter a valid Word!');
                            
                        }else if (response[2]=='c') { 
                            alert('the possible word saved successfully!');

                            
                        }else if (response[2]=='d') { 
                            alert('Only letters are allowed');
                            
                        }else if (response[2]=='f') { 
                            alert('The word must contain 5 letters!');
							  
					    }else{
                            alert(response);
                        }
                    }
                });
                });
                
               
                
        });
    </script>
</body>
</html>