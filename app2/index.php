<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Biblioteca Grupo 54 </h1>
  <p style="text-align:center;">Aquí podrás encontrar las consultas del enunciado.</p>

  <br>

  <h3 align="center"> ¿Quieres buscar las marchas planificadas entre fechas?</h3>

  <form align="center" action="consultas/consulta_marchas_planificadas.php" method="post">
    Año:
    <input type="int" name="ano">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar un Recurso abierto entre dos fechas?</h3>

  <form align="center" action="consultas/consulta_abierto_entre_fechas.php" method="post">
    Fecha inicio:
    <input type="date" name="fecha_inicio">
    Fecha final:
    <input type="date" name="fecha_final">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todas las ONGs que participen en un proyecto en particular?</h3>

  <?php
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre FROM proyectos;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_ong_en_proyectos.php" method="post">
    Ingresar proyecto:
    <select name="proyecto">
      <?php
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar las regiones con algun recurso vigente?</h3>

  <form align="center" action="consultas/consulta_estado_recursos.php" method="post">
      <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar las movilizaciones de una ONG?</h3>
  <?php
  require("config/conexion.php");
  $result = $db -> prepare("SELECT nombre FROM movilizaciones INNER JOIN ongs ON nombre = ong;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>
  <form align="center" action="consultas/consulta_movilizaciones.php" method="post">
    Ingresar ONG:
    <select name="ONG">
      <?php
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Mostrar proyectos con recursos vigentes y proyectos asociados.</h3>

  <form align="center" action="consultas/consulta_proyectos_rec_vigentes.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>
</body>
</html>
