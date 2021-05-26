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
       if ($_SESSION['rol'] ==1) {
 
           header("Location:/SistemaDeGestion/admin/vista/administrador/accesoda.php");
           //echo "<p>no es administrador</p>";
       }
   }
   ?>
        <?php
        $codigoue= $_GET["codigoU"];
        $codigo = $_GET["codigo"];
        
     

        include '../../../config/conexionBD.php';

                ?>
                 <form class="formulario" id="formulario01" method="POST" action="../../controladores/administrador/agregar_telefono.php">
                <h1>Agregar Telefono</h1>
                <div class="contenedor">
                <input type="hidden" id="codigoue" name="codigoue" value="<?php echo $codigoue ?>"/>
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>"/>
                <div class="input-contenedor">
                    <label for="numero">Numero</label>
                    <input type="text" id="numero" name="numero" value="" placeholder="ingrese su numero de telefono" required onkeyup="return validarNumerotel(this)"/>
                    </div>

                    <div class="input-contenedor">
                    <label for="tipo">Tipo</label>
                    <input type="text" id="tipo" name="tipo" value="" placeholder="ingrese su tipo de telefono" required onkeyup="return validarLetras(this)"/>
                    </div>

                    <div class="input-contenedor">
                    <label for="operadora">Operadora</label>
                    <input type="text" id="operadora" name="operadora" value="" placeholder="ingrese su operadora" required onkeyup="return validarLetras(this)"/>
                    </div>
                   
                    <input type="submit" id="crear" name="crear" value="crear" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    

                    </div>
  
       <?php
         //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
         echo "<p>¿quieres regresar a inicio?<a href='../../vista/administrador/inicioa.php?codigoU=".$codigoue."'>Regresar</a></p>;";
         ?>
     </div>

                    </div>
                </form>
              

    </body>
</html>