<?php require_once("funciones.php") ?>
<?php
session_start();
$xc=conectar();
session_unset();
session_destroy();
header("Location:index.php");
?>