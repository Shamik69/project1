<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <link rel="stylesheet" href="style0.css">
</head>
<body>
    <form action="form.php" name="test" method="POST">
        <?php
            include 'credentials.php';
            include 'db.php';
            $conn = new mysqli($server, $u_name, $pwd);
            $keys= array_keys($_POST);
            $results= $_POST;

            if ($conn-> select_db($db_name)===false){
                if (create_db($db_name, $conn) === TRUE) {
                echo "Database created successfully <br>";
                } else {
                echo "Error creating database: <br>" . $conn->error;
                }
            }
            
            $conn = new mysqli($server, $u_name, $pwd, $db_name);

            if(mysqli_query($conn, "SELECT * FROM $table1")===false){
                if (create_table($table1, $conn)){
                data_inject($conn, $table1, $results);
                }
                echo "<br>";
            }

            print_all($results);
        ?>
        <input type="submit" value="Confirm" id= "Confirm" class="btn">
        <a href="index.php" id="resubmit">Resubmit</a>
    </form>
</body>
</html>