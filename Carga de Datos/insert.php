<?php
// Conexión a la base de datos
require "../logica/conexion.php";

// Verificar si la clave "asignatura" está presente en $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['carreras'])) {
        // Formulario de carreras
        $nombre_carrera = $_POST['carreras'];

        // Verifica que el campo no esté vacío
        if (!empty($nombre_carrera)) {
            $insertCarrera = "INSERT INTO carreras (nombre_carrera) VALUES ('$nombre_carrera')";
            $resultado = mysqli_query($conn, $insertCarrera);

            if ($resultado) {
                // Redirigir de vuelta a la página anterior con un mensaje de éxito
                header("Location: {$_SERVER['HTTP_REFERER']}?mensaje=exito");
                exit(); // Asegurar que el script se detenga después de redirigir
            } else {
                echo "Error al insertar la carrera: " . mysqli_error($conn);
            }
        } else {
            echo "El campo de carreras no puede estar vacío.";
        }
    } elseif (isset($_POST['asignatura'])) {
        // Formulario de asignaturas
        $asignatura = $_POST['asignatura'];

        // Verifica que el campo no esté vacío
        if (!empty($asignatura)) {
            $insertAsignatura = "INSERT INTO asignaturas (nom_asignatura) VALUES ('$asignatura')";
            $resultado1 = mysqli_query($conn, $insertAsignatura);

            if ($resultado1) {
                // Redirigir de vuelta a la página anterior con un mensaje de éxito
                header("Location: {$_SERVER['HTTP_REFERER']}?mensaje=exito");
                exit(); // Asegurar que el script se detenga después de redirigir
            } else {
                echo "Error al insertar la asignatura: " . mysqli_error($conn);
            }
        } else {
            echo "El campo de asignatura no puede estar vacío.";
        }
    }
} else {
    echo "La solicitud no es de tipo POST.";
}
?>
