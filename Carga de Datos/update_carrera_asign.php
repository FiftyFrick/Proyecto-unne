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
                    <form action="modify_carreras.php" method="post" enctype="multipart/form-data">
                    
                    <label for="carreras">Carreras:</label>
                     <select id="carrera" name="idCarrera">
                    <?php while ($rowlista = $resultlistcarrera->fetch_assoc()) : ?>
                          <option value="<?php echo $rowlista["id_carrera"]; ?>"><?php echo $rowlista["nombre_carrera"];?></option>
                        <?php endwhile; ?>

                      </select>                   
                    <input type="text" id="carreras" name="carrera" required>

                    
                    <br>
                    
                    <!-- <label for="visible">visible:</label>
                    <input type="checkbox" value="visible"> 
                    <br>-->
                    <input type="submit" value="Modificar">

                    
                    </form>



                    <section class="Result-busqueda">
                        <article>
                            <h3>Resultado de la busqueda: se encontraron  <?php echo $totalCarreras; ?> resultados</h3> 
                        </article>

                        <article>
                        <div style="max-height: 400px; overflow-y: scroll;">

                            <table border="1">
                                <thead>
                            <tr>
                                <th>N° Carrera</th>
                                <th>Nombre Carrera</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = $resultcarrera->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row["id_carrera"]; ?></td>
                                    <td><?php echo $row["nombre_carrera"]; ?></td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>

                        </article>
                    </section>
                </center>
            </div>


            <div class="right">
                <center>

                    <!-- Tu segundo formulario y contenido aquí -->
                    <form action="modify_asignaturas.php" method="post" enctype="multipart/form-data">
                    
                    <label for="asignatura">Asignatura:</label>
                    
                    <select id="asignatura" name="idAsignatura">
                    <?php
                        while ($row = $resultListAsig->fetch_assoc()) : ?>
                          <option value="<?php echo $row["id_asignatura"]; ?>"><?php echo $row["nom_asignatura"];?></option>
                      <?php endwhile; ?>
                    </select> 
                    
                    <input type="text" id="asignatura" name="asignatura" required>
                    
                    <br>

                                        
                    <!-- <label for="visible">visible:</label>
                    <input type="checkbox" value="visible">
                    <br> -->
                    

                    <input type="submit" value="Modificar">
                    </form>

       
                    <section class="Result-busqueda">

                        <article>
                            <h3>Resultado de la busqueda: se encontraron  <?php echo $totalAsignaturas; ?> resultados</h3> 
                        </article>

                        <article>
                        <div style="max-height: 400px; overflow-y: scroll;">
                        <thead>
                            <table border="1">
                                
                            <tr>
                                <th>N° Asignatura</th>
                                <th>Nombre Asignatura</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = $resultAsignaturas->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row["id_asignatura"]; ?></td>
                                    <td><?php echo $row["nom_asignatura"]; ?></td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                        </div>
                        </article>

                    </section>

                </center>

            </div>
    </div>

    
</body>
</html>
