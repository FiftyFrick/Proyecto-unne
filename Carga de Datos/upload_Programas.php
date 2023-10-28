<?php
// Conexión a la base de datos
include "consultas.php";
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de Programas</title>
    <link rel="shortcut icon" href="http://exa.unne.edu.ar/r/wp-content/uploads/2019/07/browsericon.gif" type="image/gif">

    <link rel="stylesheet" href="cssDatos/styleProgramas.css">
  </head>
  
  <body>
  <?php
  include "header.php";
  ?>
    <form action="insertPrograma.php" method="post" enctype="multipart/form-data">

      <div class="fila">
           
            <label for="nombre_carrera">Nombre Carrera:</label>
            <select id="nombre_carrera" name="nombre_carrera" required>
              <option value=""></option>
              <?php while ($rowlista = $resultlistcarrera->fetch_assoc()) : ?>
                <option value="<?php echo $rowlista["id_carrera"]; ?>"><?php echo $rowlista["nombre_carrera"];?></option>
              <?php endwhile; ?>
            </select>

            <label for="nombre_plan">Nombre Plan:</label>

            <select id="nombre_plan" name="nombre_plan" required disabled>
              <option value=""></option>
            </select>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
              // Cuando cambia la opción de nombre de carrera
              $('#nombre_carrera').change(function() {
                var selectedCarrera = $(this).val();

                // Habilita o deshabilita el campo de nombre_plan según la selección
                if (selectedCarrera !== '') {
                  $('#nombre_plan').prop('disabled', false);
                  // Realiza una solicitud AJAX para obtener los planes basados en la carrera seleccionada
                  $.ajax({
                    url: 'filtroPost.php', // Reemplaza 'tuscript.php' con la URL de tu script PHP que consulta los planes
                    method: 'POST', // O 'GET' según tus necesidades
                    data: { carrera: selectedCarrera }, // Envía el valor seleccionado
                    success: function(data) {
                      // Limpia y actualiza el menú de planes con los resultados
                      $('#nombre_plan').html(data);
                    }
                  });
                } else {
                  $('#nombre_plan').prop('disabled', true);
                }
              });
            });
            </script>

              <label for="nombre_asignatura">Nombre Asignatura:</label>
              <select id="asignatura" name="asignatura" required>
                <option value=""></option>
                <?php
                  while ($row = $resultListAsig->fetch_assoc()) : ?>
                    <option value="<?php echo $row["id_asignatura"]; ?>"><?php echo $row["nom_asignatura"];?></option>
                <?php endwhile; ?>
              </select> 
            
      </div>
      <br>
      <div class="fila">  
        <label for="cuatrimestre">Cuatrimestre:</label>
        <input type="text" id="cuatrimestre" name="cuatrimestre">
        <br>
        <label for="Responsable">Responsable:</label>
        <input type="text" id="responsable" name="responsable" list="opciones_responsable">
        <datalist id="opciones_responsable">
          <option value=""></option>
          <?php
          include"consultas.php";
          $consultProgramas = "SELECT DISTINCT responsable FROM Programas";
          $resultProgramas = $conn->query($consultProgramas);
          while ($row = $resultProgramas->fetch_assoc()) {
            echo '<option value="' . $row["responsable"] . '">';
          }
          ?>
        </datalist>        
      <br>
      </div>
      <br>        
      <div class="fila">  
        <label for="Resolucion_CD">Resolucion CD:</label>
        <input type="text" id="Resolucion_CD" name="Resolucion_CD">
        <br>
        <label for="fecha_resolucion">Fecha Resolucion:</label>
        <input type="date" id="fecha_resolucion" name="fecha_resolucion">
        <br>
      </div>

      <div class="fila">
        <label for="documento">Documento (PDF):</label>
        <input type="file" id="documento" name="documento">
        <br>
        <div class="boton-container">
            <input type="submit" value="Subir" class="boton">
        </div>
    </div>

    </form>

    <br>
                          
      <section class="Result-busqueda">
        <center>
          <article>
              <h3>Resultado de la busqueda: se encontraron  <?php echo $totalProgramas; ?> resultados</h3> 
          </article>
          </center>

        <article class="tabla">
        <center>
          <table border="1">
            <tr>
              <th>N° Programa</th>
              <!-- --------------------> 
              <th>Nombre de Asignatura</th>
              <!-- ------------------->
              <th>Nombre de Carrera</th>
              <!-- -------------------->
              <th>Nombre de Plan de Estudio</th>
              <!-- ------------------->
              <th>Cuatrimestre</th>
              <th>Responsable</th>
              <th>Resolución CD</th>
              <th>Fecha Resolución</th>
              <!-- ------------------->
              <th>Documento PDF</th>
              <!-- <th>Archivo PDF</th> -->
            </tr>
            <?php
            $consulta = "SELECT * FROM programas
                                INNER JOIN carreras ON carreras.id_carrera = programas.id_carrera
                                INNER JOIN asignaturas ON asignaturas.id_asignatura = programas.id_asignatura
                                INNER JOIN plan_de_estudio ON plan_de_estudio.id_plan = programas.id_plan
                                ";
                                $result = $conn->query($consulta);

                                while ($rowPro = $result->fetch_assoc()) : 
                            
                                      ?>
                                      <tr>
                                      <td><?php echo $rowPro["id_programa"]; ?></td>
                                      <td><?php echo $rowPro["nom_asignatura"]; ?></td>
                                      <td><?php echo $rowPro["nombre_carrera"]; ?></td>
                                      <td><?php echo $rowPro["nombre_plan"]; ?></td>
                                      <td><?php echo $rowPro["cuatrimestre"]; ?></td>
                                      <td><?php echo $rowPro["responsable"]; ?></td>
                                      <td><?php echo $rowPro["resolucion_CD"]; ?></td>
                                      <td><?php echo $rowPro["fecha_resolucion"]; ?></td>
                                      <td><a href="../mostrarpdf.php
                                ?id_programa=<?php echo $rowPro["id_programa"];?> 
                                &nom_asignatura=<?php echo $rowPro["nom_asignatura"];?>
                                &nombre_carrera=<?php echo $rowPro["nombre_carrera"];?>
                                ">ver documento</a></td>                                     
                              </tr>
                                    <?php
                                  endwhile; ?>


          </table>
          </center>
        </article>
    
      </section>
    
  </body>
</html>

