<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Entrega 2</h1>

  <br>

  <a align="center" href="consultas/consulta_1.php">1. Centrales Termoelectricas</a>

  <br>
  <br>
  <br>

  <a align="center" href="consultas/consulta_2.php"> 2. Vertederos de la Región Metropolitana</a>

  <br>
  <br>
  <br>

  <h3 align="center"> 3. Recursos asociados a minas, entre las siguientes fechas</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
      Desde "YYYY-MM-DD":
      <input type="text" name="Desde">
      <br/>
      Hasta "YYYY-MM-DD":
      <input type="text" name="Hasta">
      <br/><br/>
      <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <a align="center" href="consultas/consulta_4.php">4. Regiones con algún recurso vigente</a>

  <br>
  <br>
  <br>

  <a align="center" href="consultas/consulta_5.php">5. Proyectos por socio</a>


  <br>
  <br>
  <br>

  <a align="center"href="consultas/consulta_6.php">6. Proyectos en operacion y con recursos aprobados para ellos</a>


  <br>
  <br>
  <br>
  <br>
</body>
</html>
