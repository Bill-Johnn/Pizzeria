<?php
include ('mysql_backup.class.php');

$db_host = "localhost"; //---- host de la Base de datos
$db_name = "municementerio"; //---- nombre de la base de datos
$db_user = "root"; //---- el nombre de usuario para esta base de datos
$db_pass = ""; //---- password del usuario de la base de datos

$fecha=date('d-m-Y');
$output = $fecha."_backup_sicem.sql";
//true, solo estructura de la base de datos.
//false, estructura y data.
$structure_only = false;
$backup = new mysql_backup($db_host,$db_name,$db_user,$db_pass,$output,$structure_only);
$backup->backup();

header("Location:backup.php");