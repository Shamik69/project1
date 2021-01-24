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
        $fp= fopen('results.json', 'r');
        $json = fread($fp, filesize('results.json'));
        fclose($fp);
        echo gettype(json_decode($json));
        /*
        $results = json_decode($json);
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
        */
    ?>
</body>
</html>