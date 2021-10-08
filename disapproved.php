
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>
<body class="container">

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include('connection.php');
// Attempt select query execution
// $last_id=$_REQUEST['applicant_id'];
$sql = "SELECT applicants.applicant_id,applicants.ffirst_name, applicants.flast_name, applicants.mfirst_name, applicants.mlast_name, applicants.gender, applicants.date_of_birth, applicants.applicant_district, applicants.applicant_sector, applicants.guardian_first_name,applicants.guardian_last_name,applicants.guardian_phone, applicants.guardian_district,applicants.guardian_sector, applicants.level_of_education, applicants.title_of_certificate, applicants.id_number, users.user_first_name, users.user_last_name, users.user_email, users.user_phone, learning_options.name from applicants join users on applicants.user_id = users.user_id join learning_options on learning_options.id = applicants.learning_option_id and applicants.approval_status=2";
if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-hover'>";
        echo "<h3> Applicant information</h3";
            echo "<tr>";
                
                echo "<th colspan=2> APPLICANT NAMES</th>";
                echo "<th colspan=2> FATHER NAMES</th>";
                echo "<th colspan=2>MOTHER NAMES</th>";
                
                echo "<th>GENDER</th>";
                echo "<th>DATE OF BIRTH</th>";
                echo "<th>PHONE</th>";
                echo "<th>EMAIL</th>";
                echo "<th>APPLICANTDISTRICT</th>";
                echo "<th>APPLICANT SECTOR</th>";
                echo "<th colspan=2>GUARDIAN NAMES</th>";
                echo "<th>GUARDIAN PHONE</th>";
                echo "<th>GUARDIAN DISTRICT</th>";
                echo "<th>GUARDIAN SECTOR</th>";
                echo "<th>LEARNING OPTION</th>";
                
                echo "<th>LEVEL OF EDUCATION</th>";
                echo "<th>TITLE OF CERTIFICATE</th>";
                echo "<th>NATIONAL ID NUMBER</th>";
              ?>
                
                <th colspan="2">Action</th>

                <?php 
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
                echo "<td colspan=2>" . $row['user_first_name'] ." ".$row['user_last_name'] . "</td>";
                echo "<td colspan=2>" . $row['ffirst_name'] ." ".$row['flast_name'] . "</td>";
                echo "<td colspan=2>" . $row['mfirst_name'] ." ".$row['mlast_name'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['date_of_birth'] . "</td>";
                echo "<td>" . $row['user_phone'] . "</td>";
                echo "<td>" . $row['user_email'] . "</td>";
                echo "<td>" . $row['applicant_district'] . "</td>";
                echo "<td>" . $row['applicant_sector'] . "</td>";
                echo "<td colspan=2>" . $row['guardian_first_name'] ." ".$row['guardian_last_name'] . "</td>";

                echo "<td>" . $row['guardian_district'] . "</td>";
                echo "<td>" . $row['guardian_sector'] . "</td>";
               echo "<td>" . $row['guardian_phone'] . "</td>";
               echo "<td>" . $row['name'] . "</td>";
               echo "<td>" . $row['level_of_education'] . "</td>";

                echo "<td>" . $row['title_of_certificate'] . "</td>";
                echo "<td>" . $row['id_number'] . "</td>";
                
                ?>
                <td><a href="approve_applicant.php?id=<?php echo $row['applicant_id']; ?>">approve</a></td>
                <td>
                <a href="disapprove_applicant.php?id=<?php echo $row['applicant_id']; ?>">disapprove</a></td>
            <?php
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
 
// Close connection
mysqli_close($connection);
echo "</body>";
echo "</html>";
?>