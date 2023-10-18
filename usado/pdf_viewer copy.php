<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visor de PDF</title>
</head>
<body>
    <h1>Visor de PDF</h1>
    <?php
    include ("logica/conexion.php")

    //&query = "select * from "
    ?>

    <iframe src="view_pdf.php?id_programa=<?php    $id_programa['id_programa'];?> " width="800" height="600"></iframe>


    
    <h2>descargar</h2>

    



    
</body>
</html>
