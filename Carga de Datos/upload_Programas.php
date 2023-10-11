<?php
// Conexión a la base de datos
include "consultas.php";
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
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
          <!-- <li><a href="#">Estadistica</a></li> -->
          <li><a href="https://exa.unne.edu.ar/r/">FaCENA</a></li>

          <li><a href="../cuenta/login.html">Administracion</a></li>
      </ul>

      <ul>
        <li><a href="../carga de datos/upload_carrera_asign.php">Cargar Carreras/Asignaturas</a></li>
        <!-- <li><a href="carga de datos/upload_carreras.php">Cargar Carreras</a></li>
        <li><a href="carga de datos/upload_Asignaturas.php">Cargar Asignaturas</a></li> -->

        <li><a href="../carga de datos/upload_Plan de estudio.php">Cargar Plan de Estudio</a></li>

        <li><a href="../carga de datos/upload_Programas.php">Cargar Programas</a></li>
      </ul>

    </nav>

    <form action="upload.php" method="post" enctype="multipart/form-data">

      <div class="fila">
          <section class="seleccion">
            <article>
              <label for="nombre_asignatura"> Asignatura:</label>
              <select id="asignatura" name="asignatura">
                <?php
                  while ($row = $resultListAsig->fetch_assoc()) : ?>
                    <option value="<?php echo $row["id_asignatura"]; ?>"><?php echo $row["nom_asignatura"];?></option>
                <?php endwhile; ?>
              </select> 
            </article>
            
            <article>
              <label for="nombre_crrera"> Carrera:</label>
              <select id="nombre_carrera" name="nombre_carrera">
                <?php while ($rowlistanombre = $resultlistcarrera->fetch_assoc()) : ?>
                    <option value="<?php echo $rowlistanombre["id_carrera"]; ?>"><?php echo $rowlistanombre["nombre_carrera"];?></option>
                <?php endwhile; ?>
              </select>
            </article>
          
              <article>
                <label for="nombre_plan">Plan:</label>
                <select id="nombre_plan" name="nombre_plan">
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
        <select id="carrera" name="carrera">
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
        <input type="text" id="fecha_resolucion" name="fecha_resolucion">
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

          <table border="1">
            <tr>
              <th>ID Programa</th>
              <th>Nombre Programa</th>
              <!-- --------------------> 
              <!-- <th>ID Asignatura</th> -->
              <th>Nombre de Asignatura</th>
              <!-- ------------------->
              <!-- <th>ID Carrera</th> -->
              <th>Nombre de Carrera</th>
              <!-- -------------------->
              <!-- <th>ID Plan</th> -->
              <th>Nombre de Plan de Estudio</th>
              <!-- ------------------->
              <th>Cuatrimestre</th>
              <th>Responsable</th>
              <th>Resolución CD</th>
              <th>Fecha Resolución</th>
              <!-- ------------------->
              <th>ID Documento</th>
              <th>Archivo PDF</th>
            </tr>

            <?php while ($rowPlan = $resultProgramas->fetch_assoc()) : ?>
            
            <tr>
              <td><?php echo $rowPlan["id_programa"]; ?></td>
              <td><?php echo $rowPlan["nom_programa"]; ?></td>

              <!-- <td><?php echo $rowPlan["id_asignatura"]; ?></td> -->
              <td><?php echo $rowPlan["nom_asignatura"]; ?></td>

              <!-- <td><?php echo $rowPlan["id_carrera"]; ?></td> -->
              <td><?php echo $rowPlan["nom_carrera"]; ?></td>

              <!-- <td><?php echo $rowPlan["id_plan"]; ?></td> -->
              <td><?php echo $rowPlan["nom_plan"]; ?></td>

              <td><?php echo $rowPlan["cuatrimestre"]; ?></td>
              <td><?php echo $rowPlan["responsable"]; ?></td>
              <td><?php echo $rowPlan["resolucion_CD"]; ?></td>
              <td><?php echo $rowPlan["fecha_resolucion"]; ?></td>

              <td><?php echo $rowPlan["id_documento"]; ?></td>
              <td><?php echo $rowPlan["archivo"]; ?></td>

            </tr>
            <?php endwhile; ?>
          </table>
        </article>

      </section>
    
  </body>
</html>

