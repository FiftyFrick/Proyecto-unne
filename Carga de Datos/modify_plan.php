<?php
include "../logica/conexion.php";

    // Obtener datos del formulario
    $IdPlanForm = $_POST["id_plan"];

    $NombPlanForm = $_POST["nombre_plan"];
    $nombre_carreraForm = $_POST["nombre_carrera"];
    $fecha_inicioForm = $_POST ["fecha_inicio"];
    $fecha_finForm = $_POST ["fecha_fin"]; 
    $res_cdForm = $_POST ["res_cd"]; 
    $res_sdForm = $_POST ["res_sd"]; 
    $res_coneauForm = $_POST ["res_coneau"]; 
    $res_modifForm = $_POST ["res_modif"]; 




        // Obtener datos de la base de datos
        $sql = "SELECT * FROM plan_de_estudio WHERE id_plan = $IdPlanForm";
        $resultado = mysqli_query($conn, $sql);    
        
        // while ($row = $resultado->fetch_assoc()) : 
  
        //     //     echo $row["id_plan"];
        //     //     echo $row["nombre_plan"]; 
        //     //     echo $row["nombre_carrera"]; 
        //          echo $row["fecha_inicio"]; 
        //     //     echo $row["fecha_fin"];
        //     //     echo $row["res_cd"]; 
        //     //     echo $row["res_sd"];
        //     //     echo $row["res_coneau"];
        //     //     echo $row["res_modif"];
        //         endwhile;
  

       if (mysqli_num_rows($resultado) > 0) {
        $row = $resultado->fetch_assoc();

                  echo $row["fecha_inicio"]; 

        // Crear una tabla para mostrar los datos del formulario y de la base de datos
        echo '<table border="1">';
        echo '<tr><th>Campo</th><th>Dato del Formulario</th><th>Dato de la Base de Datos</th></tr>';
        
        // Comparar y mostrar los datos en la tabla
        function mostrarFilaComparativa($nombreCampo, $datoFormulario, $datoBD) {
            echo "<tr><td>$nombreCampo</td><td>$datoFormulario</td><td>$datoBD</td></tr>";
        }
    
        mostrarFilaComparativa("ID Plan", $IdPlanForm, $row["id_plan"]);
        mostrarFilaComparativa("Nombre del Plan", $NombPlanForm, $row["nombre_plan"]);
        mostrarFilaComparativa("Id Carrera", $nombre_carreraForm, $row["id_carrera"]);
        mostrarFilaComparativa("Fecha de Inicio", $fecha_inicioForm, $row["fecha_inicio"]);
        mostrarFilaComparativa("Fecha de Fin", $fecha_finForm, $row["fecha_fin"]);
        mostrarFilaComparativa("Resolución CD", $res_cdForm, $row["res_cd"]);
        mostrarFilaComparativa("Resolución SD", $res_sdForm, $row["res_sd"]);
        mostrarFilaComparativa("Resolución CONEAU", $res_coneauForm, $row["res_coneau"]);
        mostrarFilaComparativa("Resolución Modificada", $res_modifForm, $row["res_modif"]);
    
        echo '</table>';
    } else {
        echo "No se encontraron resultados para el ID de plan proporcionado.";
    }

// Obtener datos de la base de datos
if (mysqli_num_rows($resultado) > 0) {
    echo "asta aca todo bien <br>";
    echo "ORIGINAL ROW:" . $row["fecha_inicio"];

    $datos = array(
        "ID Plan" => $row["id_plan"],
        "Nombre del Plan" => $row["nombre_plan"],
        "Nombre de Carrera" => $row["id_carrera"],
        "Fecha de Inicio" => $row["fecha_inicio"],
        "Fecha de Fin" => $row["fecha_fin"],
        "Resolución CD" => $row["res_cd"],
        "Resolución SD" => $row["res_sd"],
        "Resolución CONEAU" => $row["res_coneau"],
        "Resolución Modificada" => $row["res_modif"]
    );

    echo "<br> REMPLAZO DATOS:". $datos["Fecha de Inicio"] ."<br>";


} else {
    echo "No se encontraron resultados para el ID de plan proporcionado.";
}


// Reemplazar valores si no están vacíos
if (!empty($NombPlanForm)) {
    $datos["Nombre del Plan"] = $NombPlanForm;
}
if (!empty($nombre_carreraForm)) {
    $datos["Nombre de Carrera"] = $nombre_carreraForm;
}
echo "BD: " . $datos["Fecha de Inicio"];

if (!empty($fecha_inicioForm)) {
    echo "FORM: " . $fecha_inicioForm; 

    $datos["Fecha de Inicio"] = $fecha_inicioForm;
}
if (!empty($fecha_finForm)) {
    $datos["Fecha de Fin"] = $fecha_finForm;
}
if (!empty($res_cdForm)) {
    $datos["Resolución CD"] = $res_cdForm;
}
if (!empty($res_sdForm)) {
    $datos["Resolución SD"] = $res_sdForm;
}
if (!empty($res_coneauForm)) {
    $datos["Resolución CONEAU"] = $res_coneauForm;
}
if (!empty($res_modifForm)) {
    $datos["Resolución Modificada"] = $res_modifForm;
}

echo '</table>';

if (!empty($IdPlanForm)) {
    $updateQuery = "UPDATE plan_de_estudio SET 

        nombre_plan = '" . $datos["Nombre del Plan"] . "',
        id_carrera = '" . $datos["Nombre de Carrera"] . "',
        fecha_inicio = '" . $datos["Fecha de Inicio"] . "',
        fecha_fin = '" . $datos["Fecha de Fin"] . "',
        res_cd = '" . $datos["Resolución CD"] . "',
        res_sd = '" . $datos["Resolución SD"] . "',
        res_coneau = '" . $datos["Resolución CONEAU"] . "',
        res_modif = '" . $datos["Resolución Modificada"] . "'
        
    WHERE id_plan = $IdPlanForm";
    
    
    
    
    
    $updateResult = mysqli_query($conn, $updateQuery);
    if ($updateResult) {
        echo "Plan actualizado con éxito.<br>";
    } else {
        echo "Error al actualizar el Plan: " . mysqli_error($conn) . "<br>";
    }
}

// Imprimir los datos
echo '<table border="1">';
echo '<tr><th>Campo</th><th>Dato</th></tr>';

foreach ($datos as $campo => $dato) {
    echo "<tr><td>$campo</td><td>$dato</td></tr>";
}

echo '</table>';
//    echo $id_carrera;

//    echo $carrera;

// $sql = "UPDATE carreras SET nombre_carrera = '$carrera' where id_carrera = $id_carrera";

// $resultado= mysqli_query($conn,$sql);



// if ($resultado) {
//     echo "<script language='javascript'>
//     alert('Modificado correctamente');
//     location.assign('update_carrera_asign.php');
//     </script>";
// } else {
//     echo "<script language='javascript'>
//     alert('Error al Modificar carrera');
//     location.assign('update_carrera_asign.php');
//     </script>";
// }

?>