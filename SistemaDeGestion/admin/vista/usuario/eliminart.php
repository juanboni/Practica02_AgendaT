<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar datos de persona</title>
        <link href="../css/eliminart.css" rel="stylesheet" />
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
        $codigot = $_GET["codigo"];
        $codigou= $_GET["codigoU"];
        $sql="SELECT*FROM telefono where tel_codigo = '$codigot'";

        include '../../../config/conexionBD.php';

        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                ?>
                

                <form class="formulario" id="formulario01" method="POST" action="../../controladores/usuario/eliminart.php">
                <h1>Eliminar Telefono</h1>
                <div class="contenedor">
                    <input type="hidden" id="codigotel" name="codigotel" value="<?php echo $codigot ?>" />
                    <input type="hidden" id="codigou" name="codigou" value="<?php echo $row["tel_usu_codigo"]; ?>" />
                    <div class="input-contenedor">
                    <label for="telefono">telefono</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["tel_numero"]; ?>" disabled/>
                    </div>
                    <div class="input-contenedor">
                    <label for="tipo">tipo</label>
                    <input type="text" id="tipo" name="tipo" value="<?php echo $row["tel_tipo"]; ?>" disabled/>
                    </div>
                    <div class="input-contenedor">
                    <label for="operadora">operadora</label>
                    <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"]; ?>" disabled/>
                    </div>
                    <input type="submit" id="eliminar" name="eliminar" value="Eliminar" class="button"/>
                    <input type="reset" id="cancelar" name="cancelar" value="cancelar" class="button"/>
                    </div>
  
                        <?php
                            //echo "<p>??quieres regresar a tu lista de telefonos? <a class="link" href="../telefono.php?=".$codigo."">Registrate </a></p>";
                            echo "<p>??quieres regresar a tu lista de telefonos?<a href='../../vista/usuario/telefono.php?codigoU=".$codigou."'>Regresar</a></p>;";
                        ?>
                    </div>
               <div>
                
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