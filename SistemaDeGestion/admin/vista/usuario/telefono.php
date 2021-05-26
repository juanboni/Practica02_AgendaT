<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Gestion de usuarios</title>
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
            <th>codigo</th>
            <th>codigo_usuario</th>
            <th>telefono</th>
            <th>tipo</th>
            <th>operadora</th>
            <th>Eliminar</th>
            <th>Modificar</th>
           
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $codigoU = $_GET["codigoU"];
        $sql="SELECT*FROM telefono where tel_usu_codigo='$codigoU' and tel_eliminado='N'";
        $result=$conn->query($sql);
        if ($result->num_rows>0) {
            # code...
            while ($row = $result->fetch_assoc()) {
                # code...
                echo"<tr>";
                echo" <td>".$row["tel_codigo"]."</td>";
                echo" <td>".$row["tel_usu_codigo"]."</td>";
                echo" <td>".$row["tel_numero"]."</td>";
                echo" <td>".$row["tel_tipo"]."</td>";
                echo" <td>".$row["tel_operadora"]."</td>";
                echo" <td> <a href='eliminart.php?codigo=".$row['tel_codigo']."& codigoU=".$row['tel_usu_codigo']."'>Eliminar</a></td>";
                echo" <td> <a href='modificart.php?codigo=".$row['tel_codigo']."& codigoU=".$row['tel_usu_codigo']."'>Modificar</a></td>";
                echo"</tr>";
            }
        }else {
            echo"<tr>";
            echo"<td colspan='7' No existen usuarios registrados en el sistema </td>";
            echo"</tr>";
        }
        
        $conn->close();
        //$row = $result->fetch_assoc()
        echo"<section id='addtelefono'>";
        echo"<a href='agregar_telefono.php?codigoU=".$codigoU."'>agregar_telefono</a>";
        
        //echo"<a href='iniciou.php?codigoU=".$codigoU."'>regresar</a>";
        //echo"<a href='iniciou.php'>regresar</a>";
        echo "</section>";
        ?>
       
    
        </table>
        <br>
    </section >
       
        <footer>
        <p>Publicado por: Janneth Matute ,Juan Alberto Boni Lema</p>
         <p>informacion de contacto: <a href="mailto:TastyPoke@gmail.com">
        TastyPoke@gmail.com</a>.</p>
        <p>Call: <a href=”tel:+5933022307”>(593) 302-2307</a></p>
         <p>copyright &copy;Todos los derechos reservados</p>
        </footer>
    </div>
    </body>
</html>