<?php
//incluir conexion  a la base de datos
include '../../../config/conexionBD.php';
$cedula=$_GET['cedula'];

//$sql="SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
$sql="SELECT * FROM usuario ,telefono WHERE usu_codigo =tel_usu_codigo and usu_eliminado = 'N' and usu_cedula='$cedula'";

$result = $conn->query($sql);
echo "<section id='contenido'>";
echo "<table  border='1'>
<tr>
<th>nombres</th>
<th>correo</th>
<th>telefono</th>
<th>correo</th>
<th>tipo</th>
<th>operadora</th>

</tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         # code...
         echo"<tr>";
         echo" <td>" . $row['usu_nombres'] . "</td>";
         //echo" <td>" . $row['usu_correo'] . "</td>";
         echo" <td> <a href=mailto:".$row['usu_correo'].">".$row['usu_correo']."</a></td>";
         echo" <td> <a href=tel:+593".$row['tel_numero'].">".$row['tel_numero']."</a></td>";
         echo" <td>" . $row['tel_numero'] . "</td>";
         echo" <td>" . $row['tel_tipo'] . "</td>";
         echo" <td>" . $row['tel_operadora'] . "</td>";
     
         echo"</tr>";
    }
}else {
    echo "<tr>";
    echo "<td colspan='7'> No existen usuarios resgistradas en el sistema </td>";
    echo "</tr>";
} 
echo"</table>";
echo"</section>";
$conn->close();

?>
