<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
  

        $fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
               
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
		
		$xnom_alcalde="Sesion de Consejo";
		$xdni_alcalde="00000000";
		$xdir_alcalde="Municipalidad Distrital de Sachaca";
		
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xmonto_cuota=($xcost_nicho-$xcuota_ini);
			
		$xc=conectar();
		
		$sql = "select id_pend_conv from pen_conv where id_nicho=$xid_nicho and dni_sol=$xdni_sol";
		
		$res6=mysqli_query($xc,$sql);
		$fila6=mysqli_fetch_array($res6);
		$xid_pend_conv=$fila6[0];
		
		$sql = "delete from pen_conv where id_pend_conv=$xid_pend_conv";
		mysqli_query($xc,$sql);
		
		
		$sql = "INSERT INTO `pen_conv` (`nom_dif`, `priape_dif`, `seguape_dif`,`fentierro`,`fautorizacion`,`dni_sol`,`nom_sol`,`dir_sol`,`id_nicho`,`id_pabellon`,`cel_sol`,`nro_nicho`,`cost_nicho`,`nro_cuotas`,`monto_cuota`,`est_pendiente`,`cuota_ini`,`nom_alcalde`,`dir_alcalde`,`dni_alcalde`,`descripcion`) VALUES ('$xnom_dif','$xpriape_dif','$xseguape_dif','$xfentierro','$xfautorizacion','$xdni_sol','$xnom_sol','$xdir_sol','$xid_nicho','$xid_pab','$xcel_sol','$xnro_nicho','$xcost_nicho',1,'$xmonto_cuota','PAGADO','$xcuota_ini','$xnom_alcalde','$xdir_alcalde','$xdni_alcalde','Sesion de Consejo')";
		
		
		
		mysqli_query($xc,$sql);
		
		$sql1="UPDATE nicho SET est_nicho='O' WHERE id_nicho='$xid_nicho'";
		mysqli_query($xc,$sql1 );
		
		$sql6="SELECT id_dif FROM difunto WHERE id_nicho='$xid_nicho'";
		$res6=mysqli_query($xc,$sql6 );
		$fila6=mysqli_fetch_array($res6);
		$xid_dif=$fila6[0];
		
		
		
		$sql5="INSERT INTO `convenio` (`dni_sol`, `id_dif`, `cost_nicho`,`fautorizacion`,`nro_cuotas`,`cuota_ini`,`monto_cuota`) VALUES ('$xdni_sol','$xid_dif','$xcost_nicho','$xfautorizacion',1,'$xcuota_ini','$xmonto_cuota')";
		mysqli_query($xc,$sql5 );
		
		
		
		
		$dia_hoyX = $dia_hoy;
			  
				$xcuota_men=$xmonto_cuota;
				  $mes_hoy=$mes_hoy+1;  
				 
					if($mes_hoy>12)
					{	
						$mes_hoy=1;
						$ano_hoy=$ano_hoy+1;
					}
					
					if (($dia_hoy== 31) &&($mes_hoy==4 || $mes_hoy==6 || $mes_hoy==9 || $mes_hoy==11 )) 
						$dia_hoyX = 30;
					
					if( $mes_hoy == 2 && $dia_hoy>27)
					{
					if (($dia_hoy==29 || $dia_hoy==30 || $dia_hoy==31) &&  (($ano_hoy % 4 == 0) && !($ano_hoy % 100 == 0 && $ano_hoy % 400!= 0)))
						$dia_hoyX = 29;
					else 
						$dia_hoyX = 28;
					}
						
					if ($mes_hoy <10)
						$rpta=$ano_hoy."-0".$mes_hoy.'-'.$dia_hoyX;
					else 
						$rpta=$ano_hoy.'-'.$mes_hoy.'-'.$dia_hoyX;
											
	    
		$sql6="SELECT id_conv FROM convenio WHERE dni_sol='$xdni_sol' and id_dif='$xid_dif'";
		$res6=mysqli_query($xc,$sql6 );
		$fila6=mysqli_fetch_array($res6);
		$xid_conv=$fila6[0];
		
		
		$sql3="INSERT INTO `deudas`  (`id_conv`, `cuotas`, `monto_cuota`,`fecha_pago`,`estado`) VALUES ('$xid_conv',1,'$xmonto_cuota','$rpta','POR PAGAR')";
		mysqli_query($xc,$sql3 );		
		
		

		
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
		
		
	header("Location:gestion.php");
				?>
                
    
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
                

<?php require_once("footer.php") ?>