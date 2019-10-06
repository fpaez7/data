<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Proyectos por socio</h2>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT socios.nombre, socios.apellido, proyectos.nombre
  FROM socios,proyectos,socio_proyecto
  WHERE socios.sid = socio_proyecto.sid
  AND proyectos.pid = socio_proyecto.pid
  ";
  $result = $db -> prepare($query);
  $result -> execute();
  $vertederos = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th>PID</th>
      <th>Tipo</th>
      <th>Nombre</th>
      <th>Latitud</th>
      <th>Longitud</th>
      <th>Fecha Apertura</th>
    </tr>

      <?php
        foreach ($vertederos as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
          <td>$p[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";
      }
      ?>

  </table>


<?php include('../templates/footer.html'); ?>
