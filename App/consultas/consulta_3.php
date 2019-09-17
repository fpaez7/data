<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Recursos asocioados a minas, entre "fecha_inicio" y "fecha_termino”</h2>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  require("../config/conexion.php");
  $desde = $_POST["Desde"];
  $hasta = $_POST["Hasta"];

  $query = "SELECT recursos.rid , proyectos.nombre, recursos.causa,recursos.fecha_apertura
          FROM recursos, recurso_proyecto , proyectos
          WHERE recurso_proyecto.rid = Recursos.rid
          AND  recurso_proyecto.pid = proyectos.pid
         AND proyectos.tipo = 1
         AND recursos.fecha_apertura > '$desde'
         AND recursos.fecha_apertura < '$hasta'
         ORDER BY recursos.fecha_apertura";

  $result = $db -> prepare($query);
  $result -> execute();
  $vertederos = $result -> fetchAll();
  ?>

  <p>fecha_inicio:<?php echo $desde ?></p>
  <p>fecha_termino:<?php echo $hasta ?></p>
  <table align="center">
    <tr>
      <th>RID</th>
      <th>Nombre del proyecto</th>
      <th>Causa del recurso</th>
      <th>fecha apertura del recurso</th>
    </tr>

      <?php
        foreach ($vertederos as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
          <td>$p[3]";
      }
      ?>

  </table>


<?php include('../templates/footer.html'); ?>
