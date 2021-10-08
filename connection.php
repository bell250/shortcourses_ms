<?php 
	// 1. Create a new connection to the server and to the database
	$connection = mysqli_connect('localhost', 'root', '','short_courses_management');

	// 2. Test if the connection works
	if($connection === false){
		die("An error has occured: " . mysqli_connect_error());
	}
	?>