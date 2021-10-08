<?php 

if($_SERVER["REQUEST_METHOD"]== "POST"){
include('connection.php');
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$type = $_POST['user_type'];
$user_name = $_POST['username'];
$password = $_POST['password'];
	
	$id="";
	// 4. create variable for insert query
	$query = "INSERT INTO users VALUES 
	('$id','$first_name','$last_name','$email','$phone','$type','$user_name','$password')";
	  
	  
 
	// 5. Execute the query like this: 

	if (mysqli_query($connection, $query) === true) {
		
		echo "your account created well now you can login with your user name and password";
		include ('login.html');
		
	} else {
		echo "ERROR: There was a problem" . mysqli_error($connection);
	}
	
	// Close connection
	mysqli_close($connection);
}
?>	
 
