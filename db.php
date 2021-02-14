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

    function create_table($table_name, $conn, $id= true){
        $create_table = "CREATE TABLE $table_name(";
        if ($id) {
            $create_table= $create_table."id INT AUTO_INCREMENT,
                                          PRIMARY KEY (id)";
        }
        $create_table= $create_table."   
            f_name VARCHAR(20),
            l_name VARCHAR(20),
            age INT,
            gender VARCHAR(10), 
            edu VARCHAR(50), 
            edu_status VARCHAR(50),
            mail VARCHAR(50))";
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

    function read_json($fname){
        $fp= fopen("$fname", "r");
        $f= fread($fp, filesize($fname));
        $array= json_decode($f, true);
        return $array;
        fclose($fp);
    }

    function keys_write($array, $conn){
        $keys= array_keys($array);
        print_r($keys);
        $ltrs= range('a', 'z');
        // print_r($array);
        $qry_keys= "";
        $qry_values= "";
        $create_qry= "";
        for ($i=0; $i < count($keys); $i++){
            $sep= ",\n";
            if ($i === count($keys)-1){
                $sep= "";
            }
            $qry_keys= $qry_keys."key_$ltrs[$i]$sep";
            $qry_values= $qry_values."$keys[$i]$sep";
            $create_qry= $create_qry."key_$ltrs[$i] VARCHAR(20)$sep";

        }

        if (mysqli_query($conn, "SELECT * FROM keys")){
            echo "keys table already exists<br>";
            if( mysqli_query($conn, "DROP TABLE keys")){
                echo "dropped table keys<br>";
           }else {
               echo "error dropping keys $conn->error<br>";
           }
        }

        echo "CREATE TABLE `keys`($create_qry)<br><br>";
        if(mysqli_query($conn, "CREATE TABLE `keys`($create_qry)")){
            echo "table created successfully<br>";
        }else {
            echo "error creating table $conn->error<br>";
        }
        if(mysqli_query($conn, "INSERT INTO `keys` ($qry_keys)\nVALUES ($qry_values)")){
            echo "insereted data successfully<br>";
        }else {
            echo "error in inserting data $conn->error<br>";
        }
        
    }


    function keys_read($conn){
        $qry= "SELECT * FROM keys";
        $array= mysqli_fetch_array(mysqli_query($conn, $qry), MYSQLI_ASSOC);
        mysqli_query($conn, "DROP TABLE keys");
        return array($array);
    }