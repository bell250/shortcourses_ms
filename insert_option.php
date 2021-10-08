<?php 
// check if the form is submitted
if (isset($_POST['submit'])) { 
	include('connection.php');

	// 3. Create variables to capture information from the form
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	
	// 4. create variable for insert query
	$query = "INSERT INTO learning_options(name,description) VALUES ('$name',
	  '$description')";
 
	// 5. Execute the query like this: 

	if (mysqli_query($connection, $query) === true) {
		
		echo "New option added";
		
	} else {
		echo "ERROR: There was a problem" . mysqli_error($connection);
	}
	
	// Close connection
	mysqli_close($connection);
}
?>