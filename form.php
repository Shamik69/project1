<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form data</title>
</head>
<body>
    <?php
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $m = $_POST['gender'];    
        $mail = $_POST['mail'];
        $time = date('D/M/Y H:i:s');
        print("name: $fname $lname<br>");
        print("age: $age<br>");
        print("gender: $m <br>");
        print("mail: $mail");
        print("submit time: $time")
        
    ?>
</body>
</html>