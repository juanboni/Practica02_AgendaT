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
      
if (!isset($_SESSION['rol'])) {
    # code... 
    header( "Location:/SistemaDeGestion/public/controladores/login.php");
}else {
    # code...
    if ($_SESSION['rol'] ==1) {
        # code...
        //header("Location:/SistemaDeGestion/admin/vista/usuario/usuario.php");
        //header("Location:../../admin/vista/usuario/usuario.php");
        //header("Location:/SistemaDeGestion/public/vista/login.html");
        //header( "Location:../../admin/vista/usuario/usuario.php");
        //header( "Location:/SistemaDeGestion/admin/vista/usuario/usuario.php");
        //header( "Location:/SistemaDeGestion/admin/vista/usuario/admin.php");
        //header( "Location:/SistemaDeGestion/public/controladores/login.php");
        header("Location:/SistemaDeGestion/admin/vista/usuario/usuario.php");
        //echo "<p>no es administrador</p>";
    }else if($_SESSION['rol'] ==3){
        header("Location:/SistemaDeGestion/admin/vista/usuario/anonimo.php");
    }
}
        ?>
        <?php
        
        include "../../../config/conexionBD.php";
        $codigoue=$_POST["codigoue"];
        $codigo = $_POST["codigo"];
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql="UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion='$fecha' WHERE 
        usu_codigo = '$codigo'";
        if ($conn->query($sql) === TRUE) {
            header("Location:../../vista/administrador/inicioa.php?codigoU=".$codigoue."");
            //echo "<p> se ha eliminado los datos correctamente !!!</p>";
        } else{
            echo "<p> Error: " .$sql."<br>".mysqli_error($conn)."</p>";
        }
        

        $conn->close();

        ?>

    </body>
</html>