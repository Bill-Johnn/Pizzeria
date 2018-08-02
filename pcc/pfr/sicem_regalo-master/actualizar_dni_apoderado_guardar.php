<?php require_once("funciones.php") ?>
<?php


	
	$xid_sol=leerParam("xid_sol","");
	$xcel_sol=leerParam("xcel_sol","");
	$xdir_sol=leerParam("xdir_sol","");
	$xnom_sol=leerParam("xnom_sol","");
	$xdni_sol=leerParam("xdni_sol","");

$xc    = conectar();
$sql="UPDATE solicitante set dni_sol='$xdni_sol',tel_sol='$xcel_sol',dir_sol='$xdir_sol',nom_sol='$xnom_sol'  WHERE id_sol=$xid_sol";
mysqli_query($xc,$sql);

$sql="UPDATE autorizacion set dni_sol=$xdni_sol WHERE id_sol=$xid_sol";
mysqli_query($xc,$sql);

$sql="UPDATE convenio set dni_sol=$xdni_sol WHERE id_sol=$xid_sol";
mysqli_query($xc,$sql);

$sql="UPDATE difunto set dni_sol=$xdni_sol WHERE id_sol=$xid_sol";
mysqli_query($xc,$sql);

$sql="UPDATE pen_conv set dni_sol=$xdni_sol,cel_sol='$xcel_sol',dir_sol='$xdir_sol',nom_sol='$xnom_sol'  WHERE id_sol=$xid_sol";
//echo "$sql";
//die();
mysqli_query($xc,$sql);




desconectar($xc);
?>

<html>
<head>
<script languaje="javascript">
function recarga_padre_y_cierra_ventana(){
var xid_nicho = "<?php echo $xid_nicho; ?>" ;
window.location.href = 'consulta_nicho.php?xid_nicho='+xid_nicho; 

window.close();
}
</script>
</head>
<body onLoad="recarga_padre_y_cierra_ventana()">
</body>
</html>