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
        $conn = new mysqli($server, $u_name, $pwd);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $qry = "CREATE DATABASE form";
        if ($conn->query($qry) === TRUE) {
        echo "Database created successfully";
        } else {
        echo "Error creating database: " . $conn->error;
        }

        $qry = "CREATE TABLE form_data";
        if ($conn->query($qry) === TRUE) {
        echo "Table created successfully";
        } else {
        echo "Error creating table: " . $conn->error;
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
</body>
</html>