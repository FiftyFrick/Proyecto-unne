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
    <link rel="stylesheet" href="../css/upload.css">
</head>
<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        
        <label for="asignatura">Asignatura:</label>
        <input type="text" id="asignatura" name="asignatura">
        <br>
        <input type="submit" value="Subir">
    </form>

    <center>
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

</body>
</html>
