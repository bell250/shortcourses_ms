
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
$sql = "SELECT * FROM learning_options ";
if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=1 class='table table-hover'";
        echo "<h3>LIST OF ALL OPTIONS</h3";
            echo "<tr>";
                
                echo "<th>NAME</th>";
                echo "<th>DESCRIPTION</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                                                           ?>
                <td><a href="delete_option.php?id=<?php echo $row['id']; ?>"">delete</a>&nbsp;&nbsp;&nbsp;<a href="update_option.php?id=<?php echo $row['id']; ?>"">edit</a></td>
            
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