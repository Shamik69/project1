<?php
    include '../credentials.php';
    include '../db.php';
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
    drop($conn, $table1);