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
        
        <label for="nom_plan">Nombre Plan de Estudio:</label>
        <input type="text" id="plan_de_estudio" name="plan_de_estudio">
        <br>
        <label for="id_carrera">ID Carrera:</label>
        <input type="text" id="id_carrera" name="id_carrera">
        <br>
        <label for="nombre_carrera">Nombre Carrera:</label>
        <input type="text" id="nombre_carrera" name="nombre_carrera">
        <br>
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="text" id="fecha_inicio" name="fecha_inicio">
        <br>
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="text" id="fecha_fin" name="fecha_fin">
        <br>
        <label for="res_cd">Resolucion CD:</label>
        <input type="text" id="res_cd" name="res_cd">
        <br>
        <label for="res_sd">Resolucion SD:</label>
        <input type="text" id="res_sd" name="res_sd">
        <br>
        <label for="res_coneau">Resolucion CONEAU:</label>
        <input type="text" id="res_coneau" name="res_coneau">
        <br>
        <label for="res_modif">Resolucion Modificada:</label>
        <input type="text" id="res_modif" name="res_modif">
        <br>
        <input type="submit" value="Subir">
    </form>

    <center>
            
            <section class="Result-busqueda">
              <article>
                  <h3>Resultado de la busqueda: se encontraron  <?php echo $totalPlan; ?> resultados</h3> 
              </article>

              <article>

                  <table border="1">
                    <tr>
                        <th>ID Plan</th>
                        <th>Nombre Plan de Estudio</th>
                        <th>ID Carrera</th>
                        <th>Nombre Carrera</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Resolucion CD</th>
                        <th>Resolucion SD</th>
                        <th>Resolucion CONEAU</th>
                        <th>Resolucion Modificada</th>

                    </tr>
                    <?php while ($row = $resultPlan->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row["id_plan"]; ?></td>
                            <td><?php echo $row["nombre_plan"]; ?></td>
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
