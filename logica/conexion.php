<?php
    session_start();

$host = "localhost";
$usuario= "root";
$clave= "123456";
$bd= "______";

$conexion= mysqli_connect($host,$usuario,$clave,$bd);
/*
if($conexion){
    echo "conectado correctamente";

}else{
    echo"no se pudo conectar";
}

*/
?>

