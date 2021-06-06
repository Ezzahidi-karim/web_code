<!DOCTYPE html>
<html>
<head>
	<title>Textarea styling</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
</head>
<body>
	<div class="container">
		<form>
			<label class="labels">Description</label><br>
			<div class="textarea_style">
				<textarea class="textarea" id="textarea" onkeyup="charCount();" name="textarea_description" rows="4" cols="37" maxlength="100" minlength="3" placeholder="Write your description here..."></textarea>
			</div>
			<span class="textarea_count" id="textarea_count">0/100 (Max Character 100)</span>
		</form>
	</div>
	<script type="text/javascript">
		function charCount(){
			var element=document.getElementById('textarea').value.length;
			document.getElementById('textarea_count').innerHTML=element+"/100 (Max Character 100).";
		}
	</script>
</body>
</html>