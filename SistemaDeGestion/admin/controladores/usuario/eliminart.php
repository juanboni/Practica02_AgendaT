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

        $codigot = $_POST["codigotel"];
        $codigou = $_POST["codigou"];
        
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql="UPDATE telefono SET tel_eliminado = 'S', tel_fecha_modificacion='$fecha' WHERE 
        tel_codigo = '$codigot'";
        if ($conn->query($sql) === TRUE) {
            
            echo "<p> se ha eliminado los datos correctamente !!!</p>";
        } else{
            echo "<p> Error: " .$sql."<br>".mysqli_error($conn)."</p>";
        }
        
        //echo"<a href='../../vista/usuario/telefono.php?codigoU=".$codigou."'>Regresar</a>";
        //header("Location:../../vista/usuario/iniciou.php?codigoU=".$codigou."");
        //echo"<a href='../../vista/usuario/telefono.php?codigoU=".codigou."'>Regresar</a>";
        header("Location:../../vista/usuario/telefono.php?codigoU=".$codigou."");
        $conn->close();

        ?>

    </body>
</html>