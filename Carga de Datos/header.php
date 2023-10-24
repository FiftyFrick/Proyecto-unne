<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

    <header>
    <link rel="stylesheet" href="cssDatos/cabecera.css">

      <section class="portada">
        <article class="logo">
          <img src="../img/logo-facena.jpg">
        </article>
        <article class="facultad">
          <center><h3 class="FaCENa">FaCENA</h3>
          
          <h5>FACULTAD DE CIENCIAS EXACTAS</h5>
          
          <h5>Y NATURALES Y AGRIMENSURA</h5>
          </center>
        </article>
      </section>

    </header>

    <center>


    <nav>
      <ul>
          <li><a href="../index.php">Inicio</a></li>
          <!-- <li><a href="#">Estadistica</a></li> -->
          <li><a href="https://exa.unne.edu.ar/r/">FaCENA</a></li>

          <?php
            // session_start();
            error_reporting(0);
            $varsession = $_SESSION ['username'];

            if ($varsession == null ){
                echo '<li><a href="Sesion/login.html">Administracion</a></li>';
            }else{
              echo "<li> <a href='#'> <strong> Bienvenido $varsession </strong> </a> </li>";

              echo "<li> <a href='../Sesion/logica/salir.php'>   Cerrar Sesion </a> </li>";

              // echo "<li> <a href='Sesion/mi_cuenta.php'> Mi cuenta </a> </li>";

              // echo "<li> <a href='Sesion/registro.html'> Registrar Nuevo Adimistrador </a> </li>";
            }

            ?>
      </ul>

      <ul>
        <li><a href="../carga de datos/upload_carrera_asign.php">Cargar Carreras/Asignaturas</a></li>

        <li><a href="../carga de datos/upload_Plan de estudio.php">Cargar Plan de Estudio</a></li>

        <li><a href="../carga de datos/upload_Programas.php">Cargar Programas</a></li>
      </ul>

      <ul>
        <li><a href="update_carrera_asign.php">Modificar Carreras/Asignaturas</a></li>

        <li><a href="update_Plan de estudio.php">Modificar Plan de Estudio</a></li>

        <li><a href="update_Programas.php">Modificar Programas</a></li>
      </ul>

    </nav>

    </center>
    
</body>
</html>