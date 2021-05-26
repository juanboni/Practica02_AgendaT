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
       if ($_SESSION['rol'] ==1) {
 
           header("Location:/SistemaDeGestion/admin/vista/administrador/accesoda.php");
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
           
           echo" <li><a href='inicioa.php?codigoU=".$codigoU."'>inicio</a></li>";
           
           echo" <li><a href='buscar.php?codigoU=".$codigoU."'>Buscar</a></li>";
           echo" <li><a href='../../../config/cerrar_sesion.php'>Cerrar sesion</a></li>";
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
           
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Cambiar contrasena</th>
            <th>addtelephone</th>
            <th>listphone</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $sql="SELECT*FROM usuario WHERE usu_eliminado='N'";
        $result=$conn->query($sql);
        //$codigoU = $_GET["codigoU"];
        if ($result->num_rows>0) {
            # code...
            while ($row = $result->fetch_assoc()) {
                # code...
                echo"<tr>";
                echo" <td>".$row["usu_cedula"]."</td>";
                echo" <td>".$row["usu_nombres"]."</td>";
                echo" <td>".$row["usu_apellidos"]."</td>";
                echo" <td>".$row["usu_direccion"]."</td>";
               
                echo" <td>".$row["usu_correo"]."</td>";
                echo" <td>".$row["usu_fecha_nacimiento"]."</td>";
                echo" <td> <a href='eliminar.php?codigo=".$row['usu_codigo']."& codigoU=".$codigoU."'>Eliminar</a></td>";
                echo" <td> <a href='modificar.php?codigo=".$row['usu_codigo']."& codigoU=".$codigoU."'>Modificar</a></td>";
                echo" <td> <a href='cambiar_contrasena.php?codigo=".$row['usu_codigo']."& codigoU=".$codigoU."'>Cambiarcontrasena</a></td>";
                echo" <td> <a href='agregar_telefono.php?codigo=".$row['usu_codigo']."& codigoU=".$codigoU."'>agregar_telefono</a></td>";
                echo" <td> <a href='listar_telefono.php?codigo=".$row['usu_codigo']."& codigoU=".$codigoU."'>listartelefono</a></td>";
                echo"</tr>";
            }
        }else {
            echo"<tr>";
            echo"<td colspan='7' No existen usuarios registrados en el sistema </td>";
            echo"</tr>";
        }

        $conn->close();
        //echo"<a href='agregar_ua.php'>agregar_contactos</a>";
        echo"<section id='addcontacto'>";
        echo"<a href='agregar_ua.php?codigoU=".$codigoU."'>agregar_contacto</a>";
        
        //echo"<a href='iniciou.php?codigoU=".$codigoU."'>regresar</a>";
        //echo"<a href='iniciou.php'>regresar</a>";
        echo "</section>";
        ?>

        </table>
        <br>

        <!--<a href='../../../config/cerrar_sesion.php'>cerrar sesion(*)</a>-->
        </section>
        <footer>
        <p>Publicado por: Juan Boni ,Janeth Matute</p>
         <p>informacion de contacto: <a href="mailto:TastyPoke@gmail.com">
        TastyPoke@gmail.com</a>.</p>
        
        <p>Call: <a href=”tel:+5933022397”>(593) 302-2307</a></p>
         <p>copyright &copy;Todos los derechos reservados</p>
        </footer>
    </div>
    </body>
</html>