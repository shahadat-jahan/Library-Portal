<?php 
		require("haeder.php");
	// if(isset($_SESSION["user_id"])){
	// 	echo 'ok';
	// }else{
	// 	echo 'no';
	// }

// if(isset($_SESSION["user_id"])){
// 		//echo 'ok';
// 	}else{
// 		header('Location: http://localhost/library/index.php');
// 	}

if(!isset($_SESSION["user_id"])){
	//user has no session, rediracte to login page
		header('Location: index.php');
	}	
	 
	 DeleteBook($book_id);
		?>
		
		<div class="mainContent">
		<div class="content">
			<article class="topcontent">
	
				<header>
					<h2>Book information</h2>
				</header>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
				<div class="container">
					<label>Book name: </label>
					<?php echo $book_info['book_name'];?>
					<br>
					<br>
					<label>Book code: </label>
					<?php echo $book_info['book_code'];?>
					<br>
					<br>
					<label>Department: </label>
					<?php echo $book_info['department_id'];?>
					<br>
					<br>
					<label>Category: </label>
					<?php echo $book_info['category_id'];?>
					<br>
					<br>
					<input type="submit" value="Delete" name="">			
				</div>
			</form>
			</article>
	</div>
	</div>
	<?php 
		require("aside.php");
 
		require("footer.php");
		?>