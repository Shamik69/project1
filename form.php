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
        $server= "127.0.0.1";
        $u_name = "Shamik";
        $pwd = "shamikpal2000";
        $db_name= 'form';
        $table = "form_data";
        $conn = new mysqli($server, $u_name, $pwd);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        function data_inject($connention, $table){
            $fp0 = fopen('keys.json', 'r');
            $json0 = fread($fp0, filesize('results.json'));
            fclose($fp0);

            $fp1= fopen('results.json', 'r');
            $json1 = fread($fp1, filesize('results.json'));
            fclose($fp1);

            $keys= json_decode($json0, true);
            $results= json_decode($json1, true);

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
                    if($results[$key]==null){
                        $cols= $cols."$key";
                        $values=  $values."'Unknown'";
                    }else{
                        $values=  $values."'$results[$key]'";
                    }
                }
            }
            $insert_qry= "INSERT INTO $table ($cols)\n
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

        if(mysqli_query($conn, "SELECT * FROM $table")===false){
            $create_table = "CREATE TABLE $table(
                f_name VARCHAR(20),
                l_name VARCHAR(20),
                age INT,
                gender VARCHAR(10), 
                edu VARCHAR(50), 
                edu_status VARCHAR(50),
                mail VARCHAR(50))
                form VARCHAR(100)";
            if (mysqli_query($conn, $create_table)) {
            echo "Table created successfully";
            data_inject($conn, $table);
            } else {
            echo "Error creating table: <br>" . $conn->error;
            }
            echo "<br>";
        } else{
            data_inject($conn, $table);
        }

        $fp= fopen('results.json', 'r');
        $json = fread($fp, filesize('results.json'));
        fclose($fp);
        //echo json_decode($json);
        $results = json_decode($json, true);
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
    <a href="index.php" class="cls">homepage</a>
</body>
</html>