<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asignatura = $_POST["asignatura"];
    $id_carrera = $_POST["id_carrera"];
    $id_plan = $_POST["id_plan"];
    $cuatrimestre = $_POST["cuatrimestre"];
    $Responsable = $_POST["Responsable"];
    $Resolucion_CD = $_POST["Resolucion_CD"];
    $fecha_resolucion = $_POST["fecha_resolucion"];
    $documento = file_get_contents($_FILES["documento"]["tmp_name"]);

    
    // Conexión a la base de datos
    include "logica/conexion.php";

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO Programas (asignatura, id_carrera, id_plan, cuatrimestre, Responsable, Resolucion_CD, fecha_resolucion, documento) 
    VALUES ('$asignatura','$asignatura','$id_programa','$id_carrera','$cuatrimestre','$Responsable','$Resolucion_CD','$fecha_resolucion', '$documento')";

    if ($conn->query($sql) === TRUE) {
        echo "Archivo subido y almacenado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
