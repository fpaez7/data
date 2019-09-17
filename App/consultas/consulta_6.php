<?php include('../templates/header.html');   ?>

<body>
<h2 align="center">Proyectos en operacion y con recursos aprobados para ellos</h2>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $query = "SELECT proyectos.pid, proyectos.tipo, proyectos.nombre,
  proyectos.latitud, proyectos.longitud, proyectos.fecha_apertura FROM proyectos, recurso_proyecto, recursos_cerrados
  WHERE recursos_cerrados.status = 'aprobado' AND
  recursos_cerrados.rid = recurso_proyecto.rid AND
  proyectos.pid = recurso_proyecto.pid AND proyectos.operativo = 1 
  GROUP BY proyectos.pid 
  ORDER BY proyectos.pid ASC";
  $result = $db -> prepare($query);
  $result -> execute();
  $proyectos = $result -> fetchAll();
  ?>

  <table align="center">
    <tr>
      <th>PID</th>
      <th>Tipo</th>
      <th>Nombre</th>
      <th>Latitud</th>
      <th>Longitud</th>
      <th>Fecha Apertura</th>
    </tr>
  
      <?php
        foreach ($proyectos as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
          <td>$p[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
