<?php
session_start();
if($_POST['socio'])
{
    $_SESSION['tipo'] = "socio";
    header("location:login.php");
}
elseif($_POST['ong'])
{
    $_SESSION['tipo'] = "ong";
    header("location:login.php");
}
else
{
    $_SESSION['tipo'] = "anonimo";
    header("location:index.php");
}
?>