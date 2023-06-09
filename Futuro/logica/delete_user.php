<?php
    include "conexion.php";
    $varsession = $_SESSION ['username'];


    $sql =("SELECT * from bd_cuentas where usuario = '$varsession' ");                   
    $res_sql=mysqli_query($conexion,$sql);
    $return=mysqli_fetch_array($res_sql);

    $ID =  $return["id"];   

    $del_user = "DELETE FROM bd_cuentas WHERE id = $ID ";
    $sql_del=mysqli_query($conexion,$del_user);

    session_destroy();

    header("location: ../inicio.php");

exit();
