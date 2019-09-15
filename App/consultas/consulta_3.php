<?php include('../templates/header.html');   ?>

<body>
  <h2 align="center">Recursos asocioados a minas, entre "fecha_inicio" y "fecha_termino"</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  Select *
  FROM Recursos
  WHERE RECURSOS.fecha_dictamen > fecha_inicio
  AND RECURSOS.fecha_dictamen < fecha_termino

?>
</body>
<?php include('../templates/footer.html'); ?>
</html>
