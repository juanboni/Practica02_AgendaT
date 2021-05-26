<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>agregar telefono</title>
        <link href="../css/estilosF.css" rel="stylesheet" />
        <script type="text/javascript" src="validaciones.js"></script>
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
        $codigo = $_GET["codigoU"];
     

        include '../../../config/conexionBD.php';

                ?>
                <form class="formulario" id="formulario01" method="POST" action="../../controladores/usuario/agregar_telefono.php">
                <h1>Agregar Telefono</h1>
                <div class="contenedor">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>
                <div class="input-contenedor">
                    <label for="numero">Numero</label>
                    <input type="text" id="numero" name="numero" value="" placeholder="ingrese su numero de telefono" required onkeyup="return validarNumerotel(this)"/>
                    <span id="mensajeTelefono" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="tipo">Tipo</label>
                    <input type="text" id="tipo" name="tipo" value="" placeholder="ingrese su tipo de telefono" required onkeyup ="return validarLetras(this)"/>
                    <span id="mensajetipo" class="error"></span>
                </div>

                    <div class="input-contenedor">
                    <label for="operadora">Operadora</label>
                    <input type="text" id="operadora" name="operadora" value="" placeholder="ingrese su operadora" required onkeyup ="return validarLetras(this)"/>
                    </div>
                   
                    <input type="submit" id="crear" name="crear" value="crear" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    

                    </div>
  
       <?php
         //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
         echo "<p>¿quieres regresar a tu lista de telefonos?<a href='../../vista/usuario/telefono.php?codigoU=".$codigo."'>Regresar</a></p>;";
         ?>
     </div>

                    </div>
                </form>
              

    </body>
</html>