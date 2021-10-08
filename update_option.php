  <?php 
// check if the form is submitted

   include('connection.php');
    $id=$_GET['id'];

echo"
<html>
    <head>
        
        <link rel='stylesheet' type='text/css' href='form.css'>
    </head>
    <body style='background-color: #ecf3fb; font-family: 'trebuchet MS','Lucida sans',Arial' ''>
        <div class='main'>";

        
       $sql = "SELECT * FROM learning_options where id=$id ";
       $result = mysqli_query($connection, $sql);
       $row = mysqli_fetch_array($result);
       echo "
            <form method='post' action='update_option1.php'>
                
                <p><h2><u>Learning option</u></h2></p>

                <p><label>Name:</label>";?>
                <input type="text" name="name"
                 value="<?php echo $row['name']; ?>" /></p>
                 <input type="text" name="id" style="display: none;"
                 value="<?php echo $row['id']; ?>"  /></p>
                <p><label>Description:</label>
                <textarea name="description"><?php echo $row['description']; ?></textarea><br>
                <br>
                <p><input type="submit" name="submit" value="update" />  </p>
                <br>  
            </form>   
        </div>

    </body>
</html>