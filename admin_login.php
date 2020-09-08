<?php require("database.php");

	if(isset($_POST['login']) && $_POST['login'] == "Login")
{
	extract($_POST);


	if($username == 'admin' && $password =='123456')
	{
		//session_start();
		$_POST['login'] =true;
		$_SESSION['username']=$username;
		$_SESSION["user_id"] = 1;
		header("Location: http://localhost/library/admin_panel.php");
		exit;
	}
	else
	{

	header("Location: http://localhost/library/home.php");
	exit;
	}
}
?>

<html>
	<head>
	<title>Admin login</title>
	<link rel="stylesheet" href="style_1.css">
	</head>
	<body>

		<form method="post" action="admin_login.php">
				<h2>Admin Login</h2>

				<div class="container">
				<span class="error" style="color:red; font-weight:900;"><?php echo (isset($_GET['err'])?'Login incorrect':'');?></span>
				
				<br>
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<br>
				
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<br>
				
				
				<br>
				<input type="checkbox" checked="checked"> Remember me
				you agree to our <a href="#">Terms & Privacy</a>.</p>
				
				<div class="clearfix">
					<input class="loginbtn" type="submit" name="login" value="Login"><a href="http://localhost/library/home.php" class="cancelbtn">Cancel</a>
				</div>
			</div>
			</form>
			
	</body>
</html>