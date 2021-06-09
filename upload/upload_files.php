<?php 
	require 'config.php';
	if(isset($_FILES['uploader'])){
		$countfiles=count($_FILES['uploader']['name']);
		sort($_FILES['uploader']['name']);

		for ($i=0; $i <$countfiles ; $i++) { 
			$file_name=$_FILES['uploader']['name'][$i];
			$file_size=$_FILES['uploader']['size'][$i];
			$file_tmp=$_FILES['uploader']['tmp_name'][$i];
			$file_type=$_FILES['uploader']['type'][$i];
			$tmp=explode('.',$file_name);
			$file_ext=end($tmp);
			$extenstions=array("png");
			$file_name=strtolower(trim($file_name));
			$file_link=strtolower("upload/user/img/".$file_name.".png");

			move_uploaded_file($file_tmp,$file_link);

			$query="INSERT INTO user(img_user)
			VALUES('".$file_link."')";
			if (mysqli_query($link,$query)) {
				echo json_encode(array('b' => '1'));
			}else{
				echo json_encode(array('c' => '1'));
			}
		}
	}
 ?>