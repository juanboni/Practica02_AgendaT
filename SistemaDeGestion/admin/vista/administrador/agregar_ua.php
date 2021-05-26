
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>agregar cuentas</title>
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
       if ($_SESSION['rol'] ==1) {
 
           header("Location:/SistemaDeGestion/admin/vista/administrador/accesoda.php");
           //echo "<p>no es administrador</p>";
       }
   }
   ?>
        <?php
        $codigo = $_GET["codigoU"];
     

        include '../../../config/conexionBD.php';

                ?>
                <form class="formulario" id="formulario01" method="POST" action="../../controladores/administrador/agregar_ua.php">
                <h1>Agregar Cuentas</h1>
                <div class="contenedor">
                
                    
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>

                    <div class="input-contenedor">
                    <label for="codigorol">rol usuario</label>
                    <input type="text" id="codigorol" name="codigorol" value="" placeholder="ingrese 1 :Usuario ,2:admin" required/>
                    </div>

                    <div class="input-contenedor">
                    <label for="cedula">Cedula</label>
                    <input type="text" id="cedula" name="cedula" value="" placeholder="ingrese el numero de cedula" required oninput="return validarCedula(this)" onkeyup="return validarNumero(this)"/>
                    <span id="mensajeCedula" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" value="" placeholder="ingrese sus dos nombres...." required oninput ="return validarLetras(this)"  onkeyup="return validarNombres(this)"/>
                    <span id="mensajeNombre" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" value="" placeholder="ingrese sus dos apellidos..." required oninput="return validarLetras(this)" onkeyup="return validarapellidos(this)"/>
                    <span id="mensajeApellido" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="direccion">Direccion</label>
                    <input type="text" id="direccion" name="direccion" value="" placeholder="ingrese su direccion..." required/>
                    </div>

                    <div class="input-contenedor">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" value="" placeholder="ingrese su numero telefonico..." required onkeyup="return validarNumerotel(this)"/>
                    <span id="mensajeTelefono" class="error"></span>
                    </div>


                    <div class="input-contenedor">
                    <label for="fecha">Fecha Nacimiento</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="" placeholder="ingrese su fecha de nacimiento..." required/>
                
                    </div>

                    <div class="input-contenedor">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" value="" placeholder="ingrese su correo electronico..." required oninput="return validarCorreo(this)"/>
                    <span id="mensajeEmail" class="error"></span>
                    </div>

                    <div class="input-contenedor">
                    <label for="contrasena">Contrasena</label>
                    <input type="password" id="contrasena" name="contrasena" value="" placeholder="ingrese su contrasena..." required oninput="return validarcontrasena(this)"/>
                    <span id="mensajePassword" class="error"></span>
                </div>
        
                    <input type="submit" id="crear" name="crear" value="Aceptar" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>

                    <div>
  
                        <?php
                            //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
                            echo "<p>¿quieres regresar a tu perfil?<a href='../../vista/administrador/inicioa.php?codigoU=".$codigo."'>Regresar</a></p>";
                            ?>
                    </div>
                </div>
                </form>
                <?php
                //echo"<a href='../../vista/administrador/telefono.php?codigoU=".$codigo2."'>Regresar</a>";
                echo"<a href='../../vista/administrador/inicioa.php'>Regresar</a>";
                ?>
              

    </body>
</html>