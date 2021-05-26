<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar datos de persona</title>
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
        <?php
        
        include "../../../config/conexionBD.php";

        $codigo = $_POST["codigo"];
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql="UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion='$fecha' WHERE 
        usu_codigo = '$codigo'";
        if ($conn->query($sql) === TRUE) {
            
            echo "<p> se ha eliminado los datos correctamente !!!</p>";
        } else{
            echo "<p> Error: " .$sql."<br>".mysqli_error($conn)."</p>";
        }
        //echo"<a href='../../vista/administrador/inicioa.php'>Regresar</a>";
        header( "Location:/SistemaDeGestion/public/controladores/login.php");
        $conn->close();

        ?>

    </body>
</html>