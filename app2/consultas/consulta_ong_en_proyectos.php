<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php");

  $var = $_POST["proyecto"];
  $query = "SELECT ongs.nombre, ongs.pais, ongs.descripcion FROM ongs INNER JOIN recursos_ongs ON ongs.nombre = recursos_ongs.nombre WHERE recursos_ongs.numero IN (SELECT numero FROM recursos WHERE nombre_proyecto LIKE '%$var%')";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre ONG</th>
      <th>Pais</th>
      <th>Descripcion</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
