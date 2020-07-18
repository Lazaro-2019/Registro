<?php 




$datos=mysql_query("SELECT alumnos.matricula,CONCAT(nombre,' ',ap_paterno,' ',ap_materno)as nombre FROM personas WHERE matricula =$matricula INNER JOIN alumnos on personas.id_persona=alumnos.id_persona",$conexion or die(mysql_error()));

$fila=mysql_fetch_array($datos);


WHILE($fila=mysql_fetch_array($datos)){
	echo "<p>";
	echo $fila ("nombre");
	echo "</p>";
}


 ?>