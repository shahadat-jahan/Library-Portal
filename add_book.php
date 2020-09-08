<?php
		require("database.php");
?>


		<?php			
			$book_nameErr = $book_codeErr = $department_idErr = $category_idErr = $author_idErr = "";
			$book_name = $book_code = $department_id = $category_id = $author_id = "";

			$has_error = false;//boolean type variable

			if ($_SERVER["REQUEST_METHOD"] == "POST"){
				if (empty($_POST["book_name"])) {
					$book_nameErr = "Bookname is required";
					$has_error = true;
				}
				else {
					$book_name = test_input($_POST["book_name"]);
					
				}
				if (!preg_match("/^[a-z A-Z 0-9]*$/",$book_name)){
						$usernameErr = "Only letter and number allowed";
						$has_error = true;
					}else{
						if(!IsBookExists ($book_name)){							
							$usernameErr = "Book already store.";
							$has_error = true;
						}
					}
				
				
				if (empty($_POST["book_code"])) {
					$book_codeErr = "Bookcode is required";
					$has_error = true;
				}
				else {
					$book_code = test_input($_POST["book_code"]);
					
				}

				if (empty($_POST["department"])) {
					$department_idErr = "Department is required";
					$has_error = true;
				}
				else {
					$department_id = test_input($_POST["department"]);
				}

				if (empty($_POST["category"])) {
					$category_idErr = "Category is required";
					$has_error = true;
				}
				else {
					$category_id = test_input($_POST["category"]);
				}

				if (empty($_POST["author"])) {
					$author_idErr = "Author is required";
					$has_error = true;
				}
				else {
					$author_id = test_input($_POST["author"]);
				}

						

				 //echo "has_error=".$has_error;
				 
				if(!$has_error){
					AddBook($book_name, $book_code, $department_id, $category_id, $author_id);
				}
			}
			

			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		<?php if(isset($_GET['status'])){
			if($_GET['status'] == 1){
				echo "<p style='color:green;'>".$_GET['msg']."</p>";
			}
			if($_GET['status'] == 0){
				echo "<p style='color:red;'>".$_GET['msg']."</p>";
			}
		}
	?>
<head>
		<title>Book add</title>
		<link rel="stylesheet" href="style_1.css">
	</head>
	<div class="mainContent">
		<div class="content">
			<article class="topcontent">
								

				<content>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<header>
					<h2>Book add</h2>
				</header>
				<p class="error">* required field.</p>
				<div class="container">
					<label><span class="error">* <?php echo $book_nameErr;?></span> Book name</label><br>
					<input type="text" placeholder="Bookname" name="book_name" value="<?php echo $book_name;?>" >
					
					<br>
					<br>

					<label><span class="error">* <?php echo $book_codeErr;?></span> Book code</label><br>
					<input type="text" placeholder="Book code" name="book_code" value="<?php echo $book_code;?>" >
					
					<br>
					<br>
					
					<label><span class="error">* <?php echo $department_idErr;?></span> Department</label><br>
					
					<select name="department">
						<?php writeOptionList("department", $department_id, 'department')?>
					</select>
					
					<br>
					<br>

					<label><span class="error">* <?php echo $category_idErr;?></span> Category</label><br>
					
					<select name="category">
							<?php writeOptionList("category", $category_id, 'category')?>
						</select>

					<br>
					<br>

					<label><span class="error">* <?php echo $author_idErr;?></span> Author</label><br>
					
					<select name="author">
							<?php writeOptionList("author", $author_id, 'author')?>
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
