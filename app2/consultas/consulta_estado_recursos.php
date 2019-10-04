<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php");

  $var = $_POST["estado"];
  $query = "SELECT DISTINCT region_de_tramitacion FROM recursos WHERE (status LIKE '%en tramite%' OR status LIKE '%aprobado%')";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Region de tramitación</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
