<?php include('../templates/header.html');   ?>

<body>
  <h2 align="center">Vertederos de la Región Metropolitana</h2>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT pid, tipo, nombre, proyectos.latitud, proyectos.longitud, fecha_apertura
  FROM proyectos, region_comuna 
  WHERE proyectos.longitud = region_comuna.longitud AND
  proyectos.latitud = region_comuna.latitud AND
  region_comuna.region = 'Metropolitana de Santiago' AND
  proyectos.tipo = 3";

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
