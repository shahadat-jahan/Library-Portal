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
		border-radius: 5px;
	}

	.sideber{
		width: 300px;
		height: 620px;
		background: #2ecc71;
		float: left;
		border-radius: 5px;
	}

	.data{
		height: 600px;
		background-color: #3498db;
		color: white;
		font-size: 25px;
		padding: 10px;
		border-radius: 5px;
		overflow: auto;
	}

	.adminLogo{
		border-radius: 60px;
		width: 50px;
		height: 50px;
	}
	ul li{
		padding: 20px;
		border-bottom: 2px solid gray;
		border-radius: 5px;
	}
	ul li:hover{
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
		<a href=""><li>Delete Book</li></a>
		<a href="issue_book.php"><li>Issue Book</li></a>
		<a href="report.php"><li>Report</li></a>
		<a href="admin_logout.php"><li>Logout</li></a>
	</ul>
</div>

<div class="data"><br>
				<div>
					<center><h3>Book issue report</h3></center>

					<table border="1" cellpadding="5" cellspacing="0">
						<thead>
							<tr>
							<th>Issue ID</th>
							<th>Student Info</th>
							<th>Book Name</th>
							<th>Issue Date</th>
							<th>Return Date</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
					<?php 
					//if(1515450814 >1516054741) echo "Yes";	else echo "no";
						if(isset($_GET['status'])){
							if($_GET['status'] == 1){
							echo "<p style='color:green;'>".$_GET['msg']."</p>";
							}
							if($_GET['status'] == 0){
								echo "<p style='color:red;'>".$_GET['msg']."</p>";
							}
						}
						$IssueInfo = IssueInfo();	
			
					
    	// output data of each row
    	while($row = mysqli_fetch_assoc($IssueInfo)) {

    		$std_name = StudentInfo($row["user_id"]);
    		$book_name = BookInfo($row["book_id"]);

    		$current_date = time();
    		$returnDate = strtotime($row["return_date"]);
    		if($returnDate < $current_date)
        		$status = "<span style='color:red'><b>Late</b></span>";
        	else
        		$status = "<span style='color:green'><b>OK</b></span>";
        	echo "<tr><td>" . $row["id"]. "</td><td>" . $std_name. "</td><td>" . $book_name. "</td><td>" . $row["issue_date"]. "</td><td>" . $row["return_date"]."</td><td>" . $status."</td></tr>";
    	}
    	?></tbody>
    </table>
				
			</div>
		</div>
</body>
</html>






<!-- <?php require("database.php");
//$error_msg = "";


?>

<html>
	<head>
	<title>Report</title>
	<link rel="stylesheet" href="style_1.css">
	</head>
	<body>

			<h2>Report</h2>
			<div class="container">
				<div>
					<center><h3>Book issue report</h3></center>

					<table border="1" cellpadding="5" cellspacing="0">
						<thead>
							<tr>
							<th>Issue ID</th>
							<th>Student Info</th>
							<th>Book Name</th>
							<th>Issue Date</th>
							<th>Return Date</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
					<?php 
					//if(1515450814 >1516054741) echo "Yes";	else echo "no";
						if(isset($_GET['status'])){
							if($_GET['status'] == 1){
							echo "<p style='color:green;'>".$_GET['msg']."</p>";
							}
							if($_GET['status'] == 0){
								echo "<p style='color:red;'>".$_GET['msg']."</p>";
							}
						}
						$IssueInfo = IssueInfo();	
			
					
    	// output data of each row
    	while($row = mysqli_fetch_assoc($IssueInfo)) {

    		$std_name = StudentInfo($row["user_id"]);
    		$book_name = BookInfo($row["book_id"]);

    		$current_date = time();
    		$returnDate = strtotime($row["return_date"]);
    		if($returnDate < $current_date)
        		$status = "<span style='color:red'><b>Late</b></span>";
        	else
        		$status = "<span style='color:green'><b>OK</b></span>";
        	echo "<tr><td>" . $row["id"]. "</td><td>" . $std_name. "</td><td>" . $book_name. "</td><td>" . $row["issue_date"]. "</td><td>" . $row["return_date"]."</td><td>" . $status."</td></tr>";
    	}
    	?></tbody>
    </table>
				</div>
			</div>

	</body>
</html> -->