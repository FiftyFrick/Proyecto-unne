<?php
// Conexión a la base de datos
require "../logica/conexion.php";
// // Verificar si la clave "plan_de_estudio" está presente en $_POST
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['plan_de_estudio'])) {
//         // Formulario de planes de estudio
//         if (isset($_POST['nombre_plan']) && !empty($_POST['nombre_plan'])) {
//             $nombre_plan = $_POST['nombre_plan'];
//         } else {
//             $nombre_plan = $_POST['plan_de_estudio'];
//         }
 
        $nombre_plan = $_POST['nombre_plan'];
        $nombre_carrera = $_POST['nombre_carrera'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $res_cd = $_POST['res_cd'];
        $res_sd = $_POST['res_sd'];
        $res_coneau = $_POST['res_coneau'];
        $res_modif = $_POST['res_modif'];

        echo $nombre_plan;
        echo $nombre_carrera;
        

        // Verifica que el campo de plan de estudio no esté vacío
        if (!empty($nombre_plan)) {
            $insertPlan = "INSERT INTO plan_de_estudio (nombre_plan, id_carrera, fecha_inicio, fecha_fin, res_cd, res_sd, res_coneau, res_modif)
                           VALUES ('$nombre_plan', '$nombre_carrera', '$fecha_inicio', '$fecha_fin', '$res_cd', '$res_sd', '$res_coneau', '$res_modif')";
            $resultado = mysqli_query($conn, $insertPlan);

            if ($resultado) {
                // Redirigir de vuelta a la página anterior con un mensaje de éxito
                header("Location: {$_SERVER['HTTP_REFERER']}?mensaje=exito");
                exit(); // Asegurar que el script se detenga después de redirigir
            } else {
                echo "Error al insertar el plan de estudio: " . mysqli_error($conn);
            }
        } else {
            echo "El campo de plan de estudio no puede estar vacío.";
        }
//    }
// } else {
//     echo "La solicitud no es de tipo POST.";
//}
?>