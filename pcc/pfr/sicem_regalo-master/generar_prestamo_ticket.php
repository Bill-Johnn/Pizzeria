<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
  
/*DIFUNTO*/
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
		
		
		

		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");
		
			
		$xc=conectar();
		$sql = "INSERT INTO `pen_conv` (`nom_dif`, `priape_dif`, `seguape_dif`,`fentierro`,`fautorizacion`,`dni_sol`,`nom_sol`,`dir_sol`,`id_nicho`,`id_pabellon`,`cel_sol`,`nro_nicho`,`cost_nicho`,`est_pendiente`,`cuota_ini`,`descripcion`) VALUES ('$xnom_dif','$xpriape_dif','$xseguape_dif','$xfentierro','$xfautorizacion','$xdni_sol','$xnom_sol','$xdir_sol','$xid_nicho','$xid_pab','$xcel_sol','$xnro_nicho','$xcost_nicho','POR PAGAR','$xcuota_ini','Prestamo de Nicho')";
		//0echo "$sql + + + ";
		//die();
	//	echo"$sql";
	//	die();
		
		/*echo "nombre del difunto $xnom_dif <p>";
		echo "primer apellido del difunto $xpriape_dif <p>";
		echo "Segundo apedif $xseguape_dif <p>";
		echo "fecha entierro $xfentierro <p>";
		echo "fechas auto $xfautorizacion <p>";
		echo "dni sol $xdni_sol <p>";
		echo "nombre sol $xnom_sol <p>";
		echo "dir solicitan $xdir_sol <p>";
		echo "id de nicho $xid_nicho <p>";
		echo "id pabel $xid_pab <p>";
		echo "cel solici $xcel_sol <p>";
		echo "nro de nicho $xnro_nicho <p>";	
		echo "costo nicho $xcost_nicho <p>";	
		die();*/
		
				//echo " $xnom_dif ++ ";
				//die(); 
		mysqli_query($xc,$sql);
		
		$sql4="SELECT id_pend_conv FROM pen_conv WHERE id_nicho='$xid_nicho' AND dni_sol='$xdni_sol'";
		$res4= mysqli_query($xc,$sql4 );
		$fila4=mysqli_fetch_array($res4);				
		$xcod_ticket=$fila4[0];
		desconectar($xc);
				?>
                
    <div id="body">
		<div class="cem">
			<h8>ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $xcod_ticket; ?></h8>   
            
          
    </div></div>
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
                

<?php require_once("footer.php") ?>