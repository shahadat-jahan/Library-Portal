<?php require("database.php");?>

<html>
	
	<head>
		<title>Delete Book</title>
		<link rel="stylesheet" href="style_1.css">
	</head>

	<body>
		<?php
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
			if ($_POST["submit"] == "Delete info"){
				$book_id = DeleteBook($_POST["book_id"]);
			
			}
		}
			
		?>
		

		<form method="post" action="delete_book.php">
				
			<h2>Give ID to delete the book data</h2>
			<div class="container">
				<label>ID: </label><br>
				<input type="text" placeholder="Book ID" name="book_id">
					
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