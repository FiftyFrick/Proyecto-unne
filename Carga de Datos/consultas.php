<?php
// Conexión a la base de datos
require "../logica/conexion.php";

$countCarreras = "SELECT COUNT(*) AS total FROM carreras";
$resultCountCarreras = $conn->query($countCarreras);

// Verificar si la consulta fue exitosa
if ($resultCountCarreras) {
  $row = $resultCountCarreras->fetch_assoc();
  $totalCarreras = $row['total'];
} else {
  $totalCarreras = "Error en la consulta: " . $conn->$error;
}

$consultcarreras = "SELECT * FROM carreras";
$resultcarrera = $conn->query($consultcarreras);

$listacarreras = "SELECT * FROM carreras";
$resultlistcarrera = $conn->query($listacarreras);


// ------------------------------------------------------------------------

$countAsignaturas = "SELECT COUNT(*) AS total FROM asignaturas";
$resultCountAsignatura = $conn->query($countAsignaturas);

// Verificar si la consulta fue exitosa
if ($resultCountAsignatura) {
  $row = $resultCountAsignatura->fetch_assoc();
  $totalAsignaturas = $row['total'];
} else {
  $totalAsignaturas = "Error en la consulta: " . $conn->$error;
}

// Consulta para obtener los datos de la tabla Programas
$consultAsignaturas = "SELECT * FROM asignaturas";
$resultAsignaturas = $conn->query($consultAsignaturas);

$listaAsig = "SELECT * FROM asignaturas";
$resultListAsig = $conn->query($listaAsig);


// ------------------------------------------------------------------------

$countPlan = "SELECT COUNT(*) AS total FROM plan_de_estudio";
$resultCountPlan = $conn->query($countPlan);

// Verificar si la consulta fue exitosa
if ($resultCountPlan) {
  $rowPlan = $resultCountPlan->fetch_assoc();
  $totalPlan = $rowPlan['total'];
} else {
  $totalPlan = "Error en la consulta: " . $conn->$error;
}

// Consulta para obtener los datos de la tabla Programas
$consultPlan = "SELECT * FROM plan_de_estudio";
$resultPlan = $conn->query($consultPlan);

$listaPlan = "SELECT * FROM plan_de_estudio";
$resultListPlan = $conn->query($listaPlan);


// ------------------------------------------------------------------------

$countProgramas = "SELECT COUNT(*) AS total FROM programas";
$resultCountProgramas = $conn->query($countProgramas);

// Verificar si la consulta fue exitosa
if ($resultCountProgramas) {
  $row = $resultCountProgramas->fetch_assoc();
  $totalProgramas = $row['total'];
} else {
  $totalProgramas = "Error en la consulta: " . $conn->$error;
}

// Consulta para obtener los datos de la tabla Programas
$consultProgramas = "SELECT * FROM Programas";
$resultProgramas = $conn->query($consultProgramas);

// ------------------------------------------------------------------------







?>