<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <link rel="stylesheet" href="style0.css">
</head>
<body>
    <form action="form.php" name="test" method="POST">
        <?php
            session_unset();
            $results = $_POST;
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
            $_SESSION['results'] = $results;
            $_SESSION['keys'] = array_keys($results);
        ?>
        <input type="submit" value="Confirm" id= "Confirm" class="btn">
        <a href="inddex.php">Resubmit</a>
    </form>
</body>
</html>