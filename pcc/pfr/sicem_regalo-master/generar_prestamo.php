<?php require_once("header.php") ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php  

		/*DIFUNTO*/
		$xid_sol=leerParam("xid_sol","");
		$xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");

/*SOLICITANTE*/
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");
/*NICHO*/
		$xid_nicho = leerParam("xid_nicho","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnom_cem=leerParam("xnom_cem","");
		$xnom_pab=leerParam("xnom_pab","");
/*CALCULO CONVENIO*/
		
		$xcuota_ini=leerParam("xcuota_ini","");
		
	
$xc=conectar();
		$sql = "INSERT INTO `pen_conv` (`nom_dif`, `priape_dif`, `seguape_dif`,`fentierro`,`fautorizacion`,`dni_sol`,`nom_sol`,`dir_sol`,`id_nicho`,`id_pabellon`,`cel_sol`,`nro_nicho`,`cost_nicho`,`est_pendiente`,`descripcion`,`id_sol`) VALUES ('$xnom_dif','$xpriape_dif','$xseguape_dif','$xfentierro','$xfautorizacion','$xdni_sol','$xnom_sol','$xdir_sol','$xid_nicho','$xid_pab','$xcel_sol','$xnro_nicho','$xcost_nicho','PAGADO','Prestamo de Nicho','$xid_sol')";
		mysqli_query($xc,$sql);
		
		$sql2="SELECT count(*) FROM solicitante WHERE dni_sol='$xdni_sol' AND id_sol='$xid_sol'";
		$res2=mysqli_query($xc,$sql2 );
 		$fila2=mysqli_fetch_array($res2);
		$xcantidad=$fila2[0];
		if($xcantidad>0)
		{
			
		}
		else
		{
			 $sql1 = "INSERT INTO `solicitante` (`dni_sol`, `nom_sol`, `tel_sol`, `dir_sol`) VALUES ('$xdni_sol', '$xnom_sol', '$xcel_sol', '$xdir_sol')";
			mysqli_query($xc, $sql1 );
//	//	//echo "$sql1 +";/
		//die();
		
		}
		
		$sql33 = "DELETE FROM `difunto` WHERE nom_dif='$xnom_dif' AND priape_dif='$xpriape_dif' AND segape_dif='$xseguape_dif' AND id_nicho='$xid_nicho'";
			mysqli_query( $sql33 );
			
		
	$sql3 = "INSERT INTO `difunto` (`nom_dif`, `dni_sol`, `fech_sep`, `id_nicho`, `priape_dif`, `segape_dif`,`id_sol`) VALUES ('$xnom_dif', '$xdni_sol', '$xfentierro', '$xid_nicho','$xpriape_dif','$xseguape_dif','$xid_sol')";
			mysqli_query($xc,$sql3 );
			
			$sql4="SELECT id_dif FROM difunto WHERE nom_dif='$xnom_dif' AND dni_sol='$xdni_sol' AND fech_sep='$xfentierro' AND priape_dif='$xpriape_dif' AND id_sol='$xid_sol'";
		$res4=mysqli_query($xc,$sql4 );
 		$fila4=mysqli_fetch_array($res4);
		$xid_dif=$fila4[0];
		
		
	$sql6 = "UPDATE nicho SET est_nicho='P' WHERE id_nicho='$xid_nicho'";
				mysqli_query($xc,$sql6 );
				
				
	
	
		
?>

<script type="text/javascript" src="formly.js"></script>
<script type="text/javascript" src="restricciones.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
<div id="body">
		<div class="cem">
			<h8>Prestamo de Nicho</h8>

   
    
    </div></div>
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>