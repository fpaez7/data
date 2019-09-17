<?php include('../templates/header.html');   ?>

<body>
  <h2 align="center">Recursos asocioados a minas, entre "fecha_inicio" y "fecha_termino"</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $desde = $_POST["Desde"];
  $desde = intval($desde);

  $hasta= $_POST["Hasta"];
  $hasta = intval($hasta);

  $query = "SELECT * FROM recursos"

?>
$result = $db -> prepare($query);
$result -> execute();
$pokemones = $result -> fetchAll();
?>

<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Altura</th>
  </tr>

    <?php
      foreach ($pokemones as $p) {
        echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
    }
    ?>

</table>

<?php include('../templates/footer.html'); ?>
</html>
