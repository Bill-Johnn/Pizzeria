<?php require_once("funciones.php") ?>
<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=documento.doc");

$xid_conv=leerParam("xid_conv","");
$xnro_cuota=leerParam("xnro_cuota","");
 
//echo "$xid_conv  +++++ $xnro_cuota ++++";
 //die();
 $xc=conectar();
 $sql="SELECT * FROM convenio WHERE id_conv='$xid_conv'";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xid_dif=$fila[2];
		$xid_sol=$fila[8];
		$xnro_cuotas=$fila[5];
		$xcuota_ini=$fila[6];
		$xfautorizacion=$fila[4];
		
		
 $sql="SELECT monto_cuota , fecha_pago FROM deudas WHERE id_conv='$xid_conv' and estado='POR PAGAR' order by cuotas asc";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xmonto_cuota=$fila[0];
		$xfecha_pago=$fila[1];

		
 $sql="SELECT * FROM difunto WHERE id_dif='$xid_dif'";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xnom_dif=$fila[1];
		$xpriape_dif=$fila[5];
		$xseguape_dif=$fila[6];
		$xdni_sol=$fila[2];
		$xid_nicho=$fila[4];
		
$sql="SELECT * FROM solicitante WHERE id_sol='$xid_sol'";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xnom_sol=$fila[1];
		$xdir_sol=$fila[3];
		$xcel_sol=$fila[2];
		
$sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xnro_nicho=$fila[3];
	  $xid_pab=$fila[4];
	  $xnro_fila=$fila[5];			
		
	$sql1   = "SELECT nom_pab, id_cem FROM pabellon WHERE id_pab=$xid_pab"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab = $fila1[0];
	  $xid_cem =$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem=$xid_cem"; 
	  $res2  = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem = $fila2[0];
	  
	  $sql1="SELECT * FROM deudas WHERE id_conv='$xid_conv'";
		 $res1=mysqli_query($xc,$sql1 );
		 
	 
	  
		
	desconectar($xc);	
	
	
	
	switch($xnro_fila)
	{
		case 1: $xnro_fila=Primera ;break;
		case 2: $xnro_fila=Segunda ;break;
		case 3: $xnro_fila=Tercera ;break;
		case 4: $xnro_fila=Cuarta ;break;
		case 5: $xnro_fila=Quinta ;break;
		case 6: $xnro_fila=Sexta ;break;
	}
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=documento.$xid_pendiente.doc");
	
		
		$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
		$hora_hoy=date('H:i');
		
	
		setlocale(LC_ALL, 'esm');
		$fecha_LM=strftime("%d de %B del %Y");
		$fecha_LMM=strftime("%A %d de %B del %Y");
		
				
		//$resultado = strtoupper($origen);
		
		
		
		/*$result=mysqli_query("SELECT id_ima_nicho FROM `nicho` WHERE id_nicho='$xid_nicho'");
		$row2=mysqli_fetch_array($result);
		$xid_imagen=$row2[0];

		$result=mysqli_query("SELECT * FROM `imagen` WHERE id_imagen='1'");
		$row2=mysqli_fetch_array($result);
		$idni=1;*/



echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";

echo "<img src='../../../wamp/www/sicem/img/escudo1.png' height='180' width='140'>";


/*?>
//<img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435">
<?php*/
echo "<p style='text-align:justify' align='left' align='justify'>La que suscribe, Mary Carmen Vizcarra Loayza, encargada del Departamento de Registro Civil y Cementerios";
echo "<strong> NOTIFICA A:</strong></p> "; 
echo "<p align='left'><strong>Sr.(a.) $xnom_sol</strong> </p> ";
echo"<p align='justify' style='text-align:justify'>Nos ponemos en contacto con Ud. en referencia a la(s) deuda(s) vencida(s) desde la fecha <strong>$xfecha_pago</strong> y correspondiente al prestamo de nicho Nro. <strong>$xnro_nicho, </strong>de la <strong>$xnro_fila </strong>fila del Pabellón <strong>$xnom_pab, </strong>del Cementerio $xnom_cem : </p>";

echo"<table border=1 bordercolor=#000000 cellpadding=5 cellspacing=5 align='center'>
				<tr bgcolor=\'#9999CC\' >  
					  <td><font color=\'#000\'><strong>Nro de cuotas</strong></font></td>  
					  <td><font color=\'#000\'><strong>FECHA</strong></font></TD>  
					  <td><font color=\'#000\'><strong>S/.</strong></font></TD>  
					  <td><font color=\'#000\'><strong>ESTADO</strong></font></TD>  
        		 </tr>
				
				<tr  align='center'>
                    
                    <th>Cuota Inicial</th>
                    <td>$xfautorizacion</td>
                    <td>$xcuota_ini</td>
                    <td>CANCELADO</td>
                   
                   
                </tr>";

while ($fila1=mysqli_fetch_array($res1)){
			
			if (((dateDiff($fecha_hoy,$fila1['fecha_pago'] ))<0) && !($fila1['estado']=='PAGADO'))
			  
			{
				
							
				echo "
			<tr bgcolor=#FF4A4F align='center'>
				<th>".$fila1['cuotas']." Cuota</th>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
				
				
			
			</tr>";
			}
			else
			{
				echo "
			<tr bgcolor=#A9F5E1 align='center'>
				<th>".$fila1['cuotas']." Cuota</th>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
				
			</tr>";
			}
		
		
		
	}
	
echo "</table>";

echo "<p align='justify' style='text-align:justify'>El motivo de la comunicación es que hasta la fecha no hemos recibido la confirmación del pago de la deuda mencionada, por lo que le agradeceríamos acercarse por la oficina del Departamento de Registro Civil y Cementerios lo antes posible.</p>";
echo "<p align='justify' style='text-align:justify'>Nota: Se le recuerda que el incumploimiento de pago de dos cuotas consecutivas dará lugar a la pérdida del beneficio dándose por vencidas todas las cuotas, dándose inicio al procedimiento de cobranza y/o la reversión del nicho. El fraccionamiento dará lugar a que se aplique una tasa de interés compensatoria equivalente al 15% anual.</p>";

echo "<p align='justify'>Sin otro particular, aprovecho para enviarle un cordial saludo.</p>";
echo "<p align='right'> Sachaca, $fecha_LM.</p>";	
echo "</body>";
echo "</html>";


?>
