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
          <li><a href="index.php">Inicio</a></li>
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

              echo "<li> <a href='logica2/salir.php'>   Cerrar Sesion </a> </li>";

              echo "<li> <a href='Sesion/mi_cuenta.php'> Mi cuenta </a> </li>";

              echo "<li> <a href='Sesion/registro.html'> Registrar Nuevo Adimistrador </a> </li>";


            ?>
      </ul>
      <ul>
          <?php
              echo '<li><a href="carga de datos/upload_carrera_asign.php">Cargar Carreras/Asignaturas</a></li>';

              echo '<li><a href="carga de datos/upload_Plan de estudio.php">Cargar Plan de Estudio</a></li>';
              
              echo '<li><a href="carga de datos/upload_Programas.php">Cargar Programas</a></li>';

            }
          ?>

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

                <form action="" method="get">
                  <article>
                    <label for="carrera">Carrera:</label>
                      <select id="carrera" type="text" name="buscarCarrera">
                      <option value="0" ></option>

                      <?php
                      // Consulta para obtener los datos de la tabla Carreras
                      $sql = "SELECT * FROM carreras";
                      $resultcarrera = $conn->query($sql);
                      while ($row = $resultcarrera->fetch_assoc()) {
                        echo '<option value="' . $row["id_carrera"] . '">' . $row["nombre_carrera"] . '</option>';
                      }
                      ?>
                      </select>
                      <!-- <input type="text" id="nombre_carrera" name="nombre_carrera" list="opciones_carrera" required> 
                      <datalist id="opciones_carrera">
                      <option value=""></option>
                      <?php
                      $distCarrera = "SELECT * FROM carreras";
                      $resDistCarrera = $conn->query($distCarrera);
                      while ($rowDistCarreras = $resDistCarrera->fetch_assoc()) {
                        echo '<option value="' . $rowDistCarreras["id_carrera"] . '">' . $rowDistCarreras["nombre_carrera"] . '</option>';
                        
                          }
                      ?>
                      </datalist> -->
                  </article>

                  <br>
                  <article>
                    <label for="plan">Plan de Estudio:</label>
                    
                    <select id="plan" name="buscarPlan">
                        <option value="0"></option>

                        <?php
                        $consultPlan = "SELECT DISTINCT nombre_plan FROM plan_de_estudio";
                        $resultPlan = $conn->query($consultPlan);

                        while ($rowPlan = $resultPlan->fetch_assoc()) : ?>
                          <option value="<?php echo $rowPlan["nombre_plan"]; ?>"><?php echo $rowPlan["nombre_plan"];?></option>
                        <?php endwhile; ?>
                      </select>
                        <!-- 
                           <option value=""></option>
                <?php 
                $conPlan = "SELECT  DISTINCT nombre_plan  FROM plan_de_estudio";
                $resuPlan = $conn->query($conPlan);

                while ($rowlisPlan = $resuPlan->fetch_assoc()) : ?>
                    <option value="<?php echo $rowlisPlan["nombre_plan"]; ?>"><?php echo $rowlisPlan["nombre_plan"];?></option>
                <?php endwhile; ?>
                         -->
                      </select>
                  </article>
                  
                  <br>

                  <article>
                    <label for="asignatura">Asignatura:</label>
                    <select id="asignatura" name="buscarAsignatura">
                    <option value="0"></option>

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
                    <select id="responsable" name="buscarResponsable">
                    <option value="0"></option>

                        <?php
                          // Consulta para obtener los datos de la tabla Programas
                          $consultProgramas = "SELECT  DISTINCT responsable  FROM Programas";
                          $resultProgramas = $conn->query($consultProgramas);
                       
                        while ($row = $resultProgramas->fetch_assoc()) : ?>
                          <option value="<?php echo $row["responsable"]; ?>"><?php echo $row["responsable"];?></option>
                        <?php endwhile; ?>
                      </select>

                  </article>
                  <br>
  
                  <input type="submit" name="enviar" value="Buscar">
                </form>

              </div>
        
          </center>
          <br>
          <center>
            <section class="Result-busqueda">
              <article>
              <div style="max-height: 400px; overflow-y: scroll;">
              <table border="1">
                <thead>
                  <tr>
                    <th>N° Programa</th>
                    <th>Asignatura</th>
                    <th>Carrera</th>
                    <th>Plan</th>
                    <th>Cuatrimestre</th>
                    <th>Responsable</th>
                    <th>Resolución CD</th>
                    <th>Fecha Resolución</th>
                    <th>Documento PDF</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                        include "logica/conexion.php";

                        if (isset($_GET['buscarCarrera']) && $_GET['buscarCarrera'] > 0) {
                                  $busqueda = $_GET['buscarCarrera'];
                                  $idColumna = 'carreras.id_carrera';
                              } elseif (isset($_GET['buscarPlan']) && $_GET['buscarPlan'] !=="" && $_GET['buscarPlan'] >"0") {
                                  $busqueda = $_GET['buscarPlan'];
                                  $idColumna = 'plan_de_estudio.nombre_plan';
                              } elseif (isset($_GET['buscarAsignatura']) && $_GET['buscarAsignatura'] > 0) {
                                  $busqueda = $_GET['buscarAsignatura'];
                                  $idColumna = 'asignaturas.id_asignatura';
                              } elseif (isset($_GET['buscarResponsable']) && $_GET['buscarResponsable'] !=="" && $_GET['buscarResponsable'] >"0" ) {
                                  $busqueda = $_GET['buscarResponsable'];
                                  $idColumna = 'responsable';
                              }
                              // echo $busqueda;
                              $consulta = "SELECT * FROM programas
                              INNER JOIN carreras ON carreras.id_carrera = programas.id_carrera
                              INNER JOIN asignaturas ON asignaturas.id_asignatura = programas.id_asignatura
                              INNER JOIN plan_de_estudio ON plan_de_estudio.id_plan = programas.id_plan
                              
                              WHERE $idColumna LIKE '$busqueda'";
                                $result = $conn->query($consulta);
                                if (isset($_GET['enviar'])) {
                                // if
                                  while ($row = $result->fetch_assoc()) : 
                            
                                      ?>
                                      <tr>
                                      <td><?php echo $row["id_programa"]; ?></td>
                                      <td><?php echo $row["nom_asignatura"]; ?></td>
                                      <td><?php echo $row["nombre_carrera"]; ?></td>
                                      <td><?php echo $row["nombre_plan"]; ?></td>
                                      <td><?php echo $row["cuatrimestre"]; ?></td>
                                      <td><?php echo $row["responsable"]; ?></td>
                                      <td><?php echo $row["resolucion_CD"]; ?></td>
                                      <td><?php echo $row["fecha_resolucion"]; ?></td>
                                      <td><a href="mostrarpdf.php
                                      ?id_programa=<?php echo $row["id_programa"];?> 
                                      &nom_asignatura=<?php echo $row["nom_asignatura"];?>
                                      &nombre_carrera=<?php echo $row["nombre_carrera"];?>
                                      ">ver documento</a></td>
                                    </tr>
                                    <?php
                                  endwhile; 
                                  
                            }else{
                                      $consulta = "SELECT * FROM programas
                                                    INNER JOIN carreras ON carreras.id_carrera = programas.id_carrera
                                                    INNER JOIN asignaturas ON asignaturas.id_asignatura = programas.id_asignatura
                                                    INNER JOIN plan_de_estudio ON plan_de_estudio.id_plan = programas.id_plan
                                                  ";
                                      $result = $conn->query($consulta);
                                      ?>
                                      <article class="contador del resultado">
                                      <?php
                                          $contTotal = "SELECT COUNT(*) AS total FROM programas";
                                          $resultTotal = $conn->query($contTotal);
        
                                          // Verificar si la consulta fue exitosa
                                          if ($resultTotal) {
                                            $row = $resultTotal->fetch_assoc();
                                            $total = $row['total'];
                                          } else {
                                            $total = "Error en la consulta: " . $conn->$error;
                                          }
                                        ?>
                                        <h3>Resultado de la busqueda: se encontraron  <?php echo $total; ?> resultados</h3> 
                                    </article>
                              
                              <?php
                              while ($row = $result->fetch_assoc()) : 
                            
                                ?>
                                <tr>
                                <td><?php echo $row["id_programa"]; ?></td>
                                <td><?php echo $row["nom_asignatura"]; ?></td>
                                <td><?php echo $row["nombre_carrera"]; ?></td>
                                <td><?php echo $row["nombre_plan"]; ?></td>
                                <td><?php echo $row["cuatrimestre"]; ?></td>
                                <td><?php echo $row["responsable"]; ?></td>
                                <td><?php echo $row["resolucion_CD"]; ?></td>
                                <td><?php echo $row["fecha_resolucion"]; ?></td>
                                <td><a href="mostrarpdf.php
                                ?id_programa=<?php echo $row["id_programa"];?> 
                                &nom_asignatura=<?php echo $row["nom_asignatura"];?>
                                &nombre_carrera=<?php echo $row["nombre_carrera"];?>
                                ">ver documento</a></td>                                
                              </tr>

                              
                              <?php

                              
                            endwhile;  
                           
                            }
                            ?>

                            </tbody>

                          </table>
                         </div>

              </article>        

                            
              <!-- <a href="documentos/index.php">ver documentos</a> -->
                           
            </section>
          </center>
          <br>

      <section class="carreras">

      <article>
          <img src="img/licen_en_sist_de_inform.jpg">
          <h4>Licenciatura en Sistema de Informacion</h4>
        </article>
        
        <article>
          <img src="img/bioquimica.png" >
          <h4>Bioquimica</h4>
        </article>

        <article>
          <img src="img/ing_agrimensura.jpeg" >
          <h4>Ingenieria en Agrimensura</h4>
        </article>

        <article>
          <img  src="img/ing_electronica.jpg" >
          <h4>Ingenieria en Electronica</h4>
        </article>

        <article>
          <img src="img/licen_en_ciencias_quimicas.jpg" >
          <h4>Licenciatura en Ciencias Quimicas</h4>
        </article>

        <article>
          <img src="img/ing_electrica.jpg" >
          <h4>Ingenieria Electrica</h4>
        </article>

        <article>
          <img src="img/licen_en_biologia.jpg">
          <h4>Licenciatura en Biologia</h4>
        </article>

        <article>
          <img src="img/licen_en_matematica.jpg" >
          <h4>Licenciatura en Matematica</h4>
        </article>

        <article>
          <img src="img/licen_en_fisica.jpg" >
          <h4>Licenciatura en Fisica</h4>
        </article>

        <article>
          <img src="img/profe_en_biologia.jpg">
          <h4>Profesorado en Biologia</h4>
        </article>

        <article>
          <img src="img/profe_en_matematica.jpeg" >
           <h4>Profesorado en Matematica</h4>
        </article>

        <article>
          <img src="img/profe_en_fisica.jpg" >
          <h4>Profesorado en Fisica</h4>
        </article>

        <article>
          <img src="img/profe_en_Cs_quimica_y_del_ambiente.jpg" >
          <h4>Profesorado en Cs Quimicas y del Ambiente</h4>
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
