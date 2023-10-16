<?php
	$server = "localhost";
    $username = "root";
    $password = "";
    $database = "test";
    // Подключение к базе данных через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
	$sql = $mysqli->query("SELECT `last_name` FROM `users` WHERE `first_name` = 1");
	while($row = mysqli_fetch_array($sql)){
		echo $row['last_name'];
	}
?>
 