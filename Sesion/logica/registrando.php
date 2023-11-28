<?php

include "../../logica/conexion.php";
require "../../logica/conexion.php";
session_start();
$nombre = $_POST ["nombre"];
$apellido = $_POST ["apellido"];
$email = $_POST ["email"];
$usuario = $_POST ["usuario"];
$clave = $_POST ["clave"];


$verificar_usuario = mysqli_query($conexion, "select * from bd_cuentas where usuario = '$usuario' ");

if (mysqli_num_rows($verificar_usuario) > 0){
    echo '<script>
            alert("el usuario ya esta registrado");
            window.history.go(-1);
            </script>';
    exit;
}else{
    $verificar_email = mysqli_query($conexion, "select * from bd_cuentas where email = '$email' ");

    if (mysqli_num_rows($verificar_email) > 0){
        echo '<script>
                alert("el Email ya esta registrado");
                window.history.go(-1);
                </script>';
        exit;
    }else{
    
    $insertar = "insert into bd_cuentas(nombre, apellido,email,usuario,clave) values ( '$nombre', '$apellido', '$email', '$usuario','$clave')" ;

    $resultado = mysqli_query($conexion, $insertar);

    }
}

if (!$resultado){
    echo '<script>
            alert("Error al Regristrarse");
            window.history.go(-1);
            </script>';
    }else{
    echo '<script>
    alert("usuario registrado exitosamente");
    header("location: ../inicio.php");
    </script>';
}

mysqli_close($conexion);