<?php
// Conexión a la base de datos
include "logica/conexion.php";



// Obtener el contenido del archivo PDF desde la base de datos
$id_programa = $_GET["id_programa"]; // Cambiar al parámetro adecuado
$sql = "SELECT documento FROM Programas WHERE id_programa = $id_programa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pdf_content = $row["documento"];

    // Generar respuesta HTTP con el PDF
    header("Content-Type: application/pdf");
    header("Content-Length: " . strlen($pdf_content));
    header("Content-Disposition: inline; filename=archivo.pdf");
    echo $pdf_content;
} else {
    echo "Archivo no encontrado.";
}

$conn->close();
?>
