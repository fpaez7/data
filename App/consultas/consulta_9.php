<body>

  <?php
  require("../config/conexion.php");
  $query2 = "SELECT *
  FROM Recursos";

  $result = $db_2 -> prepare($query2);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre</th>
      <th>generador</th>
      <th>operativo</th>
      <th>operativo</th>
      <th>operativo</th>
      <th>operativo</th>
      <th>operativo</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
