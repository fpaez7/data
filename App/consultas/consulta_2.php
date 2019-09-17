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
  proyectos.tipo = 3"

  ?>

<?php include('../templates/footer.html'); ?>
