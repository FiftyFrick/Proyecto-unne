<?php
    include "conexion.php";
/*      session_start();
 */     $varsession = $_SESSION ['username'];


    $sql =("SELECT * from bd_cuentas where usuario = '$varsession' ");                   
    $res_sql=mysqli_query($conn,$sql);
    $return=mysqli_fetch_array($res_sql);

    $ID =  $return["id"];    


    $nombre = $_POST["nombre"];   
    $apellido = $_POST["apellido"]; 
    $email = $_POST["email"]; 
    $usuario = $_POST["usuario"];   
    $clave = $_POST["clave"];   
    
     
 
         
             // SQL Query
            $cname__select = "UPDATE bd_cuentas SET nombre = '$nombre' , apellido= '$apellido' , email ='$email' ,usuario ='$usuario',clave ='$clave'  WHERE id = $ID ";
             
             
            //Execute Query
            $cname__select_Query= mysqli_query($conn,$cname__select);
             
             
             
            if (empty($nombre)) {
                 
                echo '<span style="color:red; ">Debe Ingresar su nombre.</span><br /><br />'; 
                 
             
            }else{
             
                if ($cname__select_Query)  {    
                            echo '<script>
                            alert("Tu informacion se a actualizado Satisfactoriamente.");
                            window.history.go(-2);
                            </script>';
                        session_destroy();         
                        exit();

                        } else {
                            echo '<span style="color:red; ">Tu informacion a FALLADO en actualizarce.</span><br /><br />';                           
                        }      
                        
            }

            
 

?>