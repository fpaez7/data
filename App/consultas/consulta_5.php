<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Proyectos por socio</h2>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  SELECT Socios.nombre, Proyectos.name
  FROM proyecto_socio, Proyectos, Socios
  WHERE proyecto_socio.Pid = Proyectos.Pid
  AND proyecto_socio.Sid = Socios.pid
  ORDER BY Socios.nombre, Proyectos.name ASC|DESC

  ?>

<?php include('../templates/footer.html'); ?>
