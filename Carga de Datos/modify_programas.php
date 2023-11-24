<?php
// Conexión a la base de datos
require "../logica/conexion.php";

// Verificar si la clave "nombre_plan" está presente en $_POST
$IdProgramaForm = $_POST["id_programa"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['asignatura'])) {
        // Formulario de planes de estudio
        $asignatura = $_POST['asignatura'];
        $nombre_plan = $_POST['nombre_plan']; //necesito que sea un int "id_plan"
        $nombre_carrera = $_POST['nombre_carrera']; //necesito que sea un int "id_carrera"
        $cuatrimestre = $_POST['cuatrimestre'];
        $responsable = $_POST['responsable'];
        $resolucion_CD = $_POST['Resolucion_CD'];
        $fecha_resolucion = $_POST['fecha_resolucion'];

         $documento = $_FILES['documento'];
        // echo $nombre_plan ;
        // echo $asignatura ;
        if (empty($_FILES['documento']) || $_FILES['documento']['error'] === UPLOAD_ERR_NO_FILE) {
            // No se ha subido ningún archivo
            echo "No se ha subido ningún archivo.";

            // $insertPrograma = "INSERT INTO programas 
            // (id_asignatura, id_carrera, id_plan, cuatrimestre, responsable, resolucion_CD, fecha_resolucion)
            //  VALUES ('$asignatura', '$nombre_carrera', '$nombre_plan', '$cuatrimestre', '$responsable', '$resolucion_CD', '$fecha_resolucion')";
            // $resultado = mysqli_query($conn, $insertPrograma);
      
                    if (!empty($IdProgramaForm)) {
                        $updateQuery = "UPDATE programas SET 

                            id_asignatura = '" . $asignatura. "',
                            id_carrera = '" . $nombre_carrera. "',
                            id_plan = '" . $nombre_plan . "',
                            cuatrimestre = '" . $cuatrimestre . "',
                            responsable = '" . $responsable . "',
                            resolucion_CD = '" . $resolucion_CD . "',
                            fecha_resolucion = '" . $fecha_resolucion . "'
                            
                        WHERE id_programa = $IdProgramaForm";
                    }
                        
                    $updateResult = mysqli_query($conn, $updateQuery);

                    if ($updateResult) {
                        // Redirigir de vuelta a la página anterior con un mensaje de éxito
                        header("Location: {$_SERVER['HTTP_REFERER']}?mensaje=exito");
                        
                        
                    } else {
                        echo "Error al Actualizar el programa: " . mysqli_error($conn);
                    }exit(); // Asegurar que el script se detenga después de redirigir
                

        } else {
            // TESTER DE DOCUMENTO
            // Archivo subido correctamente o hay información en el array $_FILES['documento']
            // Procede a procesar los datos del archivo, si los hay
            // $nombreArchivo = $_FILES['documento']['name'];
            // $tipoArchivo = $_FILES['documento']['type'];
            // ... y así sucesivamente para acceder a otros atributos del archivo.
            echo "¡Archivo subido!";

            // Verifica la existencia de archivos en el formulario
            if (isset($_FILES['documento'])) {
            // Definir carpeta destino
            $carpeta_destino = "files/";

            // Obtener el nombre y la extensión del archivo
            $nombre_archivo = basename($_FILES["documento"]["name"]);

            $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

            // Verifica que el archivo sea un PDF
            if ($extension == "pdf") {
                // Mueve el archivo a la carpeta destino
                if (move_uploaded_file($_FILES['documento']['tmp_name'], $carpeta_destino . $nombre_archivo)) {
                    
                    // ACTUALIZAR en la base de datos
                    
                    // $updatePrograma = "INSERT INTO programas 
                    // (id_asignatura, id_carrera, id_plan, cuatrimestre, 
                    // responsable, resolucion_CD, fecha_resolucion, archivo_PDF)
                    
                    // VALUES ('$asignatura', '$nombre_carrera', '$nombre_plan', '$cuatrimestre',
                    //  '$responsable', '$resolucion_CD', '$fecha_resolucion', '$nombre_archivo')";

                    // $resultado = mysqli_query($conn, $updatePrograma);

                    if (!empty($IdProgramaForm)) {
                        $updateQuery = "UPDATE programas SET 

                            id_asignatura = '" . $asignatura. "',
                            id_carrera = '" . $nombre_carrera. "',
                            id_plan = '" . $nombre_plan . "',
                            cuatrimestre = '" . $cuatrimestre . "',
                            responsable = '" . $responsable . "',
                            resolucion_CD = '" . $resolucion_CD . "',
                            fecha_resolucion = '" . $fecha_resolucion . "',
                            archivo_PDF = '" . $nombre_archivo . "'

                            WHERE id_programa = $IdProgramaForm";
                    }
                        
                    $updateResult = mysqli_query($conn, $updateQuery);

                    if ($updateResult) {
                        // Redirigir de vuelta a la página anterior con un mensaje de éxito
                        header("Location: {$_SERVER['HTTP_REFERER']}?mensaje=exito");
                        exit(); // Asegurar que el script se detenga después de redirigir
                    } else {
                        echo "Error al Actualizar el programa: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error al mover el archivo a la carpeta destino.";
                }
            } else {
                echo "Solo se permiten archivos PDF.";
            }
        }


    }
} else {
    echo "La solicitud no es de tipo POST.";
}



?>
