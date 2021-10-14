<?php
// Include the database configuration file
include 'connection.php';

// Get images from the database
$query = $connection->query("SELECT * FROM uploads ORDER BY id DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["degree"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php }
echo "". mysqli_error($connection); ?>