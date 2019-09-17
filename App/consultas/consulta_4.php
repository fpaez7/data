<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Regiones con algún recurso vigente</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT region_comuna.region FROM region_comuna, proyectos
  WHERE proyectos.operativo = 1 AND
  proyectos.latitud = region_comuna.latitud AND
  proyectos.longitud = region_comuna.longitud
  GROUP BY region_comuna.region";

  $result = $db -> prepare($query);
  $result -> execute();
  $vertederos = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th>Region</th>
    </tr>

      <?php
        foreach ($vertederos as $v) {
          echo "<tr><td>$v[0]</td></tr>";
      }
      ?>
      
  </table> 


<?php include('../templates/footer.html'); ?>
