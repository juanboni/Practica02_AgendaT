<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Gestion de usuarios</title>
        <link href="../css/ver_telefono.css" rel="stylesheet" />
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
        <h1>Telefonos</h1>
      
     </header>


     <section id="contenido"> 
        <table > 
        <tr>
            <th>codigo</th>
            <th>usuariocodigo</th>
            <th>numero</th>
            <th>tipo</th>
            <th>operadora</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $codigou = $_GET["codigoU"];
        $sql="SELECT*FROM usuario ,telefono WHERE usu_codigo=tel_usu_codigo and usu_codigo='$codigo'";
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
                echo"</tr>";
            }
        }else {
            echo"<tr>";
            echo"<td colspan='7' No existen usuarios registrados en el sistema </td>";
            echo"</tr>";
        }

        $conn->close();
        //echo "<a href='../../vista/usuario/iniciou.php?codigoU=".$codigou."'>Regresar</a>;";
        ?>

        </table>
        <br>

       
  
            <?php
                //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
                echo "<p>¿regresar a ver contactos<a href='../../vista/usuario/iniciou.php?codigoU=".$codigou."'>Regresar</a></p>";
            ?>

        
        <!--<a href='../../../config/cerrar_sesion.php'>cerrar sesion(*)</a>-->

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