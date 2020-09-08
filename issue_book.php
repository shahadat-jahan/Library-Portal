<?php
		require("database.php");
			
			
			$book_id = $user_id = "";

			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
				if (empty($_POST["book_name"])) {
					echo "Bookname is required";
					
				}
				else {
					$book_id = test_input($_POST["book_name"]);
					
				}
				if (empty($_POST["username"])) {
					echo "User name is required";
				}
				else {
					$user_id = test_input($_POST["username"]);
					}
					
						IssueBook($user_id, $book_id);
					
				}
			 function test_input($data){
			 	$data = trim($data);
			 	$data = stripcslashes($data);
			 	$data = htmlspecialchars($data);
			 	return $data;
			 }
	 if(isset($_GET['status'])){
			if($_GET['status'] == 1){
				echo "<p style='color:green;'>".$_GET['msg']."</p>";
			}
			if($_GET['status'] == 0){
				echo "<p style='color:red;'>".$_GET['msg']."</p>";
			}
		}
	?>
<head>
		<title>Book issue</title>
		<link rel="stylesheet" href="style_1.css">
	</head>
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
								

				<content>
			<form method="post" action="issue_book.php">
				<header>
					<h2>Book issue</h2>
				</header>
				<div class="container">
					<label>User name</label><br>
					<select name="username">
						<?php writeOptionList("users", $user_id, 'username')?>
					</select>
					
					<br>
					<br>

					<label>Book name</label><br>
					<select name="book_name">
						<?php writeOptionList("book", $book_id, 'book_name')?>
					</select>

					<br>
					<br>
					
					
					<div class="clearfix">
						<input class="signupbtn" type="submit" name="submit" value="Submit">
						<a href="admin_panel.php" class="cancelbtn">Cancel</a>		
					</div>
				</div>
			</form>	
			</content>
			</article>
			</div>
			</div>		
	</body>
</html>
