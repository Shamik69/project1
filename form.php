<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form data</title>
    <link rel="stylesheet" href="style0.css">
</head>

<body>
    <?php
        include 'credentials.php';
        include 'db.php';
        $conn = new mysqli($server, $u_name, $pwd);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
                
        if ($conn-> select_db($db_name)===false){
            if (create_db($db_name, $conn) === TRUE) {
            echo "Database created successfully <br>";
            } else {
            echo "Error creating database: <br>" . $conn->error;
            }
        }
        $conn = new mysqli($server, $u_name, $pwd, $db_name);

        $qry= "SELECT * FROM $table1";
        $results= mysqli_fetch_array(mysqli_query($conn, $qry), MYSQLI_ASSOC);
        $keys= keys_read("$conn");
        if(mysqli_query($conn, "SELECT * FROM $table0")===false){
            if (create_table($table0, $conn)){
            data_inject($conn, $table0, $results, $keys);
            }
            echo "<br>";
        } else{
            data_inject($conn, $table0, $results, $keys);
        }
        print_all($results);
        drop($conn, $table1);
    ?>
    <br><br>
    <a href="index.php" class="cls" id="index">homepage</a>
</body>

</html>