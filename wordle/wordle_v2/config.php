<?php 

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','wordle');

$link=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//Check connection 
if($link === false){
	die("ERROR: could not connect. " .mysql_error());

}

 ?>