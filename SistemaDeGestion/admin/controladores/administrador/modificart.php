<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de perona</title>
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
        include "../../../config/conexionBD.php";
        //codigo telefono
        $codigot = $_POST["codigot"];
        $codigoue = $_POST["codigoue"];
        $codigous = $_POST["codigous"];
        $codigousuario = $_POST["codusuario"];
        $numero = isset($_POST["numero"])?trim($_POST["numero"]):null;
        $tipo = isset($_POST["tipo"])?mb_strtoupper(trim($_POST["tipo"]),'UTF-8'):null;
        $operadora = isset($_POST["operadora"])?mb_strtoupper(trim($_POST["operadora"]),'UTF-8'):null;
       
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s',time());

        $sql="UPDATE telefono SET" .
            " tel_numero = '$numero',".
            "tel_tipo = '$tipo',".
            "tel_operadora = '$operadora',".
            "tel_fecha_modificacion = '$fecha'".
            "WHERE tel_codigo = '$codigot'";
        
            
        if ($conn->query($sql)=== TRUE) {
                # code...
                header("Location:../../vista/administrador/listar_telefono.php?codigo=".$codigoue."&codigoU=".$codigous."");
              
        } else{
                echo "<p> Error:".$sql."<br>".mysqli_error($conn)."</p>";
        }
            //echo"<a href='../../vista/administrador/inicioa.php'>Regresar</a>";
            //echo"<a href='../../vista/usuario/telefono.php?codigoU=".$codigousuario."'>Regresar</a>";
            //header("Location:../../vista/usuario/telefono.php?codigoU=".$codigousuario."");

        $conn->close();

        ?>

    </body>
</html>