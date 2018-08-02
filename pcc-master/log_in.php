<?php
require_once("header.php");
require_once("funciones.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
</head>
<body>
	<div class="row narrow add-bottom text-center">

          <h1>INICIO DE SESIÓN</h1>

          <form role="form" method="POST" action="index.php">

            <div>
                <h3>USUARIO o CORREO</h3>
                <input class="full-width" type="text" name="log_usu" id="log_usu">
            </div>
            <div>
                <h3>CONTRASEÑA</h3>
                <input class="full-width" type="text" name="con_usu" id="con_usu">
            </div>

            <input class="button-primary full-width-on-mobile" type="submit" value="Ingresar">
</body>
</html>

<?php
	$log_usu = leerParam('log_usu','');
	$con_usu = leerParam('con_usu','');
	$ingresa = getUsuarioByLogin($log_usu,$con_usu);
	if($ingresa==true){
		header('index.php');
	}
	else{
		header('blank.php');
	}

	require_once('footer.php');
?>
