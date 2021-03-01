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
        
        if(mysqli_query($conn, "SELECT * FROM $table0")===false){
            if (create_table($table0, $conn)){
            data_inject($conn, $table0, $results);
            }
            echo "<br>";
        } else{
            data_inject($conn, $table0, $results);
        }
        print_all($results);
        drop($conn, $table1);
        