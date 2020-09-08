<?php 
		
		require("haeder.php");
	
	 if(isset($_SESSION["user_id"])){
		//echo 'ok';
	}else{
		header('Location: http://localhost/library/index.php');
	}
is_login();
// if(!isset($_SESSION["user_id"])){
// 	//user has no session, rediracte to login page
// 		header('Location: index.php');
// 	}
 
// 			 $user_info = user_info($_SESSION["user_id"]);//fuction call to user_info
// 			//print_r($user_info);
	
		?>
		
		<h2><?php if(isset($error_msg))echo $error_msg;?></h2>
		<div class="mainContent">
		<div class="content">
			<article class="topcontent">
	
	<header>
					<h2>Profile information</h2>
				</header>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
				<div class="container">
					<label>Username: </label>
					<?php echo $user_info['username'];?>
					<br>
					<br>
					<label>First name: </label>
					<?php echo $user_info['first_name'];?>
					<br>
					<br>
					<label>Last name: </label>
					<?php echo $user_info['last_name'];?>
					<br>
					<br>
					<label>Email: </label>
					<?php echo $user_info['email'];?>
					<br>
					<br>
					<label>Phone: </label>
					<?php echo $user_info['phone'];?>
					<br>
					<br>
					<label>Gender: </label>
					<?php echo $user_info['gender'];?>			
				</div>
			</form>
			</article>
	</div>
	</div>
	<?php 
		require("aside.php");
 
		require("footer.php");
		?>