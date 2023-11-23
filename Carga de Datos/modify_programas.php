<?php
// Conexión a la base de datos
require "../logica/conexion.php";

// Verificar si la clave "nombre_plan" está presente en $_POST
$IdProgramaForm = $_POST["id_programa"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['asignatura'])) {
        // Formulario de Programas
        $asignatura = $_POST['asignatura'];
        $nombre_plan = $_POST['nombre_plan']; // "id_plan"
        $nombre_carrera = $_POST['nombre_carrera']; // "id_carrera"
        $cuatrimestre = $_POST['cuatrimestre'];
        $responsable = $_POST['responsable'];
        $resolucion_CD = $_POST['Resolucion_CD'];
        $fecha_resolucion = $_POST['fecha_resolucion'];

        // $documento = $_FILES['documento'];
        // echo $nombre_plan ;
        // echo $asignatura ;

// ---------------------------------------------------------------------------------------
// OBTENER DATOS DE LA BASE DE DATOS
$sqlBD = "SELECT * FROM programas WHERE id_programa = $IdProgramaForm";
$resultadoBD = mysqli_query($conn, $sqlBD);    

if (mysqli_num_rows($resultadoBD) > 0) {
$row = $resultadoBD->fetch_assoc();

}

if (mysqli_num_rows($resultadoBD) > 0) {

$datosBD = array(
"Id programa" => $row["id_programa"],
"Asignatura" => $row["id_asignatura"],
"Id Plan" => $row["id_plan"],
"Id Carrera" => $row["id_carrera"],
"Cuatrimestre" => $row["cuatrimestre"],
"Responsable" => $row["responsable"],
"Resolucion CD" => $row["resolucion_CD"],
"Fecha resolucion" => $row["fecha_resolucion"]
);
} else {
    echo "No se encontraron resultados para el ID de plan proporcionado.";
}
// ---------------------------------------------------------------------------------------

// Reemplazar valores si están vacíos
if (empty($asignatura)) {
    $asignatura = $datosBD["Asignatura"] ;
}
if (empty($nombre_plan)) {
    $nombre_plan = $datosBD["Id plan"];
}
if (empty($nombre_carrera)) {
    $nombre_carrera = $datosBD["Id carrera"];
}
if (empty($cuatrimestre)) {
    $cuatrimestre = $datosBD["Cuatrimestre"] ;
}
if (empty($responsable)) {
    $responsable = $datosBD["Responsable"] ;
}
if (empty($resolucion_CD)) {
    $resolucion_CD = $datosBD["Resolucion CD"] ;
}
if (empty($fecha_resolucion)) {
     $fecha_resolucion = $datosBD["Fecha resolucion"] ;
}

echo $responsable;

// ------------------------------------------------------------------------------------------



        if (empty($_FILES['documento']) || $_FILES['documento']['error'] === UPLOAD_ERR_NO_FILE) {
            // SI NO EXISTE UN ARCHIVO PDF INGRESA EN ESTA CONDICION

            // No se ha subido ningún archivo
            echo "No se ha subido ningún archivo.";

      
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
            // SI EXISTE DATOS INFORMACION DE UN ARCHIVO PDF INFRESA EN ESTA CONDICION

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
    }
} else {
    echo "La solicitud no es de tipo POST.";
}



?>
