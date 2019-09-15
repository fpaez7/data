<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Centrales Termoelectricas</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  SELECT *
  FROM Proyectos
  WHERE Proyectos.tipo = 2

  ?>

<?php include('../templates/footer.html'); ?>
