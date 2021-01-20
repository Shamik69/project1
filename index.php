<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Information</title>
    <link rel="stylesheet" href="css/style0.css">
</head>
<body>
    <form action="">
        <!--name-->
        <p>Name</p>
        <label for="fname" class="lbl">First name:</label>
        <input type="text" id="fname" name="fname" class="bx" placeholder="First Name"><br><br>
        <label for="lname" class="lbl">Last name:</label>
        <input type="text" id="lname" name="lname" class="bx" placeholder="Last Name"><br><br>

        <!--age-->
        <label for="fname" class="lbl">Age (in digits):</label>
        <input type="text" id="fname" name="fname" class="bx" min="0" max="100" placeholder="Age"><br><br>

        <!--Gender-->
        <p>Gender</p>
        <input type="radio" name="male" id="male">
        <label for="male" class="lbl">Male</label><br><br>
        <input type="radio" name="Female" id="Female">
        <label for="Female" class="lbl">Female</label><br><br>
        <input type="radio" name="Other" id="Other">
        <label for="Other" class="lbl">Other</label><br><br>

        <!--Education-->
        <p>
        <label for="edu">Education</label>
        <select name="edu" id="edu" class="dd">
            <option value="null">[none]</option>
            <option value="u10">Persuing 10th</option>
            <option value="u12">Persuing 12th</option>
            <option value="uug">Persuing Undergraduate degeree</option>
            <option value="cug">Completed Undergraduate degeree</option>
            <option value="upg">Persuing Postgraduate degeree</option>
            <option value="cpg">Completed Postgraduate degeree</option>
        </select>
        </p>
        <br><br>

        <!--Email-->
        

        <!--Submit Button-->
        <input type="submit" value="Submit" class="lbl">
    </form>
</body>
</html>