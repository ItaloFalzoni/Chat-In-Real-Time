<?php
include 'connection/connection.php';

if (isset($_POST['submit'])){

	$name = $_POST['name'];
	$msg = $_POST['msg'];

	if ($name == "" and $msg == "") {
		echo "<script language='javascript' type='text/javascript'>window.alert('Preencha todos os campos.');</script>";
	}else{
		$insert = "INSERT INTO chat (name,msg) VALUES ('$name','$msg')";
		$insert_result = mysqli_query($con,$insert) or die ("Falha no envio da mensagem");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script>
		function ajax() {
			var request = new XMLHttpRequest();

			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {
					document.getElementById('chat').innerHTML = request.responseText;
				}
			}
			request.open('GET','chat.php',true);
			request.send();
		}
		setInterval(function(){ajax()},1000);
	</script>
</head>
<body onload="ajax()">
	<div id="container">
		<div id="chat-box">
			<h1 align="center">Chat in Real Time</h1><br>
			<div id="chat"></div>
		</div>

		<form action="index.php" method="post">
			<input type="text" name="name" placeholder="Enter your name">
			<textarea name="msg" placeholder="Enter a message"></textarea>
			<input class="submit" type="submit" name="submit" value="Submit">
		</form>
	</div>

</body>
</html>