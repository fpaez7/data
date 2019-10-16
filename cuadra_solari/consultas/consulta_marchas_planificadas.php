<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php");

  $ano = $_POST["ano"];
  $f1 = $ano."-01-01";
  $f2 = $ano."-12-31";
  $query = "SELECT * FROM movilizaciones INNER JOIN movilizaciones_marchas ON movilizaciones.numero = movilizaciones_marchas.numero WHERE movilizaciones.fecha > TIMESTAMP '{$f1} 00:00:00' AND movilizaciones.fecha < TIMESTAMP '{$f2} 23:59:59';";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>
  <table>
    <tr>
      <th>Numero</th>
      <th>ONG</th>
      <th>Proyecto</th>
      <th>Presupuesto</th>
      <th>Tipo</th>
      <th>Fecha</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
