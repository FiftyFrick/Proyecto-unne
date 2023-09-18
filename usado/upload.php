<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
    <link rel="stylesheet" href="css/upload.css">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asignatura = $_POST["asignatura"];
    
    // $id_carrera = $_POST["id_carrera"];
    // $id_plan = $_POST["id_plan"];
    // $cuatrimestre = $_POST["cuatrimestre"];
    // $Responsable = $_POST["Responsable"];
    // $Resolucion_CD = $_POST["Resolucion_CD"];
    // $fecha_resolucion = $_POST["fecha_resolucion"];

    $documento = file_get_contents($_FILES["documento"]["tmp_name"]);

    
    // Conexión a la base de datos
    include "logica/conexion.php";

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO programas (asignatura, documento) VALUES ('$asignatura', '$documento')";

    // $sql = "INSERT INTO Programas (asignatura, id_carrera, id_plan, cuatrimestre, Responsable, Resolucion_CD, fecha_resolucion, documento) 
    // VALUES ('$asignatura','$id_carrera','$id_plan','$cuatrimestre','$Responsable','$Resolucion_CD','$fecha_resolucion', '$documento')";
    
    $sql = "INSERT INTO programas (asignatura, documento) VALUES ('$asignatura', '$documento)";
    $resultado= mysqli_query($conn,$sql);

   
   if ($resultado === TRUE) {
        echo "Archivo subido y almacenado correctamente.";
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>
