<?php
    include 'db.php';
    include 'credentials.php';
    $conn = new mysqli($server, $u_name, $pwd, $db_name);
    $qry= "SELECT * FROM $table1";
    $results= mysqli_fetch_array(mysqli_query($conn, $qry), MYSQLI_ASSOC);
    print_r($results);
