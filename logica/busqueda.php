<?php

session_start();
$conexion= mysqli_connect("localhost","root","123456","_______");

$buscar = $_POST["buscar"];

$b = "SELECT COUNT(*) AS CONTAR from repuestos where articulo like '%$buscar%'";
$consulta = mysqli_query($conexion,$b);
$busqueda= mysqli_fetch_array($consulta);

if ($busqueda['CONTAR'] > 0){
    echo "$busqueda";
}else{
    echo "no se encontraron resultados";

}
//header("location: ../repuestos.php");


mysqli_free_result($consulta);


