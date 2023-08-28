<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Efecto 4T Motopartes</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Efecto 4T <br> Motopartes</h1>

    </header>

    <nav class="menu"> 
        <ul>
            <li>
                <a href="inicio.php">Inicio</a> 
            </li>
            <li>
            <a href="Repuestos.php">Repuestos</a> 
            </li>
            <li>
                <a href="locales.php">Locales</a>
                
            </li>
            
            <li>
                <?php
                    session_start();
                    error_reporting(0);
                    $varsession = $_SESSION ['username'];

                    if ($varsession == null ){
                        echo "<a href='login.html'> Inicia Sesion </a>";
                    }else{
                        echo "<strong> Bienvenido $varsession </strong>  ";
                        
                        echo "<li> <a href='logica/salir.php'>   Cerrar Sesion </a> </li>";

                        echo "<li> <a href='mi_cuenta.php'> Mi cuenta </a> </li>";
                        
                    }
                ?>
                
            </li>
            
        </ul>
    </nav>

    <img class= "scroll" src="img/moto.jpg" alt="" >


    <div class="FullBox">

        <section class="contacto">
         
            <div class="verticalh1">
                <h1>Contacto</h1>
            </div>
                               
            <div class="cont-left">
                    <div class="spam"> 
                        <span class="cont-tit">Dirección</span> <br>
                        <span class="cont-dat">Castelli 1617</span> <br>
                        <span class="cont-tit">e-Mail</span> <br>
                        <span class="cont-dat">efecto4t@hotmail.com</span> <br>
                        <span class="cont-tit">Whatsapp</span> <br>
                        <span class="cont-dat">379-4939861</span> <br>
                        <span class="cont-tit">Redes</span> <br>
                    </div>
                    <div class="redes-cont">
                        <a href="https://www.facebook.com/martinbikemb/" target="_blank">
                            <img src="img/face-ico.png" alt="" width="15%" height="45%">
                        </a>
                        <a href="https://www.instagram.com/martin.bike/" target="_blank">
                            <img src="img/insta-ico.png" alt="" width="15%" height="45%">
                        </a>
                    </div>

                    <form class="contact_form" method="post" action="http:// /mail.php">

                        <div class="alert-success_msg" style="display:none;" role="alert">
                            Tu mensaje fue enviado exitosamente.
                        </div>

                        <div>
                            <input type="text" class="form-control_input" name="name" data-form-field="Name" placeholder="Nombre y Apellido *" required id="name-form4-m" value="">
                        </div>

                        <div data-for="email">
                            <input type="text" class="form-control_input" name="email" data-form-field="Email" placeholder="Email *" required id="email-form4-m" value="">
                        </div>

                        <div data-for="message">
                            <textarea class="form-control_input" name="message" rows="3" data-form-field="Message" placeholder="Consulta" style="resize:none" id="message-form4-m"></textarea>
                        </div>
                        
                        <div class="g-recaptcha" required data-sitekey="6LcA5sEUAAAAAAI900Ruzum4cIJP_YXO5BjdmNLb"></div>
                        
                        <div style="margin-top: 10px;">
                            <button href="" type="submit" class="btn btn-form btn-secondary display-4">ENVIAR</button>
                        </div>
                        
                    </form>
                        
            </div>                    
            
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4724.8844050297575!2d-58.812647326552685!3d-27.479718984303712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b724e62c29f%3A0x5c622c182fc304f2!2sMotopartes%20Efecto%204T!5e0!3m2!1ses!2sar!4v1666891732232!5m2!1ses!2sar" width="90%" height="90%" style="border:0;" allowfullscreen ="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section> 
    </div>
  


        <footer class="container">
            
            <div class="logo4t">
                <img src="img/logoefecto4t.jpg" alt="">
            </div>

            <div class="accesos_rapidos" >
                <h5>Accesos rapidos</h5>
                <ul>
                    <li><a href="/novedades.htm">Novedades</a></li>
                    <li><a href="/consejos.htm">Consejos</a></li>
                    <li><a href="/contacto.htm">Contacto</a></li>
                    <li style="display: none;"><a href="https://" target="_blank">Tienda MB</a></li>
                </ul>
            </div>
            
            <div class="redes">
                <h5>Seguinos en redes</h5>
                <div class="footer-redes">
                    <a href="https://www.facebook.com/profile.php?id=100012246216769" target="_blank">
                        <img src="img/face-ico.png" alt="" width="25%" height="30%">
                    </a>
                    <a href="https://www.instagram.com/efecto4t" target="_blank">
                        <img src="img/insta-ico.png" alt="" width="25%" height="30%">
                    </a>
                    <!--<a href="">
                        <img src="img/youtube.png" alt="">
                    </a>-->
                </div>
            </div>
            
        </footer>


        <footer class="pie">
            <p>
                Derechos reservados de Efecto 4T Motopartes
            </p>
        </footer>

        <a href="https://wa.me/543794939861?texto=Hola%20Efecto4T%20Quisiera%20consultar%20sobre..." class="btn-what" target="_blank">
            <img src="img/logo-w.png" class="logo-w" alt="" >
        </a>
</body>
</html>