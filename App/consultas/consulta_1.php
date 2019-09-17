<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Centrales Termoelectricas</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $query =
  " SELECT proyectos.pid, nombre, generador, operativo
  FROM proyectos, generadoras_electricas
  WHERE proyectos.pid = generadoras_electricas.pid;"
  
<?php include('../templates/footer.html'); ?>
