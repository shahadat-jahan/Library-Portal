<?php
require("database.php");
?>

<html>

<head>
	<title>Signup</title>
	<link rel="stylesheet" href="style_1.css">
</head>

<body>

	<?php
	$usernameErr = $pswErr = $psw_repeatErr = $first_nameErr = $last_nameErr = $emailErr = $phoneErr = $genderErr = "";
	$username = $psw = $psw_repeat = $first_name = $last_name = $email = $phone = $gender = "";

	$has_error = false; //boolean type variable

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["username"])) {
			$usernameErr = "Username is required";
			$has_error = true;
		} else {
			$username = test_input($_POST["username"]);
			if (!preg_match("/^[a-z A-Z 0-9]*$/", $username)) {
				$usernameErr = "Only letter and number allowed";
				$has_error = true;
			} else {
				if (!IsUserTaken($username)) {
					$usernameErr = "Username already taken.";
					$has_error = true;
				}
			}
		}

		if (empty($_POST["psw"])) {
			$pswErr = "Password is required";
			$has_error = true;
		} else {
			$psw = test_input($_POST["psw"]);
			if (!preg_match("/^[a-z A-Z 0-9]*$/", $psw)) {
				$pswErr = "No white space allowed";
				$has_error = true;
			}
		}

		if (empty($_POST["psw_repeat"])) {
			$psw_repeatErr = "Repeat password is required";
			$has_error = true;
		} elseif ($_POST["psw"] != $_POST["psw_repeat"]) {
			$psw_repeatErr = "Password does not match";
			$has_error = true;
		} else {
			$psw_repeat = test_input($_POST["psw_repeat"]);
		}
		if (empty($_POST["first_name"])) {
			$first_nameErr = "First name is required";
			$has_error = true;
		} else {
			$first_name = test_input($_POST["first_name"]);
			if (!preg_match("/^[a-z A-Z]*$/", $first_name)) {
				$first_nameErr = "Only letter and white space allowed";
				$has_error = true;
			}
		}

		if (empty($_POST["last_name"])) {
			$last_nameErr = "Last name is required";
			$has_error = true;
		} else {
			$last_name = test_input($_POST["last_name"]);
			if (!preg_match("/^[a-z A-Z]*$/", $last_name)) {
				$last_nameErr = "Only letter and white space allowed";
				$has_error = true;
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$has_error = true;
		} else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$has_error = true;
			}
		}

		if (empty($_POST["phone"])) {
			$phoneErr = "Phone is required";
			$has_error = true;
		} else {
			$phone = test_input($_POST["phone"]);
		}

		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
			$has_error = true;
		} else {
			$gender = test_input($_POST["gender"]);
		}

		// echo "has_error=".$has_error;
		if (!$has_error) {
			register($username, $psw, $first_name, $last_name, $gender, $email, $phone);
		}
	}


	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h2>Registration form</h2>
		<p class="error">* required field.</p>
		<div class="container">
			<label><span class="error">* <?php echo $usernameErr; ?></span> Username</label><br>
			<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo $pswErr; ?></span> Password</label><br>
			<input type="password" placeholder="Enter Password" name="psw" value="<?php echo $psw; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo $psw_repeatErr; ?></span> Repeat Password</label><br>
			<input type="password" placeholder="Repeat Password" name="psw_repeat" value="<?php echo $psw_repeat; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo $first_nameErr; ?></span> First name</label><br>
			<input type="text" placeholder="First name" name="first_name" value="<?php echo $first_name; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo $last_nameErr; ?></span> Last name</label><br>
			<input type="text" placeholder="Last name" name="last_name" value="<?php echo $last_name; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo $emailErr; ?></span> Email</label><br>
			<input type="text" placeholder="Email " name="email" value="<?php echo $email; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo $phoneErr; ?></span> Phone</label><br>
			<input type="text" placeholder="Phone" name="phone" value="<?php echo $phone; ?>">

			<br>
			<br>

			<label><span class="error">* <?php echo "$genderErr"; ?></span> Gender</label><br>
			<input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="Male">Male
			<input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="Female">Female


			<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

			<div class="clearfix">
				<input class="signupbtn" type="submit" name="submit" value="Submit">
				<a href="admin_panel.php" class="cancelbtn">Cancel</a>
			</div>
		</div>
	</form>
</body>

</html>