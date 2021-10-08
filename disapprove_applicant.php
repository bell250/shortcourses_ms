<?php 

include 'connection.php';

$id= $_GET['id']; // get id through query string

$sql = "UPDATE applicants SET approval_status=2  WHERE applicant_id = $id";
if($result = mysqli_query($connection,$sql))
{
	

    //header("location:show_applicant.php"); // redirects to all records page 
   
    header("location:show_applicants.php");

}
else
{
    echo "error during approval <br>". mysqli_error($connection);
   
    
}
?>
