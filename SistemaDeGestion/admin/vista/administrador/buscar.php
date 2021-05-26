<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="buscar.js" ></script>
        <script type="text/javascript" src="buscarc.js" ></script>
        <title>Buscar Persona</title>
        <link href="../css/estilos.css" rel="stylesheet" />
    </head>
    <body> 
    <?php
   
   session_start();
 
   if (!isset($_SESSION['rol'])) {
       # code... 
       header( "Location:/SistemaDeGestion/public/controladores/login.php");
   }else {
       # code...
       if ($_SESSION['rol'] ==1) {
 
           header("Location:/SistemaDeGestion/admin/vista/usuario/accsesodu.php");
           //echo "<p>no es administrador</p>";
       }
   }
   ?>
        <div id="contenedor">
            <header>
        
                <img src="../img/logot.png" alt="Curbside Thai" />
                
                <nav>
                    <ul class="menu">
                        <?php
                        $codigoU = $_GET["codigoU"];
                   
                        echo" <li><a href='inicioa.php?codigoU=".$codigoU."'>inicio</a></li>";
                       
                        echo" <li><a href='buscar.php?codigoU=".$codigoU."'>Buscar</a></li>";
                        echo" <li><a href='../../../config/cerrar_sesion.php'>Cerrar sesion</a></li>";
                    ?>
                    </ul>
                  
             </header>

             <section id="contenido">
                <div class="centert">
                    <img src="../img/telefono.jpeg" alt="Curbside Thai" />
                </div>
                <form class="form_search" onsubmit="return buscarPorCedula()" action="../../controladores/usuario/buscar.php" method="POST">
        <input type="text" id="cedula" name="cedula" value="">
        <input class ="btn_search" type="button" id="buscar" name="buscar" value="buscar" onclick="buscarPorCedula()" >
        </form>
        <div id="informacion"><b>Datos de la persona</b></div>
        <br>
        <form class="form_search" onsubmit="return buscarPorCorreo()" action="../../controladores/usuario/buscarc.php" method="POST">
            <input type="text" id="correo" name="correo" value="">
            <input  class ="btn_search" type="button" id="buscarc" name="buscarc" value="buscarc" onclick="buscarPorCorreo()" >
            </form>
            <br>
        
        <div id="informacionco"><b>Datos de la persona por correo</b></div>

        <br>
      
        </section>

        <footer>
            <p>Publicado por: Juan Boni ,Janeth Matute</p>
             <p>informacion de contacto: <a href="mailto:TastyPoke@gmail.com">
            TastyPoke@gmail.com</a>.</p>
            
            <p>Call: <a href=”tel:+593984969689”>984969689</a></p>
             <p>copyright &copy;Todos los derechos reservados</p>
            </footer>
           </section>
       </div>
      
    </body>
</html>