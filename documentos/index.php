 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styleIndex.css">

    <title>Document</title>
 </head>
 <body>

 
<a href="upload_form.html"><h1>cargar documentos</h1></a> 

<?php
include("../logica/conexion.php");

// Consulta para obtener los datos de la tabla Programas
$consulta = mysqli_query($conn, "SELECT * FROM documentos") ;
?>

    <table border="1">
      <tr>
          <th>id_documento</th>
          <th>nombre_doc</th>
          <th>descripcion</th>
          <th>archivo</th>
          <th>PDFs</th>

      </tr>

      <?php while ($row = mysqli_fetch_assoc($consulta)) : ?>
          <tr>
              <td><?php echo $row["id_documento"]; ?></td>
              <td><?php echo $row["nombre_doc"]; ?></td>
              <td><?php echo $row["descripcion"]; ?></td>
              <td><?php echo $row["archivo"]; ?></td>

                <td> <a href="mostrarpdf.php?id_documento=<?php echo $row["id_documento"]; ?>">ver documento</a> </td>

            </tr>
      <?php endwhile; ?>
  </table>


 </body>
 </html>
 
