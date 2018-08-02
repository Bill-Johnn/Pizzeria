<?php require_once("funciones.php") ?>
<?php


	
	$xid_dif=leerParam("xid_dif","");
	$xnom_dif=leerParam("xnom_dif","");
	$xpriape_dif=leerParam("xpriape_dif","");
	$xseguape_dif=leerParam("xseguape_dif","");
	$xfentierro=leerParam("xfentierro","");
	$xid_nicho = leerParam("xid_nicho","");

$xc    = conectar();

 $sql = "UPDATE pen_conv SET nom_dif='$xnom_dif', priape_dif='$xpriape_dif', seguape_dif='$xseguape_dif',fentierro='$xfentierro'  WHERE id_nicho='$xid_nicho' ";
   mysqli_query($xc,$sql );

   $sql = "UPDATE difunto SET nom_dif='$xnom_dif', priape_dif='$xpriape_dif', segape_dif='$xseguape_dif',fech_sep='$xfentierro' WHERE id_dif='$xid_dif'";
   mysqli_query($xc,$sql );



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