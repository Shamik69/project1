<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form data</title>
</head>
<body>
    <?php
        $fname = $_POST['First name:'];
        $lname = $_POST['Last name:'];
        print("name: $fname $lname<br>");
        // print("age: $age <br>");
        // print("male: $male <br>");
        // print("female: $female")

    ?>
</body>
</html>