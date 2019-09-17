<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Regiones con algún recurso vigente</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT region FROM region_comuna, proyectos, recurso_proyecto WHERE
  region_comuna.latitud = proyectos.latitud AND region_comuna.longitud = proyectos.longitud AND
  proyectos.pid = recurso_proyecto.pid AND
  recurso_proyecto.rid NOT IN (SELECT rid FROM recursos_vencidos) GROUP BY region";

  $result = $db -> prepare($query);
  $result -> execute();
  $regiones = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th>Region</th>
    </tr>

      <?php
        foreach ($regiones as $r) {
          echo "<tr><td>$r[0]</td></tr>";
      }
      ?>
      
  </table> 


<?php include('../templates/footer.html'); ?>
