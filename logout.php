<?php
require("database.php");
		$_SESSION["user_id"] ="";///destroy session
	unset($_SESSION["user_id"]);
	//session_destroy();	
		header('Location: http://localhost/library/index.php');
	
?>