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
    <title>Carga de Carreras y Asignaturas</title>
    <link rel="shortcut icon" href="http://exa.unne.edu.ar/r/wp-content/uploads/2019/07/browsericon.gif" type="image/gif">
    <link rel="stylesheet" href="cssDatos/styleCarrerasAsignaturas.css">
 

</head>
<body>
<?php
include "header.php";
?>




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

       
                    <section class="Result-busqueda">

                        <article>
                            <h3>Resultado de la busqueda: se encontraron  <?php echo $totalAsignaturas; ?> resultados</h3> 
                        </article>

                        <article>
                            <table border="1">
                            <tr>
                                <th>N° Asignatura</th>
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
