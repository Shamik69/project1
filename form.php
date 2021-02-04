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
        $keys= array_keys($_POST);
        $results= $_POST;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
                
        if ($conn-> select_db($db_name)===false){
            if (create_db($db_name, $conn) === TRUE) {
            echo "Database created successfully <br>";
            } else {
            echo "Error creating database: <br>" . $conn->error;
            }
        }else{
            $conn = new mysqli($server, $u_name, $pwd, $db_name);
        }

        if(mysqli_query($conn, "SELECT * FROM $table0")===false){
            if (create_table($table0, $conn)){
            data_inject($conn, $table0, $results);
            }
            echo "<br>";
        } else{
            data_inject($conn, $table0, $results);
        }
        foreach($results as $result) {
            if($result!=null){
                $s = array_keys($results, $result);
                if($s!=null){
                    foreach($s as $a){
                        echo "<b>$a:</b> <i class= cls>$result</i><br>";
                    }
                }
            }                        
        }
    ?>
    <br><br>
    <a href="index.php" class="cls" id="index">homepage</a>
</body>
</html>