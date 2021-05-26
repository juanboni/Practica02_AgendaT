<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Gestion de usuarios</title>
        <link href="../css/configuracionp.css" rel="stylesheet" />
    </head>
    <body>

    <?php
   
   session_start();
 
   if (!isset($_SESSION['rol'])) {
       # code... 
       header( "Location:/SistemaDeGestion/public/controladores/login.php");
   }else {
       # code...
       if ($_SESSION['rol'] ==2) {
 
           header("Location:/SistemaDeGestion/admin/vista/usuario/accsesodu.php");
           //echo "<p>no es administrador</p>";
       }
   }
   ?>
    <div id="contenedor">
    <header>
        
        <a href="ct_start.html"><img src="../img/logot.png" alt="Curbside Thai" /></a>
        <nav>
            <ul class="menu">
                <?php
                $codigoU = $_GET["codigoU"];
           
           echo" <li><a href='iniciou.php?codigoU=".$codigoU."'>inicio</a></li>";
           echo" <li><a href='telefono.php?codigoU=".$codigoU."'> Mi Telefono</a></li>";
           echo" <li><a href='buscar.php?codigoU=".$codigoU."'>Buscar</a></li>";
           echo" <li><a href='configuracion_perfil.php?codigoU=".$codigoU."'>configuracion</a></li>";
            ?>
            </ul>
           </nav>
      
     </header>
    
     <section id="contenido">
       
        <table > 
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Cambiar contrasena</th>
            <th>Cerrar sesion</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $codigoU = $_GET["codigoU"];
        $sql="SELECT*FROM usuario WHERE usu_eliminado='N' and usu_codigo='$codigoU'";
        $result=$conn->query($sql);

        if ($result->num_rows>0) {
            # code...
            while ($row = $result->fetch_assoc()) {
                # code...
                echo"<tr>";
                echo" <td>".$row["usu_cedula"]."</td>";
                echo" <td>".$row["usu_nombres"]."</td>";
                echo" <td>".$row["usu_apellidos"]."</td>";
                echo" <td>".$row["usu_direccion"]."</td>";
                echo" <td>".$row["usu_telefono"]."</td>";
                echo" <td>".$row["usu_correo"]."</td>";
                echo" <td>".$row["usu_fecha_nacimiento"]."</td>";
                echo" <td> <a href='eliminaru.php?codigo=".$row['usu_codigo']."'>Eliminar</a></td>";
                echo" <td> <a href='modificaru.php?codigo=".$row['usu_codigo']."'>Modificar</a></td>";
                echo" <td> <a href='cambiar_contrasenau.php?codigo=".$row['usu_codigo']."'>Cambiarcontrasena</a></td>";
                echo" <td> <a href='../../../config/cerrar_sesion.php'>cerrar_sesion</td>";
                echo"</tr>";
            }
        }else {
            echo"<tr>";
            echo"<td colspan='7' No existen usuarios registrados en el sistema </td>";
            echo"</tr>";
        }

        $conn->close();
        echo"<div class='center'>";
        echo"<img src='../img/user.jpg' alt='Curbside Thai' />";
        echo "</div>";
        ?>
        
        </table>
        <br>
       
        </section>
        
        <footer>
        <p>Publicado por: Juan Boni ,Janeth Matute</p>
         <p>informacion de contacto: <a href="mailto:TastyPoke@gmail.com">
        TastyPoke@gmail.com</a>.</p>
        <p>Call: <a href=”tel:+5933022307”>(593) 302-2307</a></p>
         <p>copyright &copy;Todos los derechos reservados</p>
        </footer>
    </div>
    </body>
</html>