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
        $conn = new mysqli($server, $u_name, $pwd);
        $keys= array_keys($_POST);
        $results= $_POST;
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        function data_inject($connention, $table0, $results){
            $keys= array_keys($results);
            $cols= "";
            $values= "";
            foreach ($keys as $key) {
                if(count($keys)-array_search($key, $keys)!=1){
                    $cols= $cols."$key,";
                    if($results[$key]==null){
                        $values=  $values."'Unknown',";
                    }else{
                        $values=  $values."'$results[$key]',";
                    }
                }else{
                    $cols= $cols."$key";
                    if($results[$key]==null){
                        $values=  $values."'Unknown'";
                    }else{
                        $values=  $values."'$results[$key]'";
                    }
                }
            }
            $insert_qry= "INSERT INTO $table0 ($cols)\n
                            VALUES ($values)";
            
            if ($connention->query($insert_qry) === TRUE) {
                echo "New record created successfully<br>";
              } else {
                echo "Error: " . $insert_qry . "<br>" . $connention->error. "<br>";
              }
        }

        
        if ($conn-> select_db($db_name)===false){
            $create_db = "CREATE DATABASE $db_name";
            if ($conn->query($create_db) === TRUE) {
            echo "Database created successfully <br>";
            } else {
            echo "Error creating database: <br>" . $conn->error;
            }
        }else{
            $conn = new mysqli($server, $u_name, $pwd, $db_name);
        }

        if(mysqli_query($conn, "SELECT * FROM $table0")===false){
            $create_table = "CREATE TABLE $table0(
                f_name VARCHAR(20),
                l_name VARCHAR(20),
                age INT,
                gender VARCHAR(10), 
                edu VARCHAR(50), 
                edu_status VARCHAR(50),
                mail VARCHAR(50))";
            if (mysqli_query($conn, $create_table)) {
            echo "Table created successfully";
            data_inject($conn, $table0, $results);
            } else {
            echo "Error creating table: <br>" . $conn->error;
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