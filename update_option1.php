<?php 

if (isset($_POST['submit'])){
	include('connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$desc=$_POST['description'];

$sql = "UPDATE learning_options SET name = '$name', description = '$desc' WHERE id =$id";
if($result = mysqli_query($connection,$sql))
{
	

    header("location:show_options.php"); // redirects to all records page 
   
    exit;

}
else
{
     echo "Error: " . mysqli_error($connection);
   
    
}}

?>