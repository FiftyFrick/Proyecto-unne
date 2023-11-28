<?php
require "../logica/conexion.php";

$conexion= $conn;

// if($conexion){
//      echo "conectado correctamente";

// // }else{
// //     echo"no se pudo conectar";
// // }

session_start();

$usuario= $_POST["usuario"];
$clave= $_POST["clave"];

$q = "SELECT COUNT(*) AS CONTAR from bd_cuentas where usuario = '$usuario' and clave = '$clave' ";
$consulta = mysqli_query($conexion,$q);
$array= mysqli_fetch_array($consulta);

if ($array['CONTAR'] > 0){
    $_SESSION ['username'] = $usuario;
    header("location: ../index.php");
     
}else{
    echo
    '<script>
    alert("datos incorrectos");
    window.history.go(-1);
    </script>';
    echo "<a href='../../index.php'> Volver a la Pagina Principal </a>";
}

mysqli_free_result($consulta);




?>