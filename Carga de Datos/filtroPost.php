<?php
require "../logica/conexion.php";


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se recibió una solicitud POST con la variable 'carrera'
if (isset($_POST['carrera'])) {
    $selectedCarrera = $_POST['carrera'];

    // Realiza una consulta SQL para obtener los planes de estudio basados en la carrera seleccionada
    $sql = "SELECT id_plan, nombre_plan FROM plan_de_estudio WHERE id_carrera = ?";    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedCarrera);
    $stmt->execute();
    $result = $stmt->get_result();

    // Genera opciones para el menú desplegable de Plan de Estudio
    $options = '<option value=""></option>';

    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['id_plan'] . '">' . $row['nombre_plan'] . '</option>';
    }

    echo $options;
    

} else {
    echo "No se recibió una carrera válida.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
