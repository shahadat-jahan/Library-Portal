<?php require("database.php");
//$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	// $user_info = user_info($_SESSION["user_id"] );
	$user_info = login($_POST["username"], $_POST["psw"]);
	if(is_array($user_info) && count($user_info)>0){
		$_SESSION["user_id"] = $user_info['id'];///store user id into SESSION
		// $_SESSION["email"] = $user_info['email'];
		
		header('Location: http://localhost/library/home.php');
	}else{
		$error_msg = "Username or passwrod incorrect.";
	}
}
?>

<html>
	<head>
	<title>login</title>
	<link rel="stylesheet" href="style_1.css">
	</head>
	<body>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<h2>Login</h2>
				<div class="container">
				<span class="error"><?php if(isset($error_msg))echo $error_msg;?></span>
				<br>
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<br>
				
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<br>
				
				
				<br>
				<input type="checkbox" checked="checked" > Remember me
				<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
				
				<div class="clearfix">
					<input class="loginbtn" type="submit" name="submit" value="Login">
					<a href="signup.php" class="signupbtn">Signup</a>
				</div>
			</div>
			</form>
			
	</body>
</html>