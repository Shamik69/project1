<?php
    include 'credentials.php';
    include 'db.php';
    if(!empty($_POST)){
        // print_r($_POST);
        $conn = new mysqli($server, $u_name, $pwd);
        $keys= array_keys($_POST);
        $results= $_POST;

        $x= 0;
        foreach(array_keys($results) as $key){
            $x +=strlen($results[$key]);

        }
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
        }else {
            drop($conn, $table1);
            create_table($table1, $conn);
            data_inject($conn, $table1, $results);
        }
    }