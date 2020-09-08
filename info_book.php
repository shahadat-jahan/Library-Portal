<?php require("database.php");
		require("functions.php");
		is_admin();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
</head>
<body>

<style type="text/css">
	.header{
		width: 100%;
		height: 150px;
		background: black;
		color: white; 
		border-radius: 10px;
	}

	.sideber{
		width: 300px;
		height: 620px;
		background: #2ecc71;
		float: left;
		border-radius: 10px;
	}

	.data{
		height: 600px;
		background: #3498db;
		color: white;
		font-size: 25px;
		padding: 10px;
		border-radius: 10px;
	}

	.adminLogo{
		border-radius: 60px;
		width: 50px;
		height: 50px;
	}
	ul li{
		padding: 20px;
		border-bottom: 2px solid gray;
		border-radius: 10px;
	}
	ul li:hover {
		background: #3498db;
		color: white;
	}
	a{
		text-decoration: none;
		color: black;
	}
</style>

<div class="header">
	<center>
		<img src="download.png" alt="adminLogo" class="adminLogo"><br><h3>ADMIN DASHBOARD</h3><h4>This Admin Panel, Please procced with caution!</h4>
	</center>
</div>

<div class="sideber">
	<ul>
		<a href="admin_panel.php"><li>Home</li></a>
		<a href="signup.php"><li>Add User</li></a>
		<a href="delete_user.php"><li>Delete User</li></a>
		<a href="add_book.php"><li>Add Book</li></a>
		<a href="delete_book.php"><li>Delete Book</li></a>
		<a href="info_book.php"><li>Book Info</li></a>
		<a href="issue_book.php"><li>Issue Book</li></a>
		<a href="report.php"><li>Report</li></a>
		<a href="admin_logout.php"><li>Logout</li></a>
	</ul>
</div>

<div class="data"><br>
	<?php 
if(isset($_GET['status'])){
			if($_GET['status'] == 1){
				echo "<p style='color:white;'>".$_GET['msg']."</p>";
			}
			if($_GET['status'] == 0){
				echo "<p style='color:white;'>".$_GET['msg']."</p>";
			}
		}
	
	
	 
	
	?>
	
		</div>
</body>
</html>