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
       
        <table style="width:100%"> 
        <tr>
            <th>codigo</th>
            <th>usuariocodigo</th>
            <th>numero</th>
            <th>tipo</th>
            <th>operadora</th>
            <th>Eliminar</th>
            <th>Modificar</th>
        </tr>
        <?php
        include '../../../config/conexionBD.php';
        //codigoue es de usuario de sesion
        $codigoue = $_GET["codigoU"];
        //codigo es de usuario elegido
        $codigo = $_GET["codigo"];
        $sql="SELECT*FROM usuario ,telefono WHERE usu_codigo=tel_usu_codigo and usu_codigo='$codigo' and tel_eliminado='N'";
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
                echo" <td> <a href='eliminart.php?codigo=".$row['tel_codigo']."& codigoU=".$codigo."& codigoue=".$codigoue."'>Eliminar</a></td>";
                echo" <td> <a href='modificart.php?codigo=".$row['tel_codigo']."& codigoU=".$codigo."& codigoue=".$codigoue."'>Modificar</a></td>";
                echo"</tr>";
            }
        }else {
            echo"<tr>";
            echo"<td colspan='7' No existen usuarios registrados en el sistema </td>";
            echo"</tr>";
        }

        $conn->close();
        echo"<section id='addcontacto'>";
        echo"<a href='../../vista/administrador/inicioa.php?codigoU=".$codigoue."'>regresar_a_inicio</a>";
        
        //echo"<a href='iniciou.php?codigoU=".$codigoU."'>regresar</a>";
        //echo"<a href='iniciou.php'>regresar</a>";
        echo "</section>";
        ?>

        </table>
        
        
    </body>
</html>  