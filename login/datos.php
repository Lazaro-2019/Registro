<?php 

$matricula= $_POST["matricula"];
mysql_query("SET NAMES utf8");
$datos=mysql_query("SELECT id_alumno FROM alumnos WHERE matricula=$matricula ",$conexion or die(mysql_error()));


WHILE ($row=mysql_fetch_row($datos)) {
	$id_alumno   = $row[0];
}
 ?>
<div class="container">
	<label><?php echo "$id_alumno"; ?></label>
</div>


<!-- <tr>
    <td >
      <p id="nombrealumno"> >
      	<?php ; ?>
      </p>
    </td>
</tr> -->
