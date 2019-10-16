<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="login-box">
    <h1>Elige tipo de Login</h1>
    <form method="post" action="login.php">
        <input type="submit" class="btn" value="Login como ONG" name="ong">
        <input type="submit" class="btn" value="Login como Socio" name="socio">
        <input type="submit" class="btn" value="Login anónimo" name="anonimo">
    </form>
</div>
</body>
</html>

<?php
session_start();
if($_POST['socio'])
{
    $$type = "socio_login";
    header("location:login.php");
}
elseif($_POST['ong'])
{
    $$type = "ong_login";
    header("location:login.php");
}
else
{
    $_SESSION['tipo'] = "anonimo";
    $$type = "anonimo";
    header("location:login.php");
}
?>