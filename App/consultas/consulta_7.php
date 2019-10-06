<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Centrales Termoelectricas</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");

  $query = "SELECT proyectos.pid, nombre, generador, operativo
  FROM proyectos, generadoras_electricas
  WHERE proyectos.pid = generadoras_electricas.pid
  AND generador='termoelectrica'";

  $result = $db -> prepare($query);
  $result -> execute();
  $vertederos = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th>PID</th>
      <th>Nombre</th>
      <th>Tipo de Generacion</th>
      <th>Operativo</th>
    </tr>

      <?php
        foreach ($vertederos as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
          <td>$p[3]</td><td>";
      }
      ?>

  </table>


<?php include('../templates/footer.html'); ?>
