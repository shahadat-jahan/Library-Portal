<?php require("database.php");?>

<html>
	
	<head>
		<title>Delete User</title>
		<link rel="stylesheet" href="style_1.css">
	</head>

	<body>
		<?php
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
			if ($_POST["submit"] == "Delete info"){
				$user_id = DeleteUser($_POST["user_id"]);
			
			}
		}
			
		?>
		

			<form method="post" action="delete_user.php">
				
				<h2>Give ID to delete the user data</h2>
				<div class="container">
					<label>ID: </label><br>
					<input type="text" placeholder="User ID" name="user_id">
					
					<br>
					<br>

					<div class="clearfix">
						<input class="signupbtn" type="submit" name="submit" value="Delete info">
						<a href="admin_panel.php" class="cancelbtn">Cancel</a>		
					</div>
				</div>
			</form>	

					
	</body>
</html>	