<body>

  <?php
  require("../config/conexion_2.php");

  $var = $_POST["tipo"];
  $query = "SELECT nombre, ONG, presupuesto, tipo, fecha FROM (SELECT * FROM proyectos WHERE nombre IN (SELECT nombre_proyecto FROM recursos INNER JOIN recursos_en_tramite ON recursos.numero = recursos_en_tramite.numero)) AS proyectos_validos, (SELECT * FROM movilizaciones INNER JOIN movilizaciones_marchas ON movilizaciones.numero = movilizaciones_marchas.numero WHERE CURRENT_DATE < fecha) AS mov_marchas WHERE proyectos_validos.nombre = mov_marchas.proyecto UNION SELECT nombre, ONG, presupuesto, tipo, fecha FROM (SELECT * FROM proyectos WHERE nombre IN (SELECT nombre_proyecto FROM recursos INNER JOIN recursos_en_tramite ON recursos.numero = recursos_en_tramite.numero)) AS proyectos_validos, (SELECT * FROM movilizaciones INNER JOIN movilizaciones_redes_sociales ON movilizaciones.numero = movilizaciones_redes_sociales.numero WHERE CURRENT_DATE < fecha + INTERVAL '1 month' * duracion) AS mov_redes WHERE proyectos_validos.nombre = mov_redes.proyecto ORDER BY nombre";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre</th>
      <th>ONG</th>
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
