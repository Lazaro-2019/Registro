<?php 

//se manda llamar la conexion
include("../conexion/conexion.php");

$matricula= $_POST["matricula"];
$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");
$activo0 = '0' ;
$activo1 = '1' ;

$hay_registros=mysql_query("SELECT matricula FROM registros where matricula=$matricula"); 

if (mysql_num_rows($hay_registros)>0) {

mysql_query("SET NAMES utf8");

	$insertar = mysql_query("UPDATE registros 

	SET
 								
 								fecha_salida='$fecha',
 								hora_salida='$hora',
 								activo = '$activo0'

    WHERE matricula =$matricula AND activo = '1'
								

							",$conexion)or die(mysql_error());


} else {

mysql_query("SET NAMES utf8");

$filtroA = mysql_query("SELECT  id_alumno FROM alumnos WHERE no_control = $matricula",$conexion) or die(mysql_error());

WHILE ($row=mysql_fetch_array($filtroA))
{
    $id_alumno= $row["id_alumno"];
}

$insertar = mysql_query("INSERT INTO registros 
 								(
 								id_alumno,
 								matricula,
 								fecha_ingreso,
 								hora_ingreso,
 								fecha_salida,
 								hora_salida,
 								fecha_actualiza,
 								hora_actualiza,
 								activo
 								)
							VALUES
								( 
								'$id_alumno',
 								'$matricula',
 								'$fecha',
 								'$hora',
 								'$fecha_salida',
 								'$hora_salida',
 								'$fecha_actualiza',
 								'$hora_actualiza',
 								'$activo1'
								)
							",$conexion)or die(mysql_error());

}

 ?>