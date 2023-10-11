<!DOCTYPE html>

<?php
// Conexión a la base de datos
include "consultas.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssDatos/styleCarrerasAsignaturas.css">
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



    <div class="container">

            <div class="left">
                <center>

                    <!-- Tu primer formulario y contenido aquí -->
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                    <label for="carreras">Carreras:</label>
                    <input type="text" id="carreras" name="carreras">

                    <!-- <select id="carrera" name="carrera">
                        <?php while ($rowlista = $resultlistcarrera->fetch_assoc()) : ?>
                          <option value="<?php echo $rowlista["id_carrera"]; ?>"><?php echo $rowlista["nombre_carrera"];?></option>
                        <?php endwhile; ?>

                      </select>                   -->
                      <br>

                    <input type="submit" value="Subir">
                    </form>
                    <br>
                    <section class="Result-busqueda">
                        <article>
                            <h3>Resultado de la busqueda: se encontraron  <?php echo $totalCarreras; ?> resultados</h3> 
                        </article>

                        <article >
                            <table border="1">
                            <tr>
                                <th>ID Carrera</th>
                                <th>Nombre Carrera</th>
                            </tr>
                            <?php while ($row = $resultcarrera->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row["id_carrera"]; ?></td>
                                    <td><?php echo $row["nombre_carrera"]; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>

                        </article>
                    </section>
                </center>
            </div>


            <div class="right">
                <center>

                    <!-- Tu segundo formulario y contenido aquí -->
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    
                    <label for="asignatura">Asignatura:</label>
                    <input type="text" id="asignatura" name="asignatura">
                    <!-- 
                    <select id="asignatura" name="asignatura">
                      <?php
                        while ($row = $resultListAsig->fetch_assoc()) : ?>
                          <option value="<?php echo $row["id_asignatura"]; ?>"><?php echo $row["nom_asignatura"];?></option>
                      <?php endwhile; ?>
                    </select> 
                    -->
                    <br>

                    <input type="submit" value="Subir">
                    </form>

                    <br>
                    <section class="Result-busqueda">

                        <article>
                            <h3>Resultado de la busqueda: se encontraron  <?php echo $totalAsignaturas; ?> resultados</h3> 
                        </article>

                        <article>
                            <table border="1">
                            <tr>
                                <th>ID Asignatura</th>
                                <th>Nombre Asignatura</th>
                            </tr>
                            <?php while ($row = $resultAsignaturas->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row["id_asignatura"]; ?></td>
                                    <td><?php echo $row["nom_asignatura"]; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                        </article>

                    </section>

                </center>

            </div>
    </div>

    
</body>
</html>
