<?php require_once("funciones.php") ;
$xcod  = $_SESSION['codigo'];
 $xc    = conectar(); 
  $sql   = "SELECT nom_usu, tipo_usu FROM usuario WHERE id_usuario='$xcod'"; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  $xnomusu = $fila[0];
  $xtipo_usu=$fila[1];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Template by freewebsitetemplates.com -->

<meta charset="utf-8" />
<title>Business Solutions</title>
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
				<a href="pendientes.php"><img src="img/escudo2.png" alt="" /></a>		
			</div>		
			<ul>
				<li><a href="pendientes.php"><span>Pendientes</span></a></li>
                <li><a href="pagos_traslados.php"><span>Traslados</span></a></li>
                <li><a href="pagos_convenios.php"><span>Convenios</span></a></li>
                <li><a href="pend_autori.php"><span>Autorizaciones</span></a></li>
			 <div id="sesionUsuario">
       <p> <?php echo "$xnomusu"; ?></p>
        <p><?php echo "$xtipo_usu"; ?></p>
        <a href="logout.php" style="color:#000">Cerrar Sesión</a>
        </div>
            
            </ul>
	</div>