<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form data</title>
    <link rel="stylesheet" href="style0.css">
</head>
<body>
    <?php
        foreach($_POST as $result) {
            if($result!=null){
                $s = array_keys($_POST, $result);
                if($s!=null){
                    foreach($s as $a){
                        echo "$a: $result <br>";
                    }
                }
            }                        
        }
        
    ?>
</body>
</html>