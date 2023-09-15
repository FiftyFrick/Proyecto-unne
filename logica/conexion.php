<?php
    session_start();

$host = "localhost";
$usuario= "root";
$clave= "";
$bd= "UNNE_Programas";

$conn= mysqli_connect($host,$usuario,$clave,$bd);


//$conn = new mysqli($host,$usuario,$clave,$bd);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

/*
if($conn){
    echo "conectado correctamente";

}else{
    echo"no se pudo conectar";
}

*/
?>

