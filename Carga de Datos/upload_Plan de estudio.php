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
        
        <label for="nom_plan">Nombre Plan de Estudio:</label>
        <input type="text" id="plan_de_estudio" name="plan_de_estudio">
        <br>
<!-- 
        <label for="documento">Documento (PDF):</label>
        <input type="file" id="documento" name="documento">
        <br> -->

        <input type="submit" value="Subir">
    </form>

    <center>
            
            <section class="Result-busqueda">
              <article>
                <?php
                    $consulta2 = "SELECT COUNT(*) AS total FROM plan_de_estudio";
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
                  $sql = "SELECT * FROM plan_de_estudio";
                  $result = $conn->query($sql);
                  ?>
                  <table border="1">
                    <tr>
                        <th>ID Plan</th>
                        <th>Nombre Plan de Estudio</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row["id_plan"]; ?></td>
                            <td><?php echo $row["nom_plan"]; ?></td>
                            <td><?php echo $row["id_carrera"]; ?></td>
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
