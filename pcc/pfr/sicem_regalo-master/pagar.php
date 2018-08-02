<?php require_once("funciones.php") ?>
<?php
$xc    = conectar(); 
 
 $xid_pendiente=leerParam("xid_pendiente","");
 
// echo "$xid_pendiente + + +s";
// die();

$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
 
 $sql="SELECT * FROM pen_conv WHERE id_pend_conv='$xid_pendiente'";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xnom_dif=$fila[1];
		$xpriape_dif=$fila[2];
		$xseguape_dif=$fila[3];
		$xfentierro=$fila[4];
		$xfautorizacion=$fila[5];
		$xdni_sol=$fila[6];
		$xnom_sol=$fila[7];
		$xdir_sol=$fila[8];
		$xid_nicho=$fila[9];
		$xid_pabellon=$fila[10];
		$xcel_sol=$fila[11];
		$xnro_nicho=$fila[12];
		
		$xcost_nicho=$fila[13];
		$xnro_cuotas=$fila[14];
		$xmonto_cuota=$fila[15];
		$xcuota_ini=$fila[17];
		$xnom_alcalde=$fila[18];
		$xid_sol=$fila[22];
		
		////////////////////////////////////////////0
		
		$xpagototal=$xcost_nicho - $xcuota_ini;
						$xresiduo=$xpagototal%$xnro_cuotas;
						$xmontocomun=($xpagototal-$xresiduo)/$xnro_cuotas;
						if($xresiduo>0)
						{
							$xpricuota=$xmontocomun+1;
						}
						else
						{
							$xpricuota=$xmontocomun;
						}		
		//////////////////////////////////////////////
		
		
		
		
		
		$sql33 = "DELETE FROM `difunto` WHERE nom_dif='$xnom_dif' AND priape_dif='$xpriape_dif' AND segape_dif='$xseguape_dif' AND id_nicho='$xid_nicho'";
			mysqli_query( $sql33 );
		
		
		
		
		$sql3 = "INSERT INTO `difunto` (`nom_dif`, `dni_sol`, `fech_sep`, `id_nicho`, `priape_dif`, `segape_dif` ,`id_sol`) VALUES ('$xnom_dif', '$xdni_sol', '$xfentierro', '$xid_nicho','$xpriape_dif','$xseguape_dif','$xid_sol')";
			mysqli_query($xc,$sql3 );
			
		//echo "$sql3";
	//die();
			
		$sql4="SELECT id_dif FROM difunto WHERE nom_dif='$xnom_dif' AND dni_sol='$xdni_sol' AND fech_sep='$xfentierro' AND priape_dif='$xpriape_dif' and id_sol='$xid_sol'";
		$res4=mysqli_query($xc,$sql4 );
 		$fila4=mysqli_fetch_array($res4);
		$xid_dif=$fila4[0];
		//echo "$xid_dif + ";
		//die();

		/*$sql5 = "INSERT INTO `autorizacion` (`dni_sol`, `id_dif`, `fech_auto`) VALUES ('$xdni_sol', '$xid_dif', '$xfautorizacion')";
			mysqli_query($xc,$sql5 );*/
		
		 $sql6 = "UPDATE nicho SET est_nicho='O' WHERE id_nicho='$xid_nicho'";
				mysqli_query($xc,$sql6 );
		
		$sql7 = "UPDATE pen_conv SET est_pendiente='PAGADO' WHERE id_nicho='$xid_nicho'";
				mysqli_query($xc,$sql7 );
				
				
				
				
		if(($xcuota_ini!=0)&&(isset($xnom_alcalde)))
		{
			$sql8="INSERT INTO `convenio` (`dni_sol`, `id_dif`, `cost_nicho`,`fautorizacion`,`nro_cuotas`,`cuota_ini`,`monto_cuota`,`id_sol`) VALUES('$xdni_sol', '$xid_dif','$xcost_nicho','$xfautorizacion','$xnro_cuotas','$xcuota_ini','$xmonto_cuota', '$xid_sol')";
			mysqli_query($xc,$sql8 );
	    $sql9="SELECT id_conv FROM convenio WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' and id_sol='$xid_sol'";
		$res9=mysqli_query($xc,$sql9);
 		$fila9=mysqli_fetch_array($res9);
		$xid_conv=$fila9[0];

		
		
		$dia_hoyX = $dia_hoy;
			if($xcuota_ini and $xnro_cuotas)  
			{   
				
				  $mes_hoy=$mes_hoy+1;  
				 for($j=1; $j<=$xnro_cuotas; $j++) 
				 { 
				 	echo "<tr bgcolor=\"#FFCCFF\">";
					echo "<th>".$j." Cuota</th>"; 
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
						$xfecha_de_pago=$ano_hoy."-0".$mes_hoy.'-'.$dia_hoyX;
					else 
						$xfecha_de_pago=$ano_hoy.'-'.$mes_hoy.'-'.$dia_hoyX;	//fecha	
						
					if($j<=$xresiduo)
					{
						
						$sql10 = "INSERT INTO `deudas` (`id_conv`, `cuotas`, `monto_cuota`,`fecha_pago`,estado) VALUES ('$xid_conv', '$j', '$xpricuota','$xfecha_de_pago','POR PAGAR')";
			mysqli_query($xc,$sql10);
					}
					else
					{				
						$sql10 = "INSERT INTO `deudas` (`id_conv`, `cuotas`, `monto_cuota`,`fecha_pago`,estado) VALUES ('$xid_conv', '$j', '$xmontocomun','$xfecha_de_pago','POR PAGAR')";
			mysqli_query($xc,$sql10);
						
					}
					$dia_hoyX = $dia_hoy;
					$mes_hoy=$mes_hoy+1;    
					echo "</tr>";
					 
				}    	  
			}    
			echo "</table>"; 
		
		
		
			
		}
		if(($xcuota_ini!=0) && !(isset($xnom_alcalde)))
		{
			$sql6 = "UPDATE nicho SET est_nicho='P' WHERE id_nicho='$xid_nicho'";
				mysqli_query($xc,$sql6 );
			
				
		}
				
		header("Location: pendientes.php");
		
		
		


 

  desconectar( $xc );
 
?>
