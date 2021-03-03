<?php

    /*
    error code
    0: empty input

    */
    include '../credentials.php';
    include '../db.php';
    if(!empty($_POST)){
        // print_r($_POST);
        $conn = new mysqli($server, $u_name, $pwd);
        $keys= array_keys($_POST);
        $results= $_POST;

        if ($conn-> select_db($db_name)===false){
            create_db($db_name, $conn);
        }
        
        $conn = new mysqli($server, $u_name, $pwd, $db_name);

        if(mysqli_query($conn, "SELECT * FROM $table1")===false){
            if (create_table($table1, $conn)){
                data_inject($conn, $table1, $results);
            }
        }else {
            drop($conn, $table1);
            create_table($table1, $conn);
            data_inject($conn, $table1, $results);
        }
        $qry= "SELECT * FROM $table1";
        $result= mysqli_fetch_array(mysqli_query($conn, $qry), MYSQLI_ASSOC);
        echo json_encode($result);
    }else {
        echo json_encode(0);
    }