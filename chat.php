<?php
	include 'connection/connection.php';

	$sql = "SELECT * FROM chat ORDER BY id DESC";
	$result = mysqli_query($con,$sql) or die ("Falha na consulta.");

	while($row = $result->fetch_array()){

		echo "
		<div id='chat-data'>
		<span style='color: green;'>$row[1] </span>
		<span style='color: red;'>$row[2]</span>
		<span style='float: right;'>$row[3]</span>
		</div>
		";
	}
?>