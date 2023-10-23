<?php
// Comprobar si se cargó el archivo
if (isset($_FILES['archivo'])) {
    // Obtener datos del formulario

    // $nombre = $_POST['nombre_doc'];
    // $descripcion = $_POST['descripcion'];

    // Definir carpeta destino
    $carpeta_destino = "../Carga de Datos/files/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Verificar que sea un archivo PDF
    if ($extension == "pdf") {
        // Mover el archivo a la carpeta destino
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo)) {
            // Insertar la información del archivo en la base de datos
            include "../logica/conexion.php";

            $sql = "UPDATE programas SET nombre_doc = '$nombre', descripcion_doc = '$descripcion',archivo_PDF='$nombre_archivo' where id_programa = 1";

            // $sql = "INSERT INTO programas (nombre_doc, descripcion,archivo_PDF) VALUES ('$nombre', '$descripcion','$nombre_archivo')
            //  where 'id_programa' = 1";
            $resultado= mysqli_query($conn,$sql);

            if ($resultado) {
                echo "<script language='javascript'>
                alert('Archivo subido correctamente');
                location.assign('index.php');
                </script>";
            } else {
                echo "<script language='javascript'>
                alert('Error al subir el archivo: del Insert');
                location.assign('index.php');
                </script>";
            }
        } else {
            echo "<script language='javascript'>
            alert('Error al mover el archivo');
            location.assign('index.php');
            </script>";
        }
    } else {
        echo "<script language='javascript'>
        alert('Solo se permiten archivos PDF');
        location.assign('index.php');
        </script>";
    }
}
?>
