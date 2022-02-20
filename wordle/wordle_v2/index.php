
<?php 
	session_start();
	
	if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!==true) {

		$admin_menu="style ='display:none;'";
		$client_menu="style ='display:block;'";

	}elseif(isset($_SESSION['loggedin']) && isset($_SESSION['loggedin'])==true && $_SESSION["user_function"]=="admin"){

		$client_menu="style ='display:none;'";
		$admin_menu="style ='display:block;'";

	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style/home/index_colors.css">
    <link rel="stylesheet" href="style/home/index.css">
    <link rel="stylesheet" href="style/home/settings.css">
    <link rel="stylesheet" href="style/home/player.css">
    <link rel="stylesheet" href="style/home/modals.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/darkmode.js"></script>

    <title>Wordle</title>
</head>

<body id="body">
<div class="success_modal">
        <div class="modal_container">
            <div class="modal_content">
                
                <div class="player_stats">
                    <div class="stats_played">Played <br><div>10</div></div>
                    <div class="stats_played">win <br><div>50%</div></div>
                    <div class="stats_played">Score <br> <div>10000</div></div>

                </div>
                <div class="player_result">
                    <div class="stats_try">Number of tries: 10</div>
                    <div class="stats_score">Score + 1000</div>
                </div>
           
            </div>
        </div>
    </div>
    <div class="failed_modal">
        <div class="failed_modal_container">
            <div class="modal_content">
            <div class="player_stats">
                    <div class="stats_played">Played <br><div>10</div></div>
                    <div class="stats_played">win <br><div>50%</div></div>
                    <div class="stats_played">Score <br> <div>10000</div></div>

                </div>
                <div class="player_result">
                    <div class="failed_stats_try">Number of tries: 10</div>
                    <div class="stats_score">Prize : 0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="wordle">
        

        <div class="menu">
            <div class="menu_container">
                <div class="menu_content" id="howtoplay"><img class="icons" src="icons/howtoplay.svg" alt=""></div>
                <div class="menu_content_middle" id="menu_content">Wordle Game</div>
                <div class="menu_content" id="settings"> <img class="icons" src="icons/settings.svg" alt=""></div>
                <div class="set_item" id="reset">Reset</div>

            </div>
            <!-- settings -->
            
            <div class="settings" id="settings_toogle">
                <div class="settings_content">
                    <div class="settings_items">
                    <div class="set_item set_margin" style="font-weight:600;text-align:center; font-size:20px; margin-bottom:20px;">SETTINGS</div>

                        <div class="set_item" id="hard">
                                <div class="f_li">Hard Mode</div>
                                <div class="l_li"><input type="checkbox" id="switch_hard" />
                                <label class="switch label_switch" for="switch_hard"></label></div>
                        </div>
                        <div class="set_item" id="light_dark">
                                <div class="f_li">Light Dark Mode</div>
                                <div class="l_li"><input type="checkbox" id="switch" />
                                <label class="switch label_switch" for="switch"></label></div>
                        </div>
                        <!--<div class="set_item set_margin" id="reset">Reset</div>-->
                        <div class="set_item set_margin" <?php echo $admin_menu; ?> ><a href="dashboard.php">Dashboard</a></div>
                        <div class="set_item set_margin" <?php echo $admin_menu; ?> ><a>
                            <form action="logout.php" method="post" <?php echo $admin_menu; ?>>
                            <label for="logout">Logout</label>
                                <input name="logout"  hidden="hidden" id="logout" type="Submit" value="Logout"> </input>
                            </form>
                        </a>
                        </div>
                        <div class="set_item set_margin" <?php echo $client_menu; ?> >
                        <a href="login.php">Login</a>
                    </div>
                        <div class="set_item set_margin" >
                            <div class="player_container" id="player_container">
                               
                            </div>
                        </div>
                        <div class="close_toggle" id="close_toggle"><img class="close" src="icons/close_toggle.svg"></img></div>
                    </div>
                </div>
            </div>
            <!-- How TO play -->
            <div class="settings" id="help">
                <div class="settings_content">
                    <img class="help_img"  id="help_w" src="icons/howtoplay_image.svg" alt="" width="" height="" >
                    <img class="help_img"  id="help_b" src="icons/howtoplay_image_black.svg" alt="" width="" height="" >
                    <div class="close_toggle" id="close_help"><img class="close" src="icons/close_toggle.svg"></img></div>

                </div>
            </div>
        </div>

                
                

    <input type="text" id="result" value="" style="display:none" >

   

    <div class="word_gen" id="word_gen"></div>
        <div class="answers light_bg " id="answers">
            <div class="items_0 light_bg" id="items_0">
                <div class=" item_style light_item" id="item_1" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_2" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_3" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_4" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_5" style="background-color: var(--white);"></div>
            </div>
        
            <div class="items_1 "  id="items_1">
                <div class=" item_style light_item" id="item_2_1" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_2_2" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_2_3" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_2_4" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_2_5" style="background-color: var(--white);"></div>
            </div>
            <div class="items_2 "  id="items_2">
                <div class=" item_style light_item" id="item_3_1" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_3_2" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_3_3" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_3_4" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_3_5" style="background-color: var(--white);"></div>
            </div>
            <div class="items_3 "  id="items_3">
                <div class=" item_style light_item" id="item_4_1" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_4_2" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_4_3" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_4_4" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_4_5" style="background-color: var(--white);"></div>
            </div>
            <div class="items_4 "  id="items_4">
                <div class=" item_style light_item" id="item_5_1" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_5_2" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_5_3" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_5_4" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_5_5" style="background-color: var(--white);"></div>
            </div>
            <div class="items_5 "  id="items_5">
                <div class=" item_style light_item" id="item_6_1" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_6_2" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_6_3" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_6_4" style="background-color: var(--white);"></div>
                <div class=" item_style light_item" id="item_6_5" style="background-color: var(--white);"></div>
            </div>

        </div>
    </div>
    <br>
        <div class="err_container">
            <div class="err_msg" id="err_msg">Errors</div>
            <div class="success_msg" id="success_msg">Bravo!</div>
        </div>
    <br>
    <div class="keyboard">
        <div class="keyboard_content">
        <div class="class_a" id="keyboard_function">
                <div class=" key_style key"  value="Q"  id="Q"  >Q</div>
                <div class="key_style key" value="W" id="W" style="background-color: var(--white);">W</div>
                <div class="key_style key" value="E"  id="E" style="background-color: var(--white);">E</div>
                <div class="key_style key" value="R" id="R" style="background-color: var(--white);">R</div>
                <div class="key_style key" value="T"  id="T" style="background-color: var(--white);">T</div>
                <div class="key_style key" value="Z" id="Z"  style="background-color: var(--white);">Z</div>
                <div class="key_style key" value="U" id="U" style="background-color: var(--white);">U</div>
                <div class="key_style key" value="I" id="I" style="background-color: var(--white);">I</div>
                <div class="key_style key" value="O" id="O" style="background-color: var(--white);">O</div>
                <div class="key_style key" value="P"  id="P" style="background-color: var(--white);">P</div>
                <div class="key_style key" value="Ü" id="Ü" style="background-color: var(--white);">Ü</div>
            </div>
            <div class="class_b" id="keyboard_function">
                <div class="key_style key" value="A" id="A" style="background-color: var(--white);">A</div>
                <div class="key_style key" value="S" id="S" style="background-color: var(--white);">S</div>
                <div class="key_style key" value="D" id="D" style="background-color: var(--white);">D</div>
                <div class="key_style key" value="F" id="F" style="background-color: var(--white);">F</div>
                <div class="key_style key" value="G" id="G" style="background-color: var(--white);">G</div>
                <div class="key_style key" value="H" id="H" style="background-color: var(--white);">H</div>
                <div class="key_style key" value="J" id="J" style="background-color: var(--white);">J</div>
                <div class="key_style key" value="K" id="K" style="background-color: var(--white);">K</div>
                <div class="key_style key" value="L" id="L" style="background-color: var(--white);">L</div>
                <div class="key_style key" value="Ö" id="Ö" style="background-color: var(--white);">Ö</div>
                <div class="key_style key" value="Ä"  id="Ä" style="background-color: var(--white);">Ä</div>
            </div>
            <div class="class_c" id="keyboard_function">
                <div class="custom_key key_style" value="enter" id="enter_id">Enter</div>
                <div class="key_style key" value="Y" id="Y" style="background-color: var(--white);">Y</div>
                <div class="key_style key" value="X" id="X" style="background-color: var(--white);">X</div>
                <div class="key_style key" value="C"  id="C" style="background-color: var(--white);">C</div>
                <div class="key_style key" value="V" id="V" style="background-color: var(--white);">V</div>
                <div class="key_style key" value="B"  id="B" style="background-color: var(--white);">B</div>
                <div class="key_style key" value="N" id="N" style="background-color: var(--white);">N</div>
                <div class="key_style key" value="M"  id="M" style="background-color: var(--white);">M</div>
                <div class="custom_key key_style " id="back">
                    <img class="backspace_img" id="bspace" src="icons/backspace.svg" alt="">
                    <img class="backspace_img" id="bspace_w" src="icons/backspace_white.svg" style="display:none" alt="">
                </div>
            </div>
            
        </div>
    </div>
<script>
    $(document).ready(function(){
        
        $('#close_help').click(function(){
            $('#help').slideToggle('fast');

        });
        $('#close_toggle').click(function(){
            $('#settings_toogle').slideToggle('fast');

        });
        /*light dark mode */
        let darkMode = localStorage.getItem('darkMode');
        let hardMode = localStorage.getItem('hardMode');

        if (darkMode === 'enabled') {
            $('#help_w').css('display','none');
            $('#help_b').css('display','block');
        }else{
            $('#help_w').css('display','block');
            $('#help_b').css('display','none');
        }
        $('#settings').click(function(){
            $('#settings_toogle').slideToggle('fast');
        });
        

        $('#howtoplay').click(function(){
            $('#help').slideToggle('fast');
        });
       
        var opp=false;
        var word_gen;
        var word_split;
        var word_arr=[];
        var innerDivId;
        var restart=false;
        var final_res;
        var exist_in_database=false;
        var win='false';
        var lose=false;
        var result=document.getElementById('result');
        var enter_itt=0;
        var last_child="";
        var new_arr=[],g_letter='',g_index='',g_id_div='';
        var ip_address;
        var score;
        var hard=0;
        var test=0;
        var current_color;
        var current_div;
        $.getJSON("https://api.ipify.org?format=json", function(data) {
         
         ip_address=(data.ip);
        $.ajax({
				url: "player_display.php",
				type: "POST",
				cache: false,
                data:{
                    ip:ip_address
                },
				success: function(data) {
					$('#player_container').html(data);
				}
			});
     })
     
        $.ajax({
				url: "gen_word.php",
				type: "POST",
				cache: false,
				
				success: function(data) {
                    word_gen="";
                    word_split=[];
                    word_arr=[];
					word_gen=data;
                    if(word_gen==""){
                        location.reload();
                    }
                    gen();
				}
                
		});

        function gen(){
            word_split=word_gen.split("");
            for (let o = 0; o < 5; o++) {
                word_arr.push({
                                letter:word_split[o],
                                index:o
                         });
            }

        }
           
       
        $('#reset').click(function(){
            location.reload();
            enter_itt=0;
        });
        $('.modal_button').click(function(){
            location.reload();
            enter_itt=0;
        });
        $('.success_modal').click(function(){
            location.reload();
            enter_itt=0;
        });
        $('.failed_modal').click(function(){
            location.reload();
            enter_itt=0;
        });
        
        function gen_word(){
            console.log('reset clicked');
            word_gen="";
            word_split=[];
            word_arr=[];
            $.ajax({
				url: "gen_word.php",
				type: "POST",
				cache: false,
				
				success: function(data) {
                    word_gen="";
                    word_split=[];
                    word_arr=[];
                    word_gen=data;
                    if(word_gen==""){
                       }
                    gen();
                    console.log("word");
                    console.log(word_gen);

				}
                
		    });
            
        }
        var id_dec;
        var inner_dec;

        
        $('#back').click(function(){
            $("#err_msg").fadeOut("fast");

            if(result.value==""){
            $("#err_msg").html("Write words first");
            $("#err_msg").fadeIn("fast");
                

            }else{

               
                
                var str=result.value;
                result.value=str.slice(0,-1);
                final_res=result.value;
                new_arr.pop();
                $('#'+inner_dec+id_dec).html('');
                $('#'+inner_dec+id_dec).css("height","38px");
                $('#'+inner_dec+id_dec).css("transition","0.1s");

                id_dec--;
            }
        });


        $('.key').click(function(){
            $("#err_msg").fadeOut("fast");

            if(result.value.length==5){
                $("#err_msg").html("Press Enter to check the word!");
                $("#err_msg").fadeIn("fast");
            }else{
            
            var pressed_key=this.innerHTML;
            document.getElementById('result').value+=this.innerHTML;
            
            var p = document.getElementById("answers").childElementCount;
            var p_index = $('#answers').index();
            
            var c = document.getElementById("items_0").childElementCount;
            $('#answers').find('div').each(function(){
              
                var div_id="#items_";
                div_id+=enter_itt;

                $(div_id).find('div').each(function(){

                    g_letter='';
                    g_index='';
                    innerDivId = $(this).attr('id');
                    var text = $(this).text();
                    g_letter=pressed_key;
                    g_index=$(this).index();
                    g_pressed_key=pressed_key;
                    g_id_div=innerDivId;
                    
                    if (text=="") {
                        if (last_child.length!=0) {
                            
                            exit();

                        }else if(screen.width<="425"){
                            var index = $(this).index();
                            
                            $(this).html(pressed_key);
                            $(this).css("height","auto");
                            $(this).css("padding-top","2px");
                            $(this).css("padding-bottom","2px");
                            $(this).css("padding-right","0px");
                            $(this).css("padding-left","0px");
                            $(this).css("transition","0.1s");
                            
                            new_arr.push({
                                letter:g_letter,
                                index:g_index,
                                id_key:pressed_key,
                                id_div:g_id_div
                            });
                            console.log(new_arr);
                            id_dec=innerDivId.charAt(innerDivId.length-1);
                            inner_dec=innerDivId.slice(0,-1);
                            
                            exit();
                        }else{
                            var index = $(this).index();
                            
                            $(this).html(pressed_key);
                            $(this).css("height","auto");
                            $(this).css("padding-top","12px");
                            $(this).css("padding-bottom","12px");
                            $(this).css("padding-right","0px");
                            $(this).css("padding-left","0px");
                            $(this).css("transition","0.1s");
                            
                            new_arr.push({
                                letter:g_letter,
                                index:g_index,
                                id_key:pressed_key,
                                id_div:g_id_div
                            });
                            id_dec=innerDivId.charAt(innerDivId.length-1);
                            inner_dec=innerDivId.slice(0,-1);
                            
                            exit();
                        }
                    }
                    
                });    
            });    
                
        }
        });

       
        $('#enter_id').click(function(){
            exist_in_database=false;
            opp=false;
            final_res=result.value;
            if(final_res=="" || final_res.length!=5){
                $("#err_msg").html("Please Tap 5 letters Then Press enter!");
                $("#err_msg").fadeIn("fast");
            }else{
                    opp=true;
                    var w=final_res;
                    $.ajax({
                        url: "check_word_exist.php",
                        type: "POST",
                        cache: false,
                        data:{word:w},
                        success: function(response) {
                            if (response[2] =='a') {
                              exist_in_database=true;
                              if(hardMode=="enabled"){
                                check_data_hard();

                              }else{
                                check_data();

                              }
                              
					      }else if (response[2]=='b') {    
                              
                                exist_in_database=false;

                                $("#err_msg").html("Use another word!");
                                $("#err_msg").fadeIn("fast");
                                  
                              }
                            
					      
                        }
                    });
                    
                }
        });

        function check_data(){
            if (exist_in_database==true) {
                enter_itt++;
                result.value="";
                        console.log("word array 1");
                        var test=0;
                        var tests=0;
                        var color="red";

                        var id_key_pressed_color;
                        var id_guessed_color;
                        
                        

                        if(final_res==word_gen){    
                            for (var i = 0, l = word_arr.length; i < l; i++) {

                                var word_keys=Object.keys(word_arr[i]);
                                var guessed_word_keys=Object.keys(new_arr[i]);

                                for (var j = 0, k = word_keys.length; j < k; j++) {
                                    
                                }

                                for (var a = 0; a < 5; a++) {  
                                    
                                    var id_key_pressed=new_arr[i][guessed_word_keys[2]];
                                    var id_guessed=new_arr[i][guessed_word_keys[3]];


                                
                                    
                                    
                                    if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] && 
                                    word_arr[a][word_keys[1]]==new_arr[i][guessed_word_keys[1]] ){
                                        color="green";
                                        if (color="green") {
                                            document.getElementById(id_key_pressed).style.backgroundColor="green";
                                            document.getElementById(id_guessed).style.backgroundColor="green";

                                            hard++;
                                                //$('#'+id_key_pressed).css("background-color", "rgb(0, 255, 0)");
                                                //$('#'+id_guessed).css("background-color", "rgb(0, 255, 0)");
                                                //$('#'+id_key_pressed).css("transition", "0.2s");
                                                //$('#'+id_guessed).css("transition", "0.2s");
                                                //console.log("greeeeeeened "+a);
                                                //colored
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;

                                        }
                                      

                                        
                                        break;

                                        
                                            
                                    }
                                }
                                

                                color="";
                                test=0;
                            }
                        }else{

                            for (var i = 0, l = word_arr.length; i < l; i++) {

                            var word_keys=Object.keys(word_arr[i]);
                            var guessed_word_keys=Object.keys(new_arr[i]);

                            for (var j = 0, k = word_keys.length; j < k; j++) {
                                
                            }

                            for (var a = 0; a < 5; a++) {  
                                console.log('Scene :  '+a);
                                console.log(word_arr[a][word_keys[0]]);
                                console.log(new_arr[i][guessed_word_keys[0]]);
                                
                                var id_key_pressed=new_arr[i][guessed_word_keys[2]];
                                var id_guessed=new_arr[i][guessed_word_keys[3]];

                               
                                if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] && 
                                word_arr[a][word_keys[1]]==new_arr[i][guessed_word_keys[1]] ){
                                    
                                    color="green";
                                    if (color="green") {
                                        
                                            document.getElementById(id_key_pressed).style.backgroundColor="green";
                                            document.getElementById(id_guessed).style.backgroundColor="green";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;

                                                
                                            break;

                                    }else{
                                        continue;
                                    }
                                        
                                }
                                var inc_test=0;
                                if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] ){
                                    console.log('turn yellow');
                                    color="yellow";
                                    id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                    id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;
                                   
                                    if (color="yellow" ) {
                                        if (id_key_pressed_color!="green" ) {
                                            document.getElementById(id_key_pressed).style.backgroundColor="yellow";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;


                                        }
                                        if (id_guessed_color!="green"){
                                            document.getElementById(id_guessed).style.backgroundColor="yellow";
                                            id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;
                                            
                                            $('#'+id_guessed).css("transition", "0.2s");

                                        }
                                        inc_test++;
                                        if(inc_test==5){
                                            break;
                                        }
                                    }else{
                                        continue;
                                    }
                                }

                                    
                                    if(word_arr[a][word_keys[0]]!=new_arr[i][guessed_word_keys[0]] ){
                                        console.log('turn red');
                                        color="red";
                                        id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                        id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;
                                        if (color="red" ) {
                                            if (id_key_pressed_color=="var(--white)"  ) {
                                            
                                                document.getElementById(id_key_pressed).style.backgroundColor="red";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;

                                            }
                                            if (id_guessed_color=="var(--white)" ) {
                                            
                                                document.getElementById(id_guessed).style.backgroundColor="red";
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;

                                            }
                                        
                                    }
                                }
                                

                            }

                            color="";
                            test=0;
                        }
                        }
                        

                        new_arr=[];
                        
                        if(final_res==word_gen){
                            win=1;
                            $("#success_msg").html("Bravo!!");
                            $("#success_msg").fadeIn("fast");
                            save_player();
                        } 
                        else{
                            win=0;
                            $("#err_msg").html("You didn't Guessed. Try another one!!");
                            $("#err_msg").fadeIn("fast");
                            if(enter_itt==6){
                                enter_itt=7;
                                if(enter_itt==7){
                                    save_player();
                                }
                            }
                        }

                        
                    }
                    
        }
        //hard mode
        function check_data_hard(){
            if (exist_in_database==true) {
                hard=0;
                
                        console.log("word array 1");
                        var test=0;
                        var tests=0;
                        var color="red";

                        var id_key_pressed_color;
                        var id_guessed_color;
                        for (var i = 0, l = word_arr.length; i < l; i++) {

                                var word_keys=Object.keys(word_arr[i]);
                                var guessed_word_keys=Object.keys(new_arr[i]);

                                for (var j = 0, k = word_keys.length; j < k; j++) {
                                    
                                }

                                for (var a = 0; a < 5; a++) {  
                                
                                    
                                    var id_key_pressed=new_arr[i][guessed_word_keys[2]];
                                    var id_guessed=new_arr[i][guessed_word_keys[3]];

                                
                                    
                                    
                                    if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] && 
                                    word_arr[a][word_keys[1]]==new_arr[i][guessed_word_keys[1]] ){
                                        console.log('turn green');
                                        color="green";
                                        if (color="green") {
                                            hard++;
                                        }
                                        break;
                                    }
                                }
                                
                                color="";
                                test=0;
                            }

                        if(final_res==word_gen){    
                            for (var i = 0, l = word_arr.length; i < l; i++) {

                                var word_keys=Object.keys(word_arr[i]);
                                var guessed_word_keys=Object.keys(new_arr[i]);

                                for (var j = 0, k = word_keys.length; j < k; j++) {
                                }

                                for (var a = 0; a < 5; a++) {  
                                
                                    var id_key_pressed=new_arr[i][guessed_word_keys[2]];
                                    var id_guessed=new_arr[i][guessed_word_keys[3]];

                                    //if green
                                    if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] && 
                                    word_arr[a][word_keys[1]]==new_arr[i][guessed_word_keys[1]] ){
                                        color="green";
                                        if (color="green") {

                                            document.getElementById(id_key_pressed).style.backgroundColor="green";
                                            document.getElementById(id_guessed).style.backgroundColor="green";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;
                                        }

                                        break;
                                    }
                                }
                                color="";
                                test=0;
                            }
                        }else if(hard>=1){
                            result.value="";
                            enter_itt++;

                            for (var i = 0, l = word_arr.length; i < l; i++) {
                            console.log("word");
                            console.log(word_arr[i]);
                            console.log("new word");
                            console.log(new_arr[i]);
                            console.log("ARAAAAAY ");

                            console.log(word_arr.indexOf('O') >=1);

                            var word_keys=Object.keys(word_arr[i]);
                            var guessed_word_keys=Object.keys(new_arr[i]);

                            for (var j = 0, k = word_keys.length; j < k; j++) {
                            }

                            for (var a = 0; a < 5; a++) {  
                                var id_key_pressed=new_arr[i][guessed_word_keys[2]];
                                var id_guessed=new_arr[i][guessed_word_keys[3]];
                                if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] && 
                                word_arr[a][word_keys[1]]==new_arr[i][guessed_word_keys[1]] ){
                                    color="green";
                                    if (color="green") {
                                        
                                            document.getElementById(id_key_pressed).style.backgroundColor="green";
                                            document.getElementById(id_guessed).style.backgroundColor="green";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;

                                                hard++;
                                            break;

                                    }else{
                                        continue;
                                    }
                                        
                                }
                                var inc_test=0;
                                if(word_arr[a][word_keys[0]]==new_arr[i][guessed_word_keys[0]] ){
                                    color="yellow";
                                    id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                    id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;
                                   
                                    if (color="yellow" ) {
                                        if (id_key_pressed_color!="green" ) {
                                            document.getElementById(id_key_pressed).style.backgroundColor="yellow";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;


                                        }
                                        if (id_guessed_color!="green"){
                                            document.getElementById(id_guessed).style.backgroundColor="yellow";
                                            id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;
                                            
                                            $('#'+id_guessed).css("transition", "0.2s");

                                        }
                                        inc_test++;
                                        if(inc_test==5){
                                            break;
                                        }
                                    }else{
                                        continue;
                                    }
                                }

                                    
                                    if(word_arr[a][word_keys[0]]!=new_arr[i][guessed_word_keys[0]] ){
                                        console.log('turn red');
                                        color="red";
                                        id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;
                                        id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;

                                        if (color="red" ) {
                                            if (id_key_pressed_color=="var(--white)"  ) {
                                            
                                                document.getElementById(id_key_pressed).style.backgroundColor="red";
                                                id_key_pressed_color=document.getElementById(id_key_pressed).style.backgroundColor;

                                            }
                                            if (id_guessed_color=="var(--white)" ) {
                                            
                                                document.getElementById(id_guessed).style.backgroundColor="red";
                                                id_guessed_color=document.getElementById(id_guessed).style.backgroundColor;

                                            }
                                        
                                    }
                                }
                                

                            }

                            color="";
                            test=0;
                        }
                        }
                        

                        new_arr=[];
                        if(final_res==word_gen){
                            win=1;
                            $("#success_msg").html("Bravo!!");
                            $("#success_msg").fadeIn("fast");
                            save_player();
                        } 
                        else{
                            win=0;
                            $("#err_msg").html("You didn't Guessed. Try another one!!");
                            $("#err_msg").fadeIn("fast");

                            if(enter_itt==6){
                                enter_itt=7;
                                if(enter_itt==7){
                                    save_player();
                                }
                            }
                        }
                      
                        
            }
                    
        }
          function save_player(){
                var tri=enter_itt;
                var message='';
                
                if(tri==7){
                    tri=6;
                }
                if(ip_address==""){
                    ip_address="192.168.102.2";
                }

                switch (tri){
                    case 1:
                        message=" 1 try";
                        score = 1000;
                        break;
                    case 2:
                        message=" 2 tries";
                        score = 800;
                        break;
                    case 3:
                        message=" 3 tries";
                        score = 600;
                        break;
                    case 4:
                        message=" 4 tries";
                        score = 400;
                        break;
                    case 5:
                        message=" 5 tries";
                        score = 200;
                        break;
                    case 6:
                        message=" 6 tries";
                        score = 50;
                        break;
                }
                    $.ajax({
                        url: "player.php",
                        type: "POST",
                        data:{
                            player_ip_address:ip_address,
                            word_id:word_gen,
                            player_try:tri,
                            player_win:win,
                            player_score:score

                        },
                        cache: true,
                        success: function(data) {
                            save_player_stats();
                            if(win==1){
                                show_player_stats();
                                $('.stats_try').html("You did it in "+message+".");
                                $('.stats_score').html("New Prize "+score);
                                $('.success_modal').show('fast');
                            }else{
                                show_player_stats();
                                $('.failed_stats_try').html("You didn't Guess the word!");
                                $('.stats_score').html("Word : "+word_gen);

                                $('.failed_modal').show('fast');

                            }
                        }
                    
                    });
                }
                function save_player_stats(){
                    $.ajax({
                        url: "player_stats.php",
                        type: "POST",
                        data:{
                            player_ip_address:ip_address,
                            win:win,
                            score:score
                        },
                        cache: true,
                        success: function(data) {
                            
                        }
                
		        });
                }
                function show_player_stats(){
                    $.ajax({
                        url: "player_statistique.php",
                        type: "POST",
                        data:{
                            ip:ip_address
                        },
                        cache: true,
                        success: function(data) {
                            $('.player_stats').html(data);
                            
                        }
                
		        });
                }
        });
            


        
                
   
    
</script>
</body>
</html>