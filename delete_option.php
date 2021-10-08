<?php 

include('connection.php');

$id= $_GET['id']; // get id through query string

$sql = "DELETE FROM learning_options  WHERE id = $id";
if($result = mysqli_query($connection,$sql))
{
	

    // Close connection
    header("location:show_options.php"); // redirects to all records page 
   
    exit;

}
else
{
    echo "error during delete option <br>".$sql;
   
    
}
?>
