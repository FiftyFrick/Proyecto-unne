<?php
// Conexión a la base de datos
include "../logica/conexion.php";

$countcarreras = "SELECT COUNT(*) AS total FROM carreras";
$resultCountCarreras = $conn->query($countcarreras);

// Verificar si la consulta fue exitosa
if ($resultCountCarreras) {
  $row = $resultCountCarreras->fetch_assoc();
  $total = $row['total'];
} else {
  $total = "Error en la consulta: " . $conn->$error;
}

$consultcarreras = "SELECT * FROM carreras";
$resultcarrera = $conn->query($consultcarreras);

?>