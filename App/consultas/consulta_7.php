<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion_2.php");

  $var = $_POST["ONG"];
  $query = "SELECT numero, proyecto, presupuesto, tipo, fecha FROM (SELECT * FROM movilizaciones WHERE movilizaciones.ong IN (SELECT nombre FROM ongs) ORDER BY ong, presupuesto DESC) AS todas WHERE ong LIKE '%$var%'";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Numero</th>
      <th>Proyecto</th>
      <th>Presupuesto</th>
      <th>Tipo</th>
      <th>Fecha</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
