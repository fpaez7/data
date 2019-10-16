<?php session_start(); ?>

<head>
    <link rel="stylesheet" href="styles/navbar_style.css">
</head>
<body>
    <header>
        <div class="topnav">
            <?php if($_SESSION['tipo'] == 'socio')
            {
                echo '<a href="logout.php">Logout</a>';
                echo '<a href="#crear_proyecto">Crear Proyecto</a>';
                echo '<a href="#asociarse_proyecto">Asociarse a Proyecto</a>';
            }
            elseif($_SESSION['tipo'] == 'ong')
            {
                echo '<a href="logout.php">Logout</a>';
                echo '<a href="#movilizaciones">Ver Movilizaciones</a>';
            }
            else 
            {
                echo '<a href="logout.php">Login</a>';
            }
            ?>
            <a class="active" href="index.php">Inicio</a>
        </div>
    </header>
</body>
