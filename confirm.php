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
        ?>
        <input type="submit" value="Confirm" id= "Confirm" class="btn">
    </form>
</body>
</html>