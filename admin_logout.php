<?php 
require("database.php");
		$_SESSION["username"] ="";///destroy session
	unset($_SESSION["username"]);
	session_destroy();	
		header('Location: http://localhost/library/home.php');
	exit;
?>