<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Proyectos en operacion y con recursos aprobados para ellos</h2>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  SELECT Proyectos.name
  FROM Proyectos, recurso_proyecto, Recursos
  WHERE Recursos.status = "aprobado"
  AND Proyectos.Pid = recurso_proyecto.Pid
  AND RECURSOS.Rid = recurso_proyecto.Rid
  ?>

<?php include('../templates/footer.html'); ?>
