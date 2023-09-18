<?php
// Conexión a la base de datos
include "logica/conexion.php";
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
          <li><a href="#">Estadistica</a></li>
          <li><a href="https://exa.unne.edu.ar/r/">FaCENA</a></li>
          <li><a href="login.html">Administracion</a></li>

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
                    <input type="text" id="carrera" name="carrera" value="Todos">
                  </article>
                  <br>
                  <article>
                    <label for="plan">Plan de Estudio:</label>
                    <input type="text" id="plan" name="plan" value="Todos">
                  </article>
                  <br>
                  <article>
                    <label for="asignatura">Asignatura:</label>
                    <input type="text" id="asignatura" name="asignatura" value="Todos">
                   </article>
                  <br>
                  <article>
                    <label for="responsable">Responsable:</label>
                    <input type="text" id="responsable" name="responsable" value="Todos">
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
                      $total = "Error en la consulta: " . $conn->error;
                    }
                  ?>
                  <h3>Resultado de la busqueda: se encontraron  <?php echo $total; ?> resultados</h3> 
              </article>
              
              <article>
                <br><br>
                <a href="upload_form.html">subir programa</a>
                <br>
                <!-- <a href="view_programas.php">Ver lista de Programas</a> -->
                <br><br>
              </article>

              <article>

                <?php
                  // Consulta para obtener los datos de la tabla Programas
                  $sql = "SELECT id_programa, asignatura, id_carrera, id_plan, cuatrimestre, Responsable, Resolucion_CD, fecha_resolucion, documento FROM Programas";
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
                        <th>Documento</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row["id_programa"]; ?></td>
                            <td><?php echo $row["asignatura"]; ?></td>
                            <td><?php echo $row["id_carrera"]; ?></td>
                            <td><?php echo $row["id_plan"]; ?></td>
                            <td><?php echo $row["cuatrimestre"]; ?></td>
                            <td><?php echo $row["Responsable"]; ?></td>
                            <td><?php echo $row["Resolucion_CD"]; ?></td>
                            <td><?php echo $row["fecha_resolucion"]; ?></td>
                            <!-- <td><a href="pdf_viewer copy.php?id_programa=<?php echo $row["id_programa"]; ?>">ver documento</a></td> -->
                        </tr>
                    <?php endwhile; ?>
                </table>

              </article>
              
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
