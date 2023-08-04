<?php



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="bar">
    <h3 style="">Welcome</h3>
</div>
<section>
<div class="container body-container">
<div class="input-group">
    <label>First name </label>
    <input type="text" placeholder="First name" name="fname" required>
</div>
    <div class="input-group">
        <label>last name </label>
        <input type="text" placeholder="Last name" name="lname" required>
    </div>
    <div class="input-group">
        <label>Phone number </label>
        <input type="text" placeholder="+91....80" name="phone" required>
    </div>
    <div class="input-group">
        <label>Nationality </label>
        <select id="countries" name="countries">
            <option> Germany</option>
            <option> Spain</option>
            <option> France</option>
        </select>
    </div>
    <div class="input-group">
        <label>City of birth </label>
        <select id="city" name="city_of_birth">
            <option> Paris</option>
            <option> Munich</option>
            <option> Barcelona</option>
        </select>
    </div>
    <div class="input-group">
        <label>Date of birth </label>
        <input type="date"  name="birthday" required>
    </div>
    <div class="input-group">
        <label>Email </label>
        <input type="text" placeholder="example@gmail.com" name="email" required>
    </div>

    <div class="input-group">
        <label>Password </label>
        <input type="text" placeholder="**********" name="password" required>
    </div>
<div class="input-group submit-button">
    <input type="submit" value="Submit">
</div>
</div>
</section>
</body>
</html>