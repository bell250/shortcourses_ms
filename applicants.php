<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SHORTCOURSE MIS</title>
<link rel="stylesheet" type="text/css" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css ">  
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 

</head>
<body >
		<br><br><p> Fill this form to apply: </p>
<div class="container">
		<form name="new_applicant_form" action="applicant_controller.php" method="post" enctype="multipart/form-data">
		<label class="form-label"> Father First name:</label> <input type="text" name="ffirst_name" class="form-control">
		<label class="form-label"> Father Last name:</label><input type="text" name="flast_name" class="form-control">
		<label class="form-label"> Mother First name:</label> <input type="text" name="mfirst_name" class="form-control">
		<label class="form-label"> Mother Last name:</label><input type="text" name="mlast_name" class="form-control">
			 <label class="form-label">Gender: </label><br>
				<input class="form-check-input" type="radio" id="female" name="gender" value="Female">
				<label for="female">Female</label><br>
				<input  class="form-check-input" type="radio" id="male" name="gender" value="Male">
				<label for="male">Male</label><br>
			 <label class="form-label">Date of birth:</label> <input type="date" name="date_of_birth" class="form-control">
         <label class="form-label"> Applicant District:</label><input type="text" name="applicant_district" class="form-control">
         <label class="form-label"> Applicant Sector:</label><input type="text" name="applicant_sector" class="form-control">
         <label class="form-label"> Guardian First name:</label><input type="text" name="guardian_first_name" class="form-control">
         <label class="form-label"> Guardian Last name:</label><input type="text" name="guardian_last_name" class="form-control">
         <label class="form-label"> Guardian Phone number:</label><input type="text" name="guardian_phone" class="form-control">   
          <label class="form-label"> Guardian District:</label><input type="text" name="guardian_district" class="form-control">
         <label class="form-label"> Guardian Sector:</label><input type="text" name="guardian_sector" class="form-control">
				<?php
              $conn = new mysqli("localhost", "root","","short_courses_management") or die ('Cannot connect to db');
                  $result = $conn->query("select id,name from learning_options");
                 echo "<p><label>Learning option:</label></p>";
                 echo "<select name='learning_option_id' class='form-select'>";
                 while ($row = $result->fetch_assoc()) {
                 $id = $row['id'];
                 $name = $row['name'];
                 echo '<option value=" '.$id.'"  >'.$name.'</option>';
                             }
                  echo "</select>";
     
                         ?> 
         
       <label class="form-label">Level of Education </label>
				<select name="Level_of_education" class="form-select">
				    <option value="">-- select your level of education--</option>
					<option value="oLevel">Olevel</option>
					<option value="A2">Alevel</option>
					<option value="A1">Advanced diploma</option>
					<option value="A0">Bachelor</option>
				</select>
				<label class="form-label">Title of certificate: </label>   <input type="text" name="title_of_certificate" class="form-control">
				<label class="form-label">National ID: </label>   <input type="number" name="national_id" class="form-control">
			  <label class="form-label">Upload your National Id/Passport: </label>  
			   <input type="file" name="id_image" class="form-control">
			<label class="form-label">Upload your certificate/degree: </label> <input type="file" name="degree[]" class="form-control">
			<label class="form-label">Upload your passport photo: </label>   <input type="file" name="file" class="form-control">
			
			 
			
			
			<br><input  type="submit" name="submit" value="Submit" class="btn btn-primary"><br><br>
		</form>
	</div>
</body>
</html>