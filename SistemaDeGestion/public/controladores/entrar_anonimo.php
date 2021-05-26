<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color:red;
            font-size: 8px;

        }

    </style>
</head>
<body>


    <?php

        include '../../config/conexionBD.php';
        $cedula = isset($_POST["cedula"])?trim($_POST["cedula"]):null;
        $nombres = isset($_POST["nombres"])?mb_strtoupper(trim($_POST["nombres"]),'UTF-8'):null;
        $apellidos = isset($_POST["apellidos"])?mb_strtoupper(trim($_POST["apellidos"]),'UTF-8'):null;
        $direccion = isset($_POST["direccion"])?mb_strtoupper(trim($_POST["direccion"]),'UTF-8'):null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"])?trim($_POST["fechaNacimiento"]):null;
        date_default_timezone_set("America/Guayaquil");
       $fecha = date('Y-m-d H:i:s', time());

        //$sql="INSERT INTO usuario VALUES(0,1,'$cedula','$nombres','$apellidos','$direccion','$telefono','$correo',MD5('$contrasena'),'$fechaNacimiento','N',null,null)";
        $sql="INSERT INTO usuario VALUES(0,3,'$cedula','$nombres','$apellidos','$direccion','0000000000','anonimo@est.ups.edu.ec',MD5('00000000'),'$fechaNacimiento','N',null,null)";
        if ($conn->query($sql)===TRUE) {
            # code...
            //echo"<p> Se ha creado los datos personales correctamente!!!</p>";
            header("Location:../../public/vista/buscar.html");
        }else{
            if ($conn->errno==1062) {
                # code...
                echo"<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
            }else {
                # code...
                echo"<p class='error'>Error:".mysqli_error($conn)."</p>";
            }
        }

        $conn->close();
        echo"<a href='../vista/crear_usuario.html'>Regresar</a>";

    ?>

</body>
</html>