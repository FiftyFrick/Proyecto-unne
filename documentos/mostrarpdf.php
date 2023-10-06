<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver PDF</title>
</head>
<body>

<?php
    include "../logica/conexion.php";

    $id_documento = $_GET["id_documento"]; // Cambiar al parámetro adecuado

    $consulta = mysqli_query($conn, "SELECT *  FROM documentos WHERE id_documento = $id_documento") ;
    $row = mysqli_fetch_assoc($consulta)   
?>

<!-- 
tester
<?php 
// echo $row["archivo"]; 

// echo $row["id_documento"]; 

?> -->


    <h1>Visualizar PDF</h1>

    <iframe src="files/<?php echo $row["archivo"]; ?>" width="100%" height="600"></iframe>


</body>
</html>
