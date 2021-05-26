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
       if ($_SESSION['rol'] ==1) {
 
           header("Location:/SistemaDeGestion/admin/vista/administrador/accesoda.php");
           //echo "<p>no es administrador</p>";
       }
   }
   ?>
        <?php

session_start();
      

        ?>
        <?php
        
        include "../../../config/conexionBD.php";

        $codigot = $_POST["codigotel"];
       //codigo es de usuario elegido
        $codigou = $_POST["codigoU"];
        //codigoue es inicio de session
        $codigoue = $_POST["codigoue"];
        
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql="UPDATE telefono SET tel_eliminado = 'S', tel_fecha_modificacion='$fecha' WHERE 
        tel_codigo = '$codigot'";
        if ($conn->query($sql) === TRUE) {
            
            header("Location:../../vista/administrador/listar_telefono.php?codigo=".$codigou."&codigoU=".$codigoue."");
        } else{
            echo "<p> Error: " .$sql."<br>".mysqli_error($conn)."</p>";
        }
        
        //echo"<a href='../../vista/usuario/telefono.php?codigoU=".$codigou."'>Regresar</a>";
        //header("Location:../../vista/usuario/iniciou.php?codigoU=".$codigou."");
        //echo"<a href='../../vista/usuario/telefono.php?codigoU=".codigou."'>Regresar</a>";
       
        $conn->close();

        ?>

    </body>
</html>