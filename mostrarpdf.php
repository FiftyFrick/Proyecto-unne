<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver PDF</title>
    <link rel="stylesheet" href="css/style_PDF.css">
</head>
<body>
    
<?php
    include "logica/conexion.php";
    $id_programa = $_GET["id_programa"]; // Cambiar al parámetro adecuado
    $nom_asignatura = $_GET["nom_asignatura"]; // Cambiar al parámetro adecuado
    $nombre_carrera = $_GET["nombre_carrera"]; // Cambiar al parámetro adecuado


    $consulta = mysqli_query($conn, "SELECT *  FROM programas WHERE id_programa = $id_programa") ;
    $row = mysqli_fetch_assoc($consulta)   
?>

 <!-- 
    tester
<?php 
// echo $row["archivo"]; 

//  echo $row["archivo_PDF"]; 

?> -->
<div class="cabeza">

    <div class="datosBusqueda">
        <h1><?php echo $nombre_carrera; ?></h1>
        <h2><?php echo  $nom_asignatura; ?></h2>
    </div>
    
    <div class="volver">
        <a href="index.php"><img src="img/flecha.png" width="50px" height="50px"></a>
        <h3>volver atras</h3>
    </div>
</div>
    <?php 
        if($row["archivo_PDF"]=="") {
    
    ?>



    <center>
    <h1>no existe el documento</h1>

    </center>


        <?php 
    }else{
        ?>
                <iframe src="Carga de Datos/files/<?php echo $row["archivo_PDF"]; ?>" width="100%" height="550"></iframe>

        <?php 
    }
?>


</body>
</html>
