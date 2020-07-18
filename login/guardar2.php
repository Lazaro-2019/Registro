<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$matricula= $_POST["matricula"];
$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");
$activo = '0' ;
mysql_query("SET NAMES utf8");

$insertar = mysql_query("UPDATE registros 

	SET
 								
 								fecha_salida='$fecha',
 								hora_salida='$hora',
 								activo = '$activo'

    WHERE matricula =$matricula AND activo = '1'
								

							",$conexion)or die(mysql_error());


?>