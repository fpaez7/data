<?php include('../templates/header.html');   ?>

<body>
  <h2 align="center">Vertederos de la Región Metropolitana</h2>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  Select *
  From Proyectos
  WHERE Proyectos.tipo = 3
  AND Proyectos.region = "Metropolitana de Santiago"

  ?>

<?php include('../templates/footer.html'); ?>
