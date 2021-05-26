<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar datos de persona</title>
        <link href="../css/madificaru.css" rel="stylesheet" />
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
        $codigo = $_GET["codigo"];
        $sql="SELECT*FROM usuario where usu_codigo = '$codigo'";

        include '../../../config/conexionBD.php';

        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                ?>
                

                <form class="formulario" id="formulario01" method="POST" action="../../controladores/usuario/eliminar_usuario.php">
                    <h1>Eliminar Usuario</h1>
                    <div class="contenedor">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <div class="input-contenedor">
                    <label for="cedula">Cedula</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/>

                    </div>
                    <div class="input-contenedor">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled/>
                    </div>
                    <div class="input-contenedor">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled/>

                    </div>
                    <div class="input-contenedor">
                    <label for="direccion">Direccion</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled/>
                    </div>
                    <div class="input-contenedor">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled/>
                    </div>
                    <div class="input-contenedor">
                    <label for="fecha">Fecha Nacimiento</label>
                    <input type="date" id="Fecha Nacimiento" name="Fecha Nacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled/>
                    </div>
                    <div class="input-contenedor">
                    <label for="correo">Correo </label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/>
                    </div>
                    <input type="submit" id="eliminar" name="eliminar" value="Eliminar" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    <div>
  
                    <?php
                        //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
                        echo "<p>¿regresar a configuracion?<a href='../../vista/usuario/configuracion_perfil.php?codigoU=".$codigo."'>Regresar</a></p>";
                        ?>
                    </div>

</div>
                </div>
                </form>
                <?php
            }
        }else {
            echo"<p> ha ocurrido un error inesperado ! </p>";
            echo"<p> ".mysqli_error($conn)."</p>";
           
        }
        $conn->close();
    ?>

    </body>
</html>