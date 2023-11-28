<?php

include "../logica/conexion.php";
$nombre = $_POST ["nombre"];
$apellido = $_POST ["apellido"];
$email = $_POST ["email"];
$usuario = $_POST ["usuario"];
$clave = $_POST ["clave"];
$tipoUsuario = $_POST ["tipo_usuario"];


$verificar_usuario = mysqli_query($conn, "select * from bd_cuentas where usuario = '$usuario' ");

if (mysqli_num_rows($verificar_usuario) > 0){
    echo '<script>
            alert("el usuario ya esta registrado");
            window.history.go(-1);
            </script>';
    exit;
}else{
    $verificar_email = mysqli_query($conn, "select * from bd_cuentas where email = '$email' ");

    if (mysqli_num_rows($verificar_email) > 0){
        echo '<script>
                alert("el Email ya esta registrado");
                window.history.go(-1);
                </script>';
        exit;
    }else{
    
    $insertar = "INSERT INTO bd_cuentas(nombre, apellido,email,usuario,clave,administrador) VALUES ( '$nombre', '$apellido', '$email', '$usuario','$clave', '$tipoUsuario')" ;

    $resultado = mysqli_query($conn, $insertar);

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
    window.location.href = "../index.php";
    </script>';
}

mysqli_close($conn);