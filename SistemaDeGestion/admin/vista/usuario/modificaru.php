<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona</title>
        <script type="text/javascript" src="validaciones.js"></script>
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
        $sql="SELECT*FROM usuario where usu_codigo='$codigo'";

        include '../../../config/conexionBD.php';

        $result=$conn->query($sql);

        if ($result->num_rows>0) {
            # code...
            while ($row = $result->fetch_assoc()) {
                ?>
                

                <form class="formulario" id="formulario01" method="POST" action="../../controladores/usuario/modificar_usuario.php">
                <h1>Modificar Mi Usuario</h1>
                <div class="contenedor">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <div class="input-contenedor">
                    <label for="cedula">Cedula</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"required placeholder="ingrese la cedula" oninput="return validarCedula(this)" onkeyup="return validarNumero(this)"/>
                    <span id="mensajeCedula" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="ingrese los nombres" oninput ="return validarLetras(this)"  onkeyup="return validarNombres(this)"/>
                    <span id="mensajeNombre" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="ingrese los apellidos" oninput="return validarLetras(this)" onkeyup="return validarapellidos(this)"/>
                    <span id="mensajeApellido" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="direccion">Direccion</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" required placeholder="ingrese la direccion"/>
                    </div>

                    <div class="input-contenedor">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" required placeholder="ingrese el telefono"/>
                    </div>

                    <div class="input-contenedor">
                    <label for="fecha">Fecha Nacimiento</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="ingrese la fecha de nacimiento"/>
                    </div>


                    <div class="input-contenedor">
                    <label for="correo">Correo electronico</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="ingrese el correo" oninput="return validarCorreo(this)"/>
                    <span id="mensajeEmail" class="error"></span>
                </div>


                    <input type="submit" id="modificar" name="modificar" value="modificar" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    <div>
  
                        <?php
                            //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
                            echo "<p>¿quieres regresar a tu perfil?<a href='../../vista/usuario/configuracion_perfil.php?codigoU=".$codigo."'>Regresar</a></p>";
                            ?>
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