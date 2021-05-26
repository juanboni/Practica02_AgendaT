<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona</title>
        <link href="../css/modificart.css" rel="stylesheet" />
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
        //codigo es de telefono
        $codigot = $_GET["codigo"];
        //codigo es de usuario elegido
        $codigoue= $_GET["codigoU"];
        //codigo es de usuario desesion
        $codigous= $_GET["codigoue"];
        $sql="SELECT*FROM telefono where tel_codigo=$codigot";
        
        include '../../../config/conexionBD.php';

        $result=$conn->query($sql);

        if ($result->num_rows>0) {
            # code...
            while ($row = $result->fetch_assoc()) {
                ?>
                

                <form class="formulario" id="formulario01" method="POST" action="../../controladores/administrador/modificart.php">
                <h1>Modificar Telefono</h1>
                <div class="contenedor">
                <input type="hidden" id="codigoue" name="codigoue" value="<?php echo $codigoue ?>" />
                <input type="hidden" id="codigous" name="codigous" value="<?php echo $codigous ?>" />
                    <input type="hidden" id="codigot" name="codigot" value="<?php echo $codigot ?>" />
                    
                    <input type="hidden" id="codusuario" name="codusuario" value="<?php echo $row["tel_usu_codigo"]; ?>" />

                    <div class="input-contenedor">
                    <label for="numero">Numero</label>
                    <input type="text" id="numero" name="numero" value="<?php echo $row["tel_numero"]; ?>" required placeholder="ingrese su numero" onkeyup="return validarNumerotel(this)"/>
                    </div>
                    <div class="input-contenedor">
                    <label for="tipo">tipo</label>
                    <input type="text" id="tipo" name="tipo" value="<?php echo $row["tel_tipo"]; ?>" required placeholder="ingrese la operadora" onkeyup="return validarLetras(this)"/>
                    </div>
                    <div class="input-contenedor">
                    <label for="operadora">operadora</label>
                    <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"]; ?>" required placeholder="ingrese la operadora" onkeyup="return validarLetras(this)"/>
                    </div>
                    
                    <input type="submit" id="modificar" name="modificar" value="modificar" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    </div>
  
       <?php
         //echo "<p>¿quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
         echo "<p>¿quieres regresar a la lista de telefonos?<a href='../../vista/administrador/listar_telefono.php?codigo=".$codigoue."&codigoU=".$codigous."'>Regresar</a></p>;";
         ?>
     </div>
                    <div>
                    </form>
                <?php
            }
        }else {
            echo"<p> ha ocurrido un error inesperado ! </p>";
            echo"<p> ".mysqli_error($conn)."</p>";

            echo "$sql";
        }
        $conn->close();
    ?>
    

    </body>
</html>