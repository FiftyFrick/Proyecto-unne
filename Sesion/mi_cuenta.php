<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="css/mi_cuenta.css">
</head>
<body>
    
    <header>
    </header>

    <nav class="menu"> 
        <ul>
            <li>
                <a href="../index.php">Inicio</a> 
            </li>
            <li>
            
            <li>
                <?php
                    session_start();
                    error_reporting(0);
                    $varsession = $_SESSION ['username'];

                    if ($varsession == null ){
                        echo "<a href='login.html'> Inicia Sesion </a>";
                    }else{
                        echo "<strong> Bienvenido $varsession </strong>  ";
                        
                        echo "<li> <a href='../logica2/salir.php'> Cerrar Sesion </a> </li>";
                        
                    }
                ?>
            </li>

            
        </ul>
    </nav>
    
    <div class="FullBox">

        <div class="crud">

            <div class="select-info-user">
                
                <table > 
                    <h2>Datos <br> Personales</h2>
                    
                    <?php

                    include "logica/conexion.php";
                    
                    $sql =("SELECT * from bd_cuentas where usuario = '$varsession' ");                           
                    $res_sql = $conn->query($sql);
                    while ($mostrar = $res_sql->fetch_assoc()) {
                                                       
                    ?><tr>
                    <tr>
                        <td>Nombre: </td>
                        <td><?php  echo $mostrar['nombre']; ?> </td>
                    </tr>
                    <tr>
                    <td>Apellido: </td>
                        <td><?php  echo $mostrar['apellido']; ?> </td>
                    </tr>
                    <tr>
                    <td>Email: </td>
                        <td><?php  echo $mostrar['email']; ?> </td>
                    </tr>
                    <tr>
                    <td>Usuario: </td>
                        <td><?php  echo $mostrar['usuario']; ?> </td>
                    </tr>
                    <tr>
                    <td>Clave: </td>
                        <td> --- </td>
                    </tr>
                    <tr>
                    <tr>
                        <?php  if ($mostrar['administrador']==1){
                    echo ' <td>Adminitrador: </td>';
                    echo ' <td> SI </td>';
                        }?>
                    </tr>

                    <?php   
                    }
                    ?>
                </table>


            </div>

            <div class="update-info-user">
                <table > 
                    <h2>Actualizar <br> Datos</h2>
                    
                    <?php
                        echo '<form name="update-user" action="logica/update_info_user.php" method="post" autocomplete="off">';
            
                        echo '<input type="hidden" name="id" value="'.$Id.'"/>';
                        echo '
                            
                            <tr>
                                <td>Nombre: </td>
                                <td><input type="text" name="nombre" value="'.$nombre.'" required autocomplete="off"/></td>
                            </tr>

                            <tr>
                                <td>Apellido: </td>
                                <td><input type="text" name="apellido" value="'.$apellido.'" required autocomplete="off"/></td>
                            </tr>

                            <tr>
                                <td>Email: </td>
                                <td><input type="text" name="email" value="'.$email.'" required autocomplete="off"/></td>
                            </tr>

                            <tr>
                                <td>Usuario: </td>
                                <td><input type="text" name="usuario" value="'.$usuario.'" required autocomplete="off"/> </td>
                            </tr>

                            <tr>
                                <td>Clave: </td>
                                <td><input type="password" name="clave" value="'.$clave.'" required autocomplete="off"/></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td align="right"><input type="submit"  value="Save" /></td>
                            </tr>
                            
                            ';
                            
                        echo '</form>';
                        
                    ?>
                </table>

            </div>

            <div class="Delete-info-user">
                <h2>Eliminar <br> Cuenta</h2>
                <table>
                    <tr>
                        <form name="eliminar" action="logica/delete_user.php" method="POST">
                        <td align="center" ><input type="submit"  value="ELIMINAR" /></td>
                        </form>
                    </tr>
                </table>
                

            </div>

        </div>

    </div>
</body>
</html>