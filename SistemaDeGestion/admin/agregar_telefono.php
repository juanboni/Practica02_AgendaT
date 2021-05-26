<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    
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
        $codigoue=$_POST["codigoue"];
        $codigo2 = $_POST["codigo"];
        $codigo = isset($_POST["codigo"])?trim($_POST["codigo"]):null;
        $numero = isset($_POST["numero"])?trim($_POST["numero"]):null;
        $tipo = isset($_POST["tipo"])?mb_strtoupper(trim($_POST["tipo"]),'UTF-8'):null;
        $operadora = isset($_POST["operadora"])?mb_strtoupper(trim($_POST["operadora"]),'UTF-8'):null;
       
       
        $sql="INSERT INTO telefono VALUES(0,'$codigo2','$numero','$tipo','$operadora','N',null,null)";
        if ($conn->query($sql)===TRUE) {
            # code...s
            header("Location:../../vista/administrador/inicioa.php?codigoU=".$codigoue."");
        }else{
            if ($conn->errno==1062) {
                # code...
                echo"<p class='error'>La persona con la cedula $numero ya esta registrada en el sistema </p>";
            }else {
                # code...
                echo"<p class='error'>Error:".mysqli_error($conn)."</p>";
                echo $sql;
                echo "<p>$codigo2<p>";
            }
        }

        $conn->close();
        echo "<a href='../../vista/administrador/inicioa.php'>Regresar</a>";

    ?>

</body>
</html>