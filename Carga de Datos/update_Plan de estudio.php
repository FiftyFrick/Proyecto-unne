<?php
// Conexión a la base de datos
include "consultas.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de Plan de Estudio</title>
    <link rel="shortcut icon" href="http://exa.unne.edu.ar/r/wp-content/uploads/2019/07/browsericon.gif" type="image/gif">

    <link rel="stylesheet" href="cssDatos/stylePlanDeEstudio.css">
</head>
<body>

<?php
include "header.php";
?>
    

    <form action="modify_plan.php" method="post" enctype="multipart/form-data" class="formulario">
    <div class="fila">
        <label for="N_plan">Plan de Estudio Numero:</label>
        <select id="id_plan" name="id_plan" required>
                  <option value=""></option>
                  <?php 
                    $conPlan = "SELECT * FROM plan_de_estudio";
                    $resuPlan = $conn->query($conPlan);

                  while ($rowlisPlan = $resuPlan->fetch_assoc()) : ?>
                      <option value="<?php echo $rowlisPlan["id_plan"]; ?>"><?php echo $rowlisPlan["id_plan"];?></option>
                  <?php endwhile; ?>
                </select>
    </div>
    <div class="fila">
        <label for="plan_de_estudio">Nombre Plan de Estudio:</label>
        <input type="text" id="plan_de_estudio" name="nombre_plan" list="opciones_plan" required>
        <datalist id="opciones_plan">
        <option value=""></option>
        <?php
        $conPlan = "SELECT DISTINCT nombre_plan FROM plan_de_estudio";
        $resuPlan = $conn->query($conPlan);
        while ($rowlisPlan = $resuPlan->fetch_assoc()) {
            echo '<option value="' . $rowlisPlan["nombre_plan"] . '">';
        }
        ?>
        </datalist>
    </div>

    <div class="fila">

        <label for="nombre_carrera">Nombre Carrera:</label>
        <!-- <input type="text" id="nombre_carrera" name="nombre_carrera"> -->
            <select id="nombre_carrera" name="nombre_carrera" required>
                <option value=""></option>
                <?php while ($rowlistanombre = $resultlistcarrera->fetch_assoc()) : ?>
                    <option value="<?php echo $rowlistanombre["id_carrera"]; ?>"><?php echo $rowlistanombre["nombre_carrera"];?></option>
                <?php endwhile; ?>
            </select>
        
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio">

        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin">
    </div>

    <div class="fila">
        <label for="res_cd">Resolucion CD:</label>
        <input type="text" id="res_cd" name="res_cd">

        <label for="res_sd">Resolucion SD:</label>
        <input type="text" id="res_sd" name="res_sd">

        <label for="res_coneau">Resolucion CONEAU:</label>
        <input type="text" id="res_coneau" name="res_coneau">

        <label for="res_modif">Resolucion Modificada:</label>
        <input type="text" id="res_modif" name="res_modif">
    </div>
    <!-- <div >
           
        <label for="visible">visible:</label>
        <input type="checkbox" value="visible">
        <br>
        
    </div> -->

    <div class="fila">
        <div class="boton-container">
            <input type="submit" value="Modificar" class="boton">
        </div>
    </div>

    </form>
    
    <center>
            
            <section class="Result-busqueda">
              <article>
                  <h3>Resultado de la busqueda: se encontraron  <?php echo $totalPlan; ?> resultados</h3> 
              </article>

              <article>

                  <table border="1">
                    <tr>
                        <th>N° Plan</th>
                        <th>Nombre Plan de Estudio</th>
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
