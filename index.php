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
        <input type="text" id="age" name="fname" class="bx" min="0" max="100" placeholder="Age"><br><br>

        <!--Gender-->
        <p>Gender</p>
        <input type="radio" name="male" id="male" class="btn">
        <label for="male" class="lbl">Male</label>
        <input type="radio" name="Female" id="Female" class="btn">
        <label for="Female" class="lbl">Female</label>
        <input type="radio" name="Other" id="Other" class="btn">
        <label for="Other" class="lbl">Other</label><br><br>

        <!--Education-->
        <label for="edu" class="lbl">Education</label>
        <select name="edu" id="edu" class="bx">
            <option value="null" id= "null">[none]</option>
            <option value="u10" id= "u10">Persuing 10th</option>
            <option value="u12" id= "u12">Persuing 12th</option>
            <option value="uug" id= "uug">Persuing Undergraduate degeree</option>
            <option value="cug" id= "cug">Completed Undergraduate degeree</option>
            <option value="upg" id= "upg">Persuing Postgraduate degeree</option>
            <option value="cpg" id="cpg">Completed Postgraduate degeree</option>
        </select>
        <br><br>

        <!--Email-->
        <label for="mail" class="lbl">Email address: </label>
        <input type="email" name="mail" id="mail" placeholder="E-mail" class="bx"><br><br>

        <!--file input-->
        <label for="file" class="lbl">Upload Your Marksheet Here</label><br>
        <input type="file" name="file" id="file"><br><br>

        <!--Submit Button-->
        <input type="submit" value="Submit" class="lbl" id= "Submit">
    </form>
</body>
</html>