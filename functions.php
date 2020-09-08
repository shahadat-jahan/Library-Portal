<?php
function is_login()
{
	if(!isset($_SESSION["user_id"])){
	//user has no session, rediracte to login page
		header('Location: http://localhost/library/index.php');
	}	
}
function is_admin()
{
	if(!isset($_SESSION["username"]) || $_SESSION["username"] != "admin"){
	//user has no session, rediracte to admin login page
		header('Location: http://localhost/library/admin_login.php');
	}	
}

?>