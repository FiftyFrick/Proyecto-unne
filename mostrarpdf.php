<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver PDF</title>
</head>
<body>

<?php
    include "logica/conexion.php";
    $id_programa = $_GET["id_programa"]; // Cambiar al parámetro adecuado


    $consulta = mysqli_query($conn, "SELECT *  FROM programas WHERE id_programa = $id_programa") ;
    $row = mysqli_fetch_assoc($consulta)   
?>

 <!-- 
    tester
<?php 
// echo $row["archivo"]; 

//  echo $row["archivo_PDF"]; 

?> -->


    <h1>Visualizar PDF</h1>
    <?php 
    if($row["archivo_PDF"]=="") {
        
?>
    <center>
    <h1>no existe el documento</h1>

    </center>


        <?php 
    }else{
        ?>
                <iframe src="Carga de Datos/files/<?php echo $row["archivo_PDF"]; ?>" width="100%" height="600"></iframe>

        <?php 
    }
?>


</body>
</html>
