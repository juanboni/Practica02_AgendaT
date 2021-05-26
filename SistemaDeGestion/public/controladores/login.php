<?php
    session_start();
    include '../../config/conexionBD.php';

    if (isset($_SESSION['rol'])) {
        # code...
        switch ($_SESSION['rol']) {
            case 1:
                header("Location:../../admin/vista/usuario/iniciou.php");

                break;
            case 2:
                header("Location:../../admin/vista/administrador/admin.php");
                
            break;
        }
    }
    $usuario = isset($_POST["correo"])?trim($_POST["correo"]):null;
    $contrasena = isset($_POST["contrasena"])?trim($_POST["contrasena"]):null;

    $sql="SELECT*FROM usuario WHERE usu_correo='$usuario' and usu_password=MD5('$contrasena') and usu_eliminado='N'";

    
    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        $row = $result->fetch_assoc();
        $columna=$row["usu_rol_codigo"];
        $_SESSION['rol'] =$columna;
        //esta parte envia codigo de usuario con el q ingresa
        $codigousuario=$row["usu_codigo"];

        switch ($_SESSION['rol']) {
            case 1:
                header("Location:../../admin/vista/usuario/iniciou.php?codigoU=".$codigousuario."");
                $_SESSION['isLogged']=TRUE;
                break;
            case 2:
                header("Location:../../admin/vista/administrador/inicioa.php?codigoU=".$codigousuario."");
                $_SESSION['isLogged']=TRUE;
            break;
            case 3:
                header("Location:../../admin/vista/administrador/anonimo.php");
                $_SESSION['isLogged']=TRUE;
            break;
            
            default:
            
        }
   
        //header("Location:../../admin/vista/usuario/index.php");
    }else {
        
        header("Location:../vista/login.html");
    }

    $conn->close();
?>