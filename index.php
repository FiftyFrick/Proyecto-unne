<?php
// Conexión a la base de datos
include "logica/conexion.php";
// include "Carga de Datos/consultas.php";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facultad de Ciencias Exactas y Naturales y Agrimensura | FaCENA – UNNE</title>
    <link rel="shortcut icon" href="http://exa.unne.edu.ar/r/wp-content/uploads/2019/07/browsericon.gif" type="image/gif">

    <link rel="stylesheet" type="text/css" href="css/styleIndex.css">
</head>


<body>
    <header>
      <section>
        <ul class="social"> 
                
          <li>
            <a href="https://www.instagram.com/"><img src="img/instagram.png"></a>
          </li>

          <li>
            <a href="https://www.facebook.com/"><img src="img/facebook.png"></a>
          </li>
      
          <li>
            <a href="https://twitter.com/"><img src="img/twitter.png"></a>
          </li>

        </ul>
      </section>

      <section class="portada">
        <article class="logo">
          <img src="img/logo-facena.jpg">
        </article>
        <article>
          <center><h3 class="FaCENa">FaCENA</h3>
          
          <h5>FACULTAD DE CIENCIAS EXACTAS</h5>
          
          <h5>Y NATURALES Y AGRIMENSURA</h5>
          </center>
        </article>
      </section>

    </header>

    <nav>
      <ul>
          <li><a href="#">Inicio</a></li>
          <!-- <li><a href="#">Estadistica</a></li> -->
          <li><a href="https://exa.unne.edu.ar/r/">FaCENA</a></li>

          <li><a href="cuenta/login.html">Administracion</a></li>
      </ul>

      <ul>
        <li><a href="carga de datos/upload_carrera_asign.php">Cargar Carreras/Asignaturas</a></li>
        <!-- <li><a href="carga de datos/upload_carreras.php">Cargar Carreras</a></li>
        <li><a href="carga de datos/upload_Asignaturas.php">Cargar Asignaturas</a></li> -->

        <li><a href="carga de datos/upload_Plan de estudio.php">Cargar Plan de Estudio</a></li>

        <li><a href="carga de datos/upload_Programas.php">Cargar Programas</a></li>
      </ul>

    </nav>

    <!-- 
    <aside>
    </aside> 
    -->

    <main>
      <br>
      <h1>Programas Analiticos Aprobados </h1>
      <br>

        	<center>
              <div class="Buscador">

                <form action="logica/busqueda.php" method="post">
                  <article>
                    <label for="carrera">Carrera:</label>
                      <select id="carrera" name="carrera">
                        <?php
                        // Consulta para obtener los datos de la tabla Programas
                          $sql = "SELECT * FROM carreras";
                        $resultcarrera = $conn->query($sql);
                        ?>
                        <?php while ($row = $resultcarrera->fetch_assoc()) : ?>
                          <option value="<?php echo $row["id_carrera"]; ?>"><?php echo $row["nombre_carrera"];?></option>
                        <?php endwhile; ?>
                      </select>
                  </article>

                  <br>
                  <article>
                    <label for="plan">Plan de Estudio:</label>
                    
                    <select id="plan" name="plan">
                        <?php
                        // Consulta para obtener los datos de la tabla Programas
                        $consultPlan = "SELECT * FROM plan_de_estudio";
                        $resultPlan = $conn->query($consultPlan);
                                                
                        while ($rowPlan = $resultPlan->fetch_assoc()) : ?>
                          <option value="<?php echo $rowPlan["id_plan"]; ?>"><?php echo $rowPlan["nombre_plan"];?></option>
                        <?php endwhile; ?>
                      </select>
                  </article>
                  <br>
                  <article>
                    <label for="asignatura">Asignatura:</label>
                    <select id="asignatura" name="asignatura">
                      <?php
                        // Consulta para obtener los datos de la tabla Programas
                        $sql = "SELECT * FROM asignaturas";
                        $resultasig = $conn->query($sql);
                        while ($row = $resultasig->fetch_assoc()) : ?>
                          <option value="<?php echo $row["id_asignatura"]; ?>"><?php echo $row["nom_asignatura"];?></option>
                      <?php endwhile; ?>
                    </select>
                  </article>
                  <br>
                  <article>
                    <label for="responsable">Responsable:</label>

                    <select id="carrera" name="carrera">
                        <?php
                          // Consulta para obtener los datos de la tabla Programas
                          $consultProgramas = "SELECT * FROM Programas";
                          $resultProgramas = $conn->query($consultProgramas);
                        
                        while ($row = $resultProgramas->fetch_assoc()) : ?>
                          <option value="<?php echo $row["id_carrera"]; ?>"><?php echo $row["responsable"];?></option>
                        <?php endwhile; ?>
                      </select>

                  </article>
                  <br>
  
                  <input type="submit" value="Buscar">
                </form>

              </div>
        
          </center>
          <br>
          <center>
            
            <section class="Result-busqueda">
              <article>
                <?php
                    $consulta2 = "SELECT COUNT(*) AS total FROM programas";
                    $result = $conn->query($consulta2);

                    // Verificar si la consulta fue exitosa
                    if ($result) {
                      $row = $result->fetch_assoc();
                      $total = $row['total'];
                    } else {
                      $total = "Error en la consulta: " . $conn->$error;
                    }
                  ?>
                  <h3>Resultado de la busqueda: se encontraron  <?php echo $total; ?> resultados</h3> 
              </article>
              
              <article>
                <!-- <a href="upload_form.html">subir programa</a> -->
                <br>
                <!-- <a href="view_programas.php">Ver lista de Programas</a> -->
              </article>
<center> <article>

<?php
  // Consulta para obtener los datos de la tabla Programas
  $sql = "SELECT * FROM programas";
  // id_programa, id_asignatura, id_carrera, id_plan, cuatrimestre, Responsable, Resolucion_CD, fecha_resolucion, id_documento
  $result = $conn->query($sql);
  ?>
  <table border="1">
    <tr>
        <th>ID Programa</th>
        <th>Asignatura</th>
        <th>ID Carrera</th>
        <th>ID Plan</th>
        <th>Cuatrimestre</th>
        <th>Responsable</th>
        <th>Resolución CD</th>
        <th>Fecha Resolución</th>
        <th>ID Documento</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row["id_programa"]; ?></td>
            <td><?php echo $row["id_asignatura"]; ?></td>
            <td><?php echo $row["id_carrera"]; ?></td>
            <td><?php echo $row["id_plan"]; ?></td>
            <td><?php echo $row["cuatrimestre"]; ?></td>
            <td><?php echo $row["responsable"]; ?></td>
            <td><?php echo $row["resolucion_CD"]; ?></td>
            <td><?php echo $row["fecha_resolucion"]; ?></td>
            <td><?php echo $row["id_documento"]; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</article></center>
             
              
              <a href="documentos/index.php">ver documentos</a>
                           
            </section>
          </center>
          <br>

      <section class="carreras">

        <article>
          <img src="img/licen_en_sist_de_inform.jpg">
          <h4>Licenciatura en Sistema de Informacion</h4>
        </article>
        <article>
          <img src="img/biomica.jpg">
          <h4>Biomica</h4>
        </article>
        <article>
          <img src="img/ing_agrimensura.jpeg">
          <h4>Ingenieria Agrimensura</h4>
        </article>
        <article>
          <img  src="img/ing_electronica.jpg">
          <h4>Ingenieria Electronica</h4>
        </article>

      </section>

    </main>
    

    <footer>

      <section>
        <article>
          <h3>Formas de Contacto</h3>
          <br>
          <p>Telefono:03794-4473931 Int 4490</p>
          <p>E-mails: biblioteca@exa.unne.edu.ar</p>
       </article>
       <br>
        <article>
          <h3>Atencion al Publico</h3>
          <br>
          <p>Lunes a Viernes de 7:30 a 19:00 hs en el Campus</p>
          <p>Deorodo Roca(Av.Libetad 5470)</p> 
          </article>
      </section>   

    </footer>

</body>
</html>
