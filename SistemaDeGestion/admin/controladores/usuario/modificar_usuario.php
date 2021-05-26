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
       if ($_SESSION['rol'] ==2) {
 
           header("Location:/SistemaDeGestion/admin/vista/usuario/accsesodu.php");
           //echo "<p>no es administrador</p>";
       }
   }
   ?>
        <?php
        include "../../../config/conexionBD.php";
        $codigo = $_POST["codigo"];
        $cedula = isset($_POST["cedula"])?trim($_POST["cedula"]):null;
        $nombres = isset($_POST["nombres"])?mb_strtoupper(trim($_POST["nombres"]),'UTF-8'):null;
        $apellidos = isset($_POST["apellidos"])?mb_strtoupper(trim($_POST["apellidos"]),'UTF-8'):null;
        $direccion = isset($_POST["direccion"])?mb_strtoupper(trim($_POST["direccion"]),'UTF-8'):null;
        $telefono = isset($_POST["telefono"])?trim($_POST["telefono"]):null;
        $correo = isset($_POST["correo"])?trim($_POST["correo"]):null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"])?trim($_POST["fechaNacimiento"]):null;
       
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s',time());

        $sql="UPDATE usuario SET" .
            " usu_cedula = '$cedula',".
            "usu_nombres = '$nombres',".
            "usu_apellidos = '$apellidos',".
            "usu_direccion = '$direccion',".
            "usu_telefono = '$telefono',".
            "usu_correo = '$correo',".
            "usu_fecha_nacimiento = '$fechaNacimiento',".
            "usu_fecha_modificacion = '$fecha'".
            "WHERE usu_codigo = '$codigo'";
        
            
        if ($conn->query($sql)=== TRUE) {
                # code...
                echo "<p> se ha actualizado los datos correctamente</p>";
                echo $codigo;
        } else{
                echo "<p> Error:".$sql."<br>".mysqli_error($conn)."</p>";
        }

           // header"<a href='../../vista/usuario/configuracion_perfil.php?codigoU=".$codigo."'>Regresar</a>";
              header("Location:../../vista/usuario/configuracion_perfil.php?codigoU=".$codigo."");
    

        $conn->close();

        ?>

    </body>
</html>