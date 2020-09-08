<?php
session_start();
$server = "localhost";
$db_name = "project";
$db_user = "root";
$db_pass = "";

// Create connection
$conn = new mysqli($server, $db_user, $db_pass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function register($username, $password, $first_name, $last_name, $gender, $email, $phone){
	global $conn;
	
	$sql = "INSERT INTO users (username, password, first_name, last_name, gender, email, phone)
	VALUES ('$username', md5($password), '$first_name', '$last_name','$gender', '$email', '$phone')";

	if ($conn->query($sql) === TRUE) {
	   header('Location: http://localhost/library/admin_panel.php?status=1&msg=Data added successfully!');
	   //echo "Data added successfully";
	   exit;
		} 
	else {
		header('Location: http://localhost/library/admin_panel.php?status=0&msg='. $conn->error);
		//echo "Something went wrong";
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

function AddBook($book_name, $book_code, $department_id, $category_id)
	{
	global $conn;
	
	 $sql = "INSERT INTO book (book_name, book_code, department_id, category_id)
	VALUES ('$book_name','$book_code','$department_id','$category_id')";

	if ($conn->query($sql) === TRUE) {
    header('Location: http://localhost/library/add_book.php?status=1&msg=New book added successfully!');
    exit;
	} else {
		header('Location: http://localhost/library/add_book.php?status=0&msg='. $conn->error);

	   exit;
	}

$conn->close();
}

function DeleteBook($book_id)
{
	global $conn;

	$sql = "DELETE FROM book WHERE id=$book_id";

if ($conn->query($sql) === TRUE) {
	echo "Data deleted successfully";
	header('Location: http://localhost/library/admin_panel.php?status=1&msg=Data deleted successfully!');
    exit;
} else {
    echo "Error deleting record: ". $conn->error;
    exit;
}

$conn->close();

}

function IssueBook($user_id, $book_id)
	{
	global $conn;
	$return_date = date("Y-m-d H:i:s",strtotime("+1 week"));
	$sql = "INSERT INTO book_issue (user_id, book_id, return_date)
	VALUES ('$user_id','$book_id', '$return_date')";

	if ($conn->query($sql) === TRUE) {
    header('Location: http://localhost/library/report.php?status=1&msg=New book issue successfully!');
    exit;
	} else {
		header('Location: http://localhost/library/issue_book.php?status=0&msg='. $conn->error);

	   exit;
	}

$conn->close();
}

function DeleteUser($user_id)
{
	global $conn;

	$sql = "DELETE FROM users WHERE id=$user_id";

if ($conn->query($sql) === TRUE) {
	echo "Data deleted successfully";
	header('Location: http://localhost/library/admin_panel.php?status=1&msg=Data deleted successfully!');
    exit;
} else {
    echo "Error deleting record: ". $conn->error;
    exit;
}

$conn->close();

}

function Book_info($book_name)
	{
		global $conn;
		$sql = "SELECT * FROM book WHERE book_name like '%".$book_name."%'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
			 echo $row['id']." ". $row['book_name'];
        	return $row;//array
    	}
		// return true;// echo "User OK";
	}else {
		//return false;
		echo "NO Book";
	}
}

function writeOptionList($table, $id, $fld)	{
	global $conn;
	$sql = "SELECT * FROM $table ORDER BY $fld asc";
	$result = $conn->query($sql);
	if(!$result)
	{
		echo "failed to open $table<p>";
		return false;
	}
	//If data exist
	while ($a_row = $result->fetch_assoc())
	{
		if($id == $a_row["id"])
			$selected = "SELECTED";
		else
			$selected = "";
		echo "<option $selected value='".$a_row["id"]."'>".$a_row[$fld]."</option>";
	}
}

function IsBookExists ($book_name){
	global $conn;
	$sql = "SELECT * FROM book WHERE book_name='". $book_name. "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return false;
	}else {return true;}
}

function IsUserTaken ($username){
	global $conn;
	$sql = "SELECT * FROM users WHERE username='". $username. "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return false;
	}else {
		return true;
	}
}

function login ($username, $password){
	global $conn;
	//$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."' limit 1";
	$sql = "SELECT id,username,password FROM users WHERE username='". $username."' AND password='". md5($password). "' limit 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			// print_r($row);
        	return $row;
    	}
		// return true;// echo "User OK";
	}else {
		return false;// echo "User NO";
	}
}
//user_info function decaleration
//argument user_id

function AdminLogin ($username, $password){
	global $conn;
	//$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".md5($password)."' limit 1";
	$sql = "SELECT username,password FROM users WHERE username='shahadat' AND password='123456' limit 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			// print_r($row);
        	return $row;
    	}
		// return true;// echo "User OK";
	}else {
		return false;// echo "User NO";
	}
}
//user_info function decaleration
//argument user_id

 
function StudentInfo ($user_id){
	global $conn;
	$sql = "SELECT * FROM users WHERE id =".$user_id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
    	$name = $row['first_name']." ". $row['last_name']."<br> Email: ". $row['email'];
    	return $name;
 	} 
	else {
    	return "";
	}
}

function BookInfo ($book_id){
	global $conn;
	$sql = "SELECT * FROM book WHERE id =".$book_id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
    	$name = $row['id']."-". $row['book_name'];
    	return $name;
 	} 
	else {
    	return "";
	}
}

function user_info ($user_id){
	global $conn;
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<center><h3></h3>Data Available!</h3></center><br>";
    	// output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
        	echo "Id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br><br>";
    	}
	} 
	else {
    	echo "<center><h3></h3>No user data found!</h3></center>";
}

mysqli_close($conn);


	// $sql = "SELECT * FROM users";
	// $result = $conn->query($sql);
	// if ($result->num_rows > 0) {
	// 	echo "<center><h3></h3>Data Available!</h3></center><br>";
	// 	while($row = $result->fetch_assoc()) {
	// 		//print_r($row);
	// 		echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	// 		//return $row;//array
        	
 //    	}
	// 	// return true;// echo "User OK";
	// }else {
	// 	//return false;
	// 	echo "<center><h3></h3>No user data found!</h3></center>";
	// }
}

function IssueInfo (){
	global $conn;
	$sql = "SELECT * FROM book_issue ORDER BY issue_date DESC";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		return $result;
		
	} 
	else {
    	echo "<center><h3></h3>No user data found!</h3></center>";
}

mysqli_close($conn);
}
