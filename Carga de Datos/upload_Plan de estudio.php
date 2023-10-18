<?php
// Conexión a la base de datos
include "consultas.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de Plan de Estudio</title>
    <link rel="shortcut icon" href="http://exa.unne.edu.ar/r/wp-content/uploads/2019/07/browsericon.gif" type="image/gif">

    <link rel="stylesheet" href="cssDatos/stylePlanDeEstudio.css">
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

              echo "<li> <a href='Sesion/logica/salir.php'>   Cerrar Sesion </a> </li>";

              // echo "<li> <a href='Sesion/mi_cuenta.php'> Mi cuenta </a> </li>";

              // echo "<li> <a href='Sesion/registro.html'> Registrar Nuevo Adimistrador </a> </li>";
            }

            ?>      </ul>

      <ul>
        <li><a href="../carga de datos/upload_carrera_asign.php">Cargar Carreras/Asignaturas</a></li>
        <!-- <li><a href="carga de datos/upload_carreras.php">Cargar Carreras</a></li>
        <li><a href="carga de datos/upload_Asignaturas.php">Cargar Asignaturas</a></li> -->

        <li><a href="../carga de datos/upload_Plan de estudio.php">Cargar Plan de Estudio</a></li>

        <li><a href="../carga de datos/upload_Programas.php">Cargar Programas</a></li>
      </ul>

    </nav>

    

    <form action="upload.php" method="post" enctype="multipart/form-data" class="formulario">
    
    <div class="fila">
        <label for="plan_de_estudio">Nombre Plan de Estudio:</label>
        <input type="text" id="plan_de_estudio" name="plan_de_estudio">
    </div>

    <div class="fila">

        <label for="nombre_carrera">Nombre Carrera:</label>
        <!-- <input type="text" id="nombre_carrera" name="nombre_carrera"> -->
            <select id="nombre_carrera" name="nombre_carrera">
                <?php while ($rowlistanombre = $resultlistcarrera->fetch_assoc()) : ?>
                    <option value="<?php echo $rowlistanombre["id_carrera"]; ?>"><?php echo $rowlistanombre["nombre_carrera"];?></option>
                <?php endwhile; ?>
            </select>
        
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="text" id="fecha_inicio" name="fecha_inicio">
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="text" id="fecha_fin" name="fecha_fin">
    </div>

    <div class="fila">
        <label for="res_cd">Resolucion CD:</label>
        <input type="text" id="res_cd" name="res_cd">
        <label for="res_sd">Resolucion SD:</label>
        <input type="text" id="res_sd" name="res_sd">
        <label for="res_coneau">Resolucion CONEAU:</label>
        <input type="text" id="res_coneau" name="res_coneau">
        <label for="res_modif">Resolucion Modificada:</label>
        <input type="text" id="res_modif" name="res_modif">
    </div>

    <div class="fila">
        <div class="boton-container">
            <input type="submit" value="Subir" class="boton">
        </div>
    </div>

    </form>
    
    <center>
            
            <section class="Result-busqueda">
              <article>
                  <h3>Resultado de la busqueda: se encontraron  <?php echo $totalPlan; ?> resultados</h3> 
              </article>

              <article>

                  <table border="1">
                    <tr>
                        <th>ID Plan</th>
                        <th>Nombre Plan de Estudio</th>
                        <th>Nombre Carrera</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Resolucion CD</th>
                        <th>Resolucion SD</th>
                        <th>Resolucion CONEAU</th>
                        <th>Resolucion Modificada</th>

                    </tr>
                    <?php while ($row = $resultPlan->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row["id_plan"]; ?></td>
                            <td><?php echo $row["nombre_plan"]; ?></td>
                            <td><?php echo $row["nombre_carrera"]; ?></td>
                            <td><?php echo $row["fecha_inicio"]; ?></td>
                            <td><?php echo $row["fecha_fin"]; ?></td>
                            <td><?php echo $row["res_cd"]; ?></td>
                            <td><?php echo $row["res_sd"]; ?></td>
                            <td><?php echo $row["res_coneau"]; ?></td>
                            <td><?php echo $row["res_modif"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>

              </article>
              
                           
            </section>
          </center>
          

</body>
</html>
