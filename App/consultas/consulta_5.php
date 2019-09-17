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
  ;"

<?php include('../templates/footer.html'); ?>
