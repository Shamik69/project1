<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Submit Your Information</title>
    <link rel="stylesheet" href="style0.css">
</head>

<body>
    <div id="form" class="divs">
        <form name="test" method="POST">
            <!--name-->
            <p>Name</p>
            <label for="fname" class="lbl">First name:</label>
            <input type="text" id="fname" name="f_name" class="bx" placeholder="First Name">
            <br><br><label for="lname" class="lbl">Last name:</label>
            <input type="text" id="lname" name="l_name" class="bx" placeholder="Last Name"><br><br>



            <!--age-->
            <label for="age" class="lbl">Age (in digits):</label>
            <input type="text" id="age" name="age" class="bx" min="0" max="100" placeholder="Age"><br><br>

            <!--Gender-->
            <p>Gender</p>
            <input type="radio" name="gender" id="male" value="male">
            <label for="male" class="lbl">Male</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female" class="lbl">Female</label>
            <input type="radio" name="gender" id="other" value="other">
            <label for="other" class="lbl">Other</label><br><br>


            <!--Education-->
            <label for="edu" class="lbl">Education</label>
            <select name="edu" id="edu" class="bx">
                <option value="null" id="null">[none]</option>
                <option value="10th boards" id="u10">10th</option>
                <option value="12th boards" id="u12">12th</option>
                <option value="graduation" id="ug">Undergraduate degree</option>
                <option value="post-graduation" id="pg">Postgraduate degree</option>
            </select>
            <br><br>

            <!--Degree type-->
            <input type="checkbox" name="edu_status" id="chk0" value="studying">
            <label for="chk0" class="lbl">Studying</label>
            <br>
            <input type="checkbox" name="edu_status" id="chk1" value="has a job">
            <label for="chk1" class="lbl">Have a job</label>
            <br><br><br>



            <!--Email-->
            <label for="mail" class="lbl">Email address:</label>
            <input type="email" name="mail" id="mail" placeholder="E-mail" class="bx"><br><br>

            <!--file input
            <label for="file" class="lbl">Upload Your Marksheet Here</label><br>
            <input type="file" name="file" id="file"><br><br>-->



            <!--Submit Button-->
            <input type="submit" value="Submit" id="Submit">
        </form>
    </div>
    <div id="confirmation" class="divs">
        <?php
            include 'credentials.php';
            include 'db.php';
            if(!empty($_POST)){
                    $conn = new mysqli($server, $u_name, $pwd);
                    $keys= array_keys($_POST);
                    $results= $_POST;

                    if ($conn-> select_db($db_name)===false){
                        if (create_db($db_name, $conn) === TRUE) {
                        echo "Database created successfully <br>";
                        } else {
                        echo "Error creating database: <br>" . $conn->error;
                        }
                    }
                    
                    $conn = new mysqli($server, $u_name, $pwd, $db_name);
                    
                    keys_write($results, $conn);
                    if (!create_table($table1, $conn)){
                            data_inject($conn, $table1, $results, $keys);
                        }else {
                            update_table($table1, $conn, $results);
                        }
                    echo "<br>";

                    print_all($results);
            }
            ?>
        <a href="form.php" id="Confirm">Confirm</a>
    </div>
</body>

</html>