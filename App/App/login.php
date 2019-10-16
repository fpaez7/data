<?php
session_start();
require("config/conexion.php");
$redireccion = "index.php";


if(isset($_POST["login"]))
{
    if($_SESSION['tipo'] == "socio") {
        if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["clave"])) {
            $message = '<label>Los Socios requieren Nombre, Apellido y una Contraseña</label>';
        } else {
            $nombre = "'".$_POST["nombre"]."'";
            $apellido = "'".$_POST["apellido"]."'";
            $query = "SELECT * FROM socios WHERE nombre = $nombre AND apellido = $apellido";
            $statement = $db->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["apellido"] = $_POST["apellido"];
                $_SESSION["tipo"] = "socio";
                header("location:".$redireccion);
            } else {
                $message = '<label>Credenciales Incorrectas</label>';
            }
        }
    }
    elseif($_SESSION['tipo'] == "ong") {
        if (empty($_POST["nombre"]) || empty($_POST["clave"])) {
            $message = '<label>Las ONGs requieren Nombre y una Contraseña</label>';
        } else {
            $nombre = "'".$_POST["nombre"]."'";
            $query = "SELECT * FROM ongs WHERE nombre = $nombre";
            $statement = $db_2->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["tipo"] = "ong";
                header("location:".$redireccion);
            } else {
                $message = '<label>Credenciales Incorrectas</label>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<div class="login-box">
    <h1>Login</h1>
    <form method="post">
        <p>Nombre</p>
        <input type="text" name="nombre" placeholder="Nombre">
        <?php if($_SESSION['tipo'] == "socio")
        {
            echo '<p>Apellido</p>';
            echo '<input type="text" name="apellido" placeholder="Apellido">';
        }
        ?>
        <p>Contraseña</p>
        <input type="password" name="clave" placeholder="Contraseña">
        <input type="submit" name="login" value="Login">
    </form>
    <?php
    if(isset($message))
    {
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
</div>
</body>
</html>
