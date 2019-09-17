<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Regiones con algún recurso vigente</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

$query = "SELECT region_comuna.region FROM region_comuna, proyectos WHERE
proyectos.operativo = 1 AND
proyectos.latitud = region_comuna.latitud AND
proyectos.loingitud = region_comuna.longitud AND
GROUP BY region_comuna.region;"

  ?>

<?php include('../templates/footer.html'); ?>
