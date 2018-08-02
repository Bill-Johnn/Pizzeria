<?php require_once("funciones.php") ?>
<?php

$xcod  = $_SESSION['codigo'];
 $xc    = conectar(); 
  $sql   = "SELECT nom_usu, tipo_usu FROM usuario WHERE id_usuario='$xcod'"; 
  $res   = mysqli_query( $xc,$sql );
  $fila  = mysqli_fetch_array($res);
  $xnomusu = $fila[0];
  $xtipo_usu=$fila[1];
?>
<!DOCTYPE html>
<!-- Template by freewebsitetemplates.com -->
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>.:Municipalidad Distrital de Sachaca:.</title>
<link rel="shortcut icon" href="steam_updating.ico"/>
<link rel="stylesheet" type="text/css" href="style.css" media="all" />

</head>
<link href="revolution/inc/nav.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="revolution/inc/jquery-1.3.min.js"></script>
<script type="text/javascript" src="revolution/inc/jquery.randomContent.html"></script>
<script type="text/javascript" src="revolution/inc/jquery.localscroll.js"></script>
<script type="text/javascript" src="revolution/inc/jquery.scrollTo.js"></script>
<script type="text/javascript" src="revolution/inc/randomslogans.js"></script>
<script type="text/javascript" src="revolution/inc/jquery.extended.js"></script>
<script type="text/javascript" src="revolution/inc/functions.js"></script>
<body>
	<div id="header">
			<div id="logo">
				<a href="gestion.php"><img src="img/escudo2.png" alt="" /></a>		
			</div>		
			<ul>
				<li><a href="gestion.php"><span>Gestion</span></a></li>
				<li><a href="busqueda.php"><span>Contratos</span></a></li>
				<li><a href="dvencidas.php"><span>D. Vencidas</span></a></li>
                <li><a href="reportes.php"><span>Reportes</span></a></li>
                <li><a href="busqueda_detalles.php"><span>Busqueda</span></a></li>
        <div id="sesionUsuario">
       <p> <?php echo "$xnomusu"; ?></p>
        <p><?php echo "$xtipo_usu"; ?></p>
        <a href="logout.php" style="color:#000">Cerrar Sesión</a>
        </div>
                    		
			</ul>
            
	</div>