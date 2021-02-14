<?php
    function data_inject($connention, $table, $results, $keys){
        // if table already exists
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
        $insert_qry= "INSERT INTO $table ($cols)\n
                        VALUES ($values)";
        
        if ($connention->query($insert_qry) === TRUE) {
            echo "New record created successfully<br>";
          } else {
            echo "Error: " . $insert_qry . "<br>" . $connention->error. "<br>";
          }
    }

    
    function create_db($db_name, $conn){
        $create_db = "CREATE DATABASE $db_name";
            if ($conn->query($create_db) === TRUE) {
            echo "Database created successfully <br>";
            return true;
            } else {
            echo "Error creating database: <br>" . $conn->error;
            return false;
            }
    }

    function create_table($table_name, $conn){
        $create_table = "CREATE TABLE $table_name(
            id INT AUTO_INCREMENT,
            f_name VARCHAR(20),
            l_name VARCHAR(20),
            age INT,
            gender VARCHAR(10), 
            edu VARCHAR(50), 
            edu_status VARCHAR(50),
            mail VARCHAR(50),
            PRIMARY KEY (id))";
        if (mysqli_query($conn, $create_table)) {
        echo "Table created successfully";
        return true;
        } else {
        echo "Error creating table: <br>" . $conn->error;
        return false;
        }
    }

    function update_table($table_name, $conn, $data){
        $qry= "UPDATE $table_name \nSET";
        $count= 0;
        $keys= array_keys($data);
        foreach ($keys as $key) {
            $count+=1;
            $sep= ',';
            // echo ($count);
            // echo count($keys);
            if($count- count($keys)==0){
                $sep= "";
            }
            $qry= "$qry $key = '$data[$key]'$sep";
        }

        $qry= "$qry\nWHERE id= 1;";
        
        // echo $qry;

        
        if (mysqli_query($conn, $qry)) {
        echo "Table created successfully";
        return true;
        } else {
        echo "Error creating table: <br>" . $conn->error;
        return false;
        }
    }

    function print_all($array){
        foreach($array as $element) {
            if($element!=null){
                $s = array_keys($array, $element);
                if($s!=null){
                    foreach($s as $a){
                        echo "<b>$a:</b> <i>$element</i><br>";
                    }
                }
            }                        
        }
    }

    function drop($conn, $table){
        if(mysqli_query($conn, "SELECT * FROM $table")===false){
            echo "<br>";
            echo "something is fishy<br> $conn->error";
        }else{
            $drop_table = "DROP TABLE $table";
            if (mysqli_query($conn, $drop_table)) {
            echo "Table dropped successfully";
            } else {
            echo "Error creating table: <br>" . $conn->error;
            }
        }
    }

    function write_json($fname, $array)
    {
        $fp= fopen("$fname", "w");
        fwrite($fp, json_encode(array_keys($array)));
        fclose($fp);
    }

    function read_json($fname)
    {
        $fp= fopen("$fname", "r");
        $f= fread($fp, filesize($fname));
        $array= json_decode($f, true);
        return $array;
        fclose($fp);
    }