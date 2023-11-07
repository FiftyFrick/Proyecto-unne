<?php
include "../logica/conexion.php";

    // Obtener datos del formulario
    $id_asignatura = $_POST['idAsignatura'];
    $asignatura = $_POST['asignatura'];

//    echo $id_carrera;

//    echo $carrera;


$sql = "UPDATE asignaturas SET 	nom_asignatura = '$asignatura' where id_asignatura = $id_asignatura";

$resultado= mysqli_query($conn,$sql);



if ($resultado) {
    echo "<script language='javascript'>
    alert('Modificado correctamente');
    location.assign('update_carrera_asign.php');
    </script>";
} else {
    echo "<script language='javascript'>
    alert('Error al Modificar Asignatura');
    location.assign('update_carrera_asign.php');
    </script>";
}
?>