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
        
        <label for="carreras">Carreras:</label>
        <input type="text" id="carreras" name="carreras">
        <br>
        <input type="submit" value="Subir">
    </form>

    <center>
        <section class="Result-busqueda">
            <article>
                <h3>Resultado de la busqueda: se encontraron  <?php echo $totalCarreras; ?> resultados</h3> 
            </article>

            <article>
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
          

</body>
</html>
