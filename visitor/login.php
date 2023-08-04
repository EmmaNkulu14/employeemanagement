
<?php

include_once "request.php";
include_once "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="bar">
    <h3 style="">Welcome</h3>
</div>
<section>
    <div class="container-login body-container">
        <form action="request.php" method="POST">
        <div class="input-group">
            <label>First name </label>
            <input type="text" placeholder="Username" name="username" required>
            <input type="hidden" id="id" name="id">
        </div>
        <div class="input-group">
            <label>Password </label>
            <input type="password" placeholder="*********" style="width: 280px;height: 30px;    border-radius: 5px;font-size: 18px;color: black" name="password" required>
        </div>
        <div class="input-group submit-button">
            <input type="submit" name="Login" value="Login">
        </div>
        <div class="input-group">
            <a style="font-weight: bold; float: right;padding-right: 200px;margin-top: 15px;" href="">Forgot password ?</a>
            <a style="font-weight: bold;float: right;padding-right: 10px;margin-top: 15px;" href="">Don't have an account?</a>
        </div>
        </form>
    </div>

</section>
</body>
</html>