<?php
// Conexión a la base de datos
include "consultas.php";
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de Programas</title>
    <link rel="shortcut icon" href="http://exa.unne.edu.ar/r/wp-content/uploads/2019/07/browsericon.gif" type="image/gif">

    <link rel="stylesheet" href="cssDatos/styleProgramas.css">
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

        <li><a href="../carga de datos/upload_Plan de estudio.php">Cargar Plan de Estudio</a></li>

        <li><a href="../carga de datos/upload_Programas.php">Cargar Programas</a></li>
      </ul>

    </nav>

    <form action="upload.php" method="post" enctype="multipart/form-data">

      <div class="fila">
          <section class="seleccion">
            <article>
              <label for="nombre_asignatura">Nombre Asignatura:</label>
              <select id="asignatura" name="asignatura">
                <option value=""></option>
                <?php
                  while ($row = $resultListAsig->fetch_assoc()) : ?>
                    <option value="<?php echo $row["id_asignatura"]; ?>"><?php echo $row["nom_asignatura"];?></option>
                <?php endwhile; ?>
              </select> 
            </article>
            
            <article>
              <label for="nombre_crrera">Nombre Carrera:</label>
              <select id="nombre_carrera" name="nombre_carrera">
                <option value=""></option>
                <?php while ($rowlistanombre = $resultlistcarrera->fetch_assoc()) : ?>
                    <option value="<?php echo $rowlistanombre["id_carrera"]; ?>"><?php echo $rowlistanombre["nombre_carrera"];?></option>
                <?php endwhile; ?>
              </select>
            </article>
          
              <article>
                <label for="nombre_plan">Nombre Plan:</label>
                <select id="nombre_plan" name="nombre_plan">
                  <option value=""></option>
                  <?php while ($rowlistaPlan = $resultListPlan->fetch_assoc()) : ?>
                      <option value="<?php echo $rowlistaPlan["id_plan"]; ?>"><?php echo $rowlistaPlan["nombre_plan"];?></option>
                  <?php endwhile; ?>
                </select>
              </article>

          </section>        
      </div>
      <br>
      <div class="fila">  
        <label for="cuatrimestre">Cuatrimestre:</label>
        <input type="text" id="cuatrimestre" name="cuatrimestre">
        <br>
        <label for="Responsable">Responsable:</label>
        <input type="text" id="responsable" name="responsable">

        <select id="responsable" name="responsable">
          <option value=""></option>

        <?php
        // Consulta para obtener los datos de la tabla Programas
        $consultResponsable = "SELECT * FROM Programas";
        $resultResponsable = $conn->query($consultResponsable);
      
        while ($rowResponsable = $resultResponsable->fetch_assoc()) : ?>
          <option value="<?php echo $rowResponsable["id_carrera"]; ?>"><?php echo $rowResponsable["responsable"];?></option>
        <?php endwhile; ?>
        </select>        
      <br>
      </div>
      <br>        
      <div class="fila">  
        <label for="Resolucion_CD">Resolucion CD:</label>
        <input type="text" id="Resolucion_CD" name="Resolucion_CD">
        <br>
        <label for="fecha_resolucion">Fecha Resolucion:</label>
        <input type="date" id="fecha_resolucion" name="fecha_resolucion">
        <br>
      </div>

      <div class="fila">
        <label for="documento">Documento (PDF):</label>
        <input type="file" id="documento" name="documento">
        <br>
        <div class="boton-container">
            <input type="submit" value="Subir" class="boton">
        </div>
    </div>

    </form>

    <br>
                          
      <section class="Result-busqueda">
        <center>
          <article>
              <h3>Resultado de la busqueda: se encontraron  <?php echo $totalProgramas; ?> resultados</h3> 
          </article>
          </center>

        <article class="tabla">
        <center>
          <table border="1">
            <tr>
              <th>ID Programa</th>
              <!-- --------------------> 
              <th>Nombre de Asignatura</th>
              <!-- ------------------->
              <th>Nombre de Carrera</th>
              <!-- -------------------->
              <th>Nombre de Plan de Estudio</th>
              <!-- ------------------->
              <th>Cuatrimestre</th>
              <th>Responsable</th>
              <th>Resolución CD</th>
              <th>Fecha Resolución</th>
              <!-- ------------------->
              <th>ID Documento</th>
              <!-- <th>Archivo PDF</th> -->
            </tr>
            <?php
            $consulta = "SELECT * FROM programas
                                INNER JOIN carreras ON carreras.id_carrera = programas.id_carrera
                                INNER JOIN asignaturas ON asignaturas.id_asignatura = programas.id_asignatura
                                INNER JOIN plan_de_estudio ON plan_de_estudio.id_plan = programas.id_plan
                                ";
                                $result = $conn->query($consulta);

                                while ($rowPro = $result->fetch_assoc()) : 
                            
                                      ?>
                                      <tr>
                                      <td><?php echo $rowPro["id_programa"]; ?></td>
                                      <td><?php echo $rowPro["nom_asignatura"]; ?></td>
                                      <td><?php echo $rowPro["nombre_carrera"]; ?></td>
                                      <td><?php echo $rowPro["nombre_plan"]; ?></td>
                                      <td><?php echo $rowPro["cuatrimestre"]; ?></td>
                                      <td><?php echo $rowPro["responsable"]; ?></td>
                                      <td><?php echo $rowPro["resolucion_CD"]; ?></td>
                                      <td><?php echo $rowPro["fecha_resolucion"]; ?></td>
                                      <td><?php echo $rowPro["archivo_PDF"]; ?></td>
                                    </tr>
                                    <?php
                                  endwhile; ?>


          </table>
          </center>
        </article>
    
      </section>
    
  </body>
</html>

