<?php
include "../logica/conexion.php";

    // Obtener datos del formulario
    $id_carrera = $_POST['idCarrera'];
    $carrera = $_POST['carrera'];

//    echo $id_carrera;

//    echo $carrera;

$sql = "UPDATE carreras SET nombre_carrera = '$carrera' where id_carrera = $id_carrera";

$resultado= mysqli_query($conn,$sql);



if ($resultado) {
    echo "<script language='javascript'>
    alert('Modificado correctamente');
    location.assign('update_carrera_asign.php');
    </script>";
} else {
    echo "<script language='javascript'>
    alert('Error al Modificar carrera');
    location.assign('update_carrera_asign.php');
    </script>";
}

?>