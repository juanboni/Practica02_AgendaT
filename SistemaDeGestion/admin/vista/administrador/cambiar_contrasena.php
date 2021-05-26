<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona</title>
        <link href="../css/cambiarcontra.css" rel="stylesheet" />
        <script type="text/javascript" src="validaciones.js"></script>
    </head>
    <body>
        <?php
        $codigoue =$_GET["codigoU"];
        $codigo = $_GET["codigo"];
        ?>
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

<form class="formulario" id="formulario01" method="POST" action="../../controladores/administrador/cambiar_contrasena.php">
                <div class="contenedor">
                    <h1>Cambiar Contrasena</h1>
                    <input type="hidden" id="codigoue" name="codigoue" value="<?php echo $codigoue ?>" />
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <div class="input-contenedor">
                    <label for="cedula">Actual</label>
                    <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="ingrese su contrasena actual" oninput="return validarcontrasena1(this)"/>
                    <span id="mensajePassword" class="error"></span>
                </div>
                    <div class="input-contenedor">
                    <label for="cedula">Nueva</label>
                    <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="ingrese su contrasena nueva"  oninput="return validarcontrasena2(this)"/>
                    <span id="mensajePassword2" class="error"></span>
                </div>
                   
                    
                    <input type="submit" id="modificar" name="modificar" value="modificar" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    <div>
  
                        <?php
                            //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
                            echo "<p>¿no deseas realizar ningun cambio?<a href='../../vista/administrador/inicioa.php?codigoU=".$codigoue."'>Regresar</a></p>";
                            ?>
                        </div>
                </div>
                </form>

    </body>
</html>