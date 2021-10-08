<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php 
if (isset($_POST['submit'])) { 
	include('connection.php');
	// 3. Create variables to capture information from the form
	$ffirst_name = $_POST['ffirst_name'];
	$flast_name  = $_POST['flast_name'];
	$mfirst_name = $_POST['mfirst_name'];
	$mlast_name  = $_POST['mlast_name'];
	$gender     = $_POST['gender'];
	$date_of_birth = $_POST['date_of_birth'];
	$applicant_district = $_POST['applicant_district'];
	$applicant_sector = $_POST['applicant_sector'];
	$guardian_first_name = $_POST['guardian_first_name'];
	$guardian_last_name = $_POST['guardian_last_name'];
	$guardian_phone= $_POST['guardian_phone'];
	$guardian_district = $_POST['guardian_district'];
	$guardian_sector = $_POST['guardian_sector'];
    $learning_option_id = $_POST['learning_option_id'];
    $title_of_certificate = $_POST['title_of_certificate'];
    $national_id = $_POST['national_id'];
    $user_id= $_SESSION["user_id"] ;
   

	// 4. create variable for insert query
	$query = "INSERT INTO applicants(user_id, ffirst_name,	flast_name, mfirst_name,	mlast_name,	gender,
	 date_of_birth, applicant_district, applicant_sector, guardian_first_name, guardian_last_name, guardian_phone,  guardian_district, guardian_sector, learning_option_id, title_of_certificate,id_number) VALUES ('$user_id','$ffirst_name', '$flast_name', '$mfirst_name','$mlast_name','$gender', '$date_of_birth', '$applicant_district', '$applicant_sector', '$guardian_first_name', '$guardian_last_name', '$guardian_phone', '$guardian_district', '$guardian_sector', '$learning_option_id', '$title_of_certificate', '$national_id')";
 
	// 5. Execute the query like this: 

	if (mysqli_query($connection, $query) === true) {
		 $last_id= mysqli_insert_id($connection);
    
    $output_dir = "upload/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['degree']['name'][0]));
	$ImageType      = $_FILES['degree']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
	move_uploaded_file($_FILES["degree"]["tmp_name"][0],$output_dir."/".$NewImageName );
	     $sql = "INSERT INTO `uploads`(`degree`,applicant_id)VALUES ('$NewImageName','1')";
		if (mysqli_query($connection, $sql)) {
			echo "successfully !";
		}
		else {
		echo "Error: " . $sql . "" . mysqli_error($connection);
	 }

    }
    echo "".mysqli_error($connection);}
?>





