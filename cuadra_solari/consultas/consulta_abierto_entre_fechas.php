<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php");

  $fecha_1 = $_POST["fecha_inicio"];
  $fecha_2 = $_POST["fecha_final"];
  $query = "SELECT DISTINCT * FROM recursos WHERE fecha_apertura > '$fecha_1' AND fecha_apertura < '$fecha_2';";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>
  <table>
    <tr>
      <th>Numero</th>
      <th>Causa</th>
      <th>Area influencia</th>
      <th>Descripcion</th>
      <th>Fecha apertura</th>
      <th>Region tramitacion</th>
      <th>Comuna tramitacion</th>
      <th>Status</th>
      <th>Proyecto Asociado</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> <td>$p[8]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
