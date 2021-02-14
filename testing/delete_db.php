<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            include 'C:\xampp\htdocs\project1\credentials.php';
            $conn = new mysqli($server, $u_name, $pwd, $db_name);
            if ($conn->connect_error) {
                echo "connection error<br>";
                die("Connection failed: " . $conn->connect_error);
            }
            
            if(mysqli_query($conn, "SELECT * FROM $table1")===false){
                echo "<br>";
                echo "something is fishy<br> $conn->error";
            }else{
                $drop_table = "DROP TABLE $table1";
                if (mysqli_query($conn, $drop_table)) {
                echo "Table dropped successfully";
                } else {
                echo "Error creating table: <br>" . $conn->error;
                }
                
            }
    ?>
</body>
</html>