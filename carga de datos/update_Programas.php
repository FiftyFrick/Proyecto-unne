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
    <form action="modify_programas.php" method="post" enctype="multipart/form-data">

    <div class="fila">
        <label for="N_programa">Programa Numero:</label>
        <select id="id_programa" name="id_programa" required>
                  <option value=""></option>
                  <?php 
                    $conPlan = "SELECT * FROM programas";
                    $resuPlan = $conn->query($conPlan);

                  while ($rowlisPlan = $resuPlan->fetch_assoc()) : ?>
                      <option value="<?php echo $rowlisPlan["id_programa"]; ?>"><?php echo $rowlisPlan["id_programa"];?></option>
                  <?php endwhile; ?>
                </select>
    </div>
      <div class="fila">
          <section class="seleccion">
           
            <article>
              <label for="nombre_crrera">Nombre Carrera:</label>
              <select id="nombre_carrera" name="nombre_carrera" required>
                <option value=""></option>
                <?php 
                 $consultCarrera = "SELECT id_plan, carreras.id_carrera, carreras.nombre_carrera FROM plan_de_estudio INNER JOIN carreras ON carreras.id_carrera = plan_de_estudio.id_carrera GROUP BY carreras.id_carrera;";
                 $resultListCarrera = $conn->query($consultCarrera);               

                while ($rowListaNombre = $resultListCarrera->fetch_assoc()) : ?>
                    <option value="<?php echo $rowListaNombre["id_carrera"]; ?>"><?php echo $rowListaNombre["nombre_carrera"];?></option>
                <?php endwhile; ?>
              </select>
            </article>
          
              <article>
              <label for="nombre_plan">Nombre Plan:</label>
              <select id="nombre_plan" name="nombre_plan" required disabled>
                <option value=""></option>
              </select>
              </article>

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

              </article>

              <article>
              <label for="nombre_asignatura">Nombre Asignatura:</label>
              <input type="text" id="asignatura" name="asignatura" list="opciones_asignatura" required autocomplete="off"> 
              <datalist id="opciones_asignatura">
              <option value=""></option>
              <?php
              $distAsignatura = "SELECT * FROM asignaturas";
              $resDistAsignatura = $conn->query($distAsignatura);
              while ($rowDistAsignatura = $resDistAsignatura->fetch_assoc()) { ?>
                <option value="<?php echo $rowDistAsignatura["id_asignatura"]; ?>"><?php echo $rowDistAsignatura["nom_asignatura"];?></option>
<?php
                // echo '<option value="' . $rowDistAsignatura["id_asignatura"] . " ". $rowDistAsignatura["nom_asignatura"] . '">';
                
                }
              ?>
              </datalist>
              </article>

          </section>        
      </div>
      <br>
      <div class="fila">  
        <label for="cuatrimestre">Cuatrimestre:</label>
        <input type="text" id="cuatrimestre" name="cuatrimestre">
        <br>
        <label for="Responsable">Responsable:</label>
        <input type="text" id="responsable" name="responsable" list="opciones_responsable" autocomplete="off">
        <datalist id="opciones_responsable">
          <option value=""></option>
          <?php
          $consultProgramas = "SELECT DISTINCT responsable FROM programas";
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
        <input type="file" id="documento" name="documento" >
        <br>
       
        <div class="boton-container">
          <!-- <label for="visible">visible:</label>
          <input type="checkbox" value="visible"> -->
          <br>
            <input type="submit" value="Modificar" class="boton">
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
        <div style="max-height: 400px; overflow-y: scroll;">
          <table border="1">
            <thead>

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
            </thead>
            <tbody>
            <?php
            $consulta = "SELECT * FROM programas
                                INNER JOIN carreras ON carreras.id_carrera = programas.id_carrera
                                INNER JOIN asignaturas ON asignaturas.id_asignatura = programas.id_asignatura
                                INNER JOIN plan_de_estudio ON plan_de_estudio.id_plan = programas.id_plan
                                ORDER BY id_programa
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
                                ">ver documento</a></td>                                    </tr>
                                    <?php
                                  endwhile; ?>

          </tbody>
          </table>
          </div>
          </center>
        </article>
    
      </section>
    
  </body>
</html>

