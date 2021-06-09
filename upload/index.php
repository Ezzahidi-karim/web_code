<!DOCTYPE html>
<html>
<head>
	<title>Upload multiple files to database </title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<script>
	$(document).ready(function(){
		$("#upload_btn").click(function(){
			var form_data=new FormData();
			var ins=document.getElementById('uploader').files.length;
			for(var x=0; x<ins;x++){
				form_data.append("uploader[]",document.getElementById('uploader').files[x]);
			}
			var other_data=$('#form_upload').serializeArray();
			$.each(other_data,function(key,input){
				form_data.append(input.name,input.value);
			});

			$.ajax({
				url:'upload_files.php',
				type:'post',
				cache:false,
				data:form_data,
				processData:false,
				contentType:false,
				success:function(response){
					if (response[2]=='b') {
						alert('Upload Success');
					}else{
						alert('Upload Failed');
					}
				},
			});
		});
	});
</script>
<body>
	<div class="content">
		<form id="form_upload" method="post" action="<?php htmlspecialchars($SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
			<input class="form-control" type="file" id="uploader" name="uploader[]" value="uploader" multiple></input><br>
			<input class="buttons" type="submit" id="upload_btn" name="upload_btn" onclick="return false;" value="Upload"></input>
		</form>
	</div>
</body>
</html>