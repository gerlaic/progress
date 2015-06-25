<?php
$name = $_POST["name"];
$password = $_POST["password"];

$userdata=file("users.sj",FILE_IGNORE_NEW_LINES);
foreach ($userdata as $user) {
	list($userName, $userPass) = explode(":",$user);
	if ($userName == $name) {
		if ($userPass == $password) {
			session_start();
			$_SESSION["name"]=$name;
			
			header("Location: progress.php");
			die();
		} else {
			header("Location: index.php");
			die();
		}
	} else {
		header("Location: index.php");
		die();
	}
}
?>