    <?php
        include '../credentials.php';
        include '../db.php';
        $conn = new mysqli($server, $u_name, $pwd);
        
        $results= $_POST;
        
        if(mysqli_query($conn, "SELECT * FROM $table0")===false){
            if (create_table($table0, $conn)){
            data_inject($conn, $table0, $results);
            }
            echo "<br>";
        } else{
            data_inject($conn, $table0, $results);
        }
        drop($conn, $table1);
        echo json_encode($results);
        