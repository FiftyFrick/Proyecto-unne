<?php
// Conexión a la base de datos
include "../logica/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
    <link rel="stylesheet" href="../css/upload.css">
</head>
<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="id_asignatura">id_asignatura:</label>
        <input type="text" id="id_asignatura" name="id_asignatura">
        <br>
        <label for="nombre_asignatura">nombre Asignatura:</label>
        <input type="text" id="nombre_asignatura" name="nombre_asignatura">
        
        <br>
        
        <label for="id_carrera">id_carrera:</label>
        <input type="text" id="id_carrera" name="id_carrera">
        <br>
        <label for="nombre_crrera">nombre Carrera:</label>
        <input type="text" id="nombre_crrera" name="nombre_crrera">
        
        <br>       
        
        <label for="id_plan">id Plan de Estudio:</label>
        <input type="text" id="id_plan" name="id_plan">
        <br>
        <label for="nombre_plan">Nombre Plan:</label>
        <input type="text" id="nombre_plan" name="nombre_plan">
        
        <br>    
        
        <label for="cuatrimestre">cuatrimestre:</label>
        <input type="text" id="cuatrimestre" name="cuatrimestre">
        <br>
        <label for="Responsable">Responsable:</label>
        <input type="text" id="Responsable" name="Responsable">
        <br>
        <label for="Resolucion_CD">Resolucion CD:</label>
        <input type="text" id="Resolucion_CD" name="Resolucion_CD">
        <br>
        <label for="fecha_resolucion">fecha resolucion:</label>
        <input type="text" id="fecha_resolucion" name="fecha_resolucion">
        <br>

        <input type="submit" value="Subir">
    </form>

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

                <?php
                  // Consulta para obtener los datos de la tabla Programas
                  $sql = "SELECT id_programa, asignatura, id_carrera, id_plan, cuatrimestre, Responsable, Resolucion_CD, fecha_resolucion, documento FROM Programas";
                  $result = $conn->query($sql);
                  ?>
                  <table border="1">
                    <tr>
                        <th>ID Programa</th>
                        <!-- --------------------> 
                        <th>ID Asignatura</th>
                        <th>Nombre de Asignatura</th>
                        <!-- ------------------->
                        <th>ID Carrera</th>
                        <th>Nombre de Carrera</th>
                        <!-- -------------------->
                        <th>ID Plan</th>
                        <th>Nombre de Plan de Estudio</th>
                        <!-- ------------------->
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
                            <td><?php echo $row["nom_asignatura"]; ?></td>

                            <td><?php echo $row["id_carrera"]; ?></td>
                            <td><?php echo $row["nom_carrera"]; ?></td>

                            <td><?php echo $row["id_plan"]; ?></td>
                            <td><?php echo $row["nom_plan"]; ?></td>

                            <td><?php echo $row["cuatrimestre"]; ?></td>
                            <td><?php echo $row["Responsable"]; ?></td>
                            <td><?php echo $row["Resolucion_CD"]; ?></td>
                            <td><?php echo $row["fecha_resolucion"]; ?></td>
                            <td><!-- <a href="pdf_viewer copy.php?id_programa=<?php echo $row["id_programa"]; ?> --> ">ver documento</a></td> 
                        </tr>
                    <?php endwhile; ?>
                </table>

              </article>
              
                           
            </section>
          </center>
          
    
</body>
</html>
