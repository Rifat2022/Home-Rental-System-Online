<?php

$conn = "";

try {
	$servername = "localhost";
	$dbname = "bari_vara_online_system";
	$username = "root";
	$password = "";

	$conn = new PDO(
		"mysql:host=$servername; dbname=bari_vara_online_system",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
