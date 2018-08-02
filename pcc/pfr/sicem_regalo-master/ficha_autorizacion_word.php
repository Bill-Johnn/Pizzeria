<?php require_once("funciones.php") ?>
<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=documento.doc");

$xid_pendiente=leerParam("xid_pendiente","");
 
// echo "$xid_pendiente + + +s";
// die();
 $xc=conectar();
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
		$xnro_fila=5;
		
		
	$sql1   = "SELECT nom_pab, id_cem FROM pabellon WHERE id_pab=$xid_pabellon"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab = $fila1[0];
	  $xid_cem =$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem=$xid_cem"; 
	  $res2  = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem = $fila2[0];
	 
	  
		
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
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");
		
		
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

echo "<p align='center'><strong>AUTORIZACIÓN</strong></p><br />"; 
/*?>
//<img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435">
<?php*/
echo "<p style='text-align:justify' align='left' align='justify'>La que suscribe, Mary Carmen Vizcarra Loayza, Registrador de la oficina del Registro Civil y Cementerios </p><br />";
echo "<p align='center'><strong>AUTORIZA</strong> </p><br />";
echo"<p align='justify' style='text-align:justify'>Al Sr.(a.) <strong>$xnom_sol,</strong> identificado con D.N.I. Nro. <strong>$xdni_sol,</strong > domiciliado en <strong>$xdir_sol,</strong> para que proceda a INHUMAR los restos de quien en vida fue: <strong>$xnom_dif, </strong> en el nicho Nro. <strong>$xnro_nicho, </strong>de la <strong>$xnro_fila </strong>fila del Pabellón <strong>$xnom_pab, </strong>del Cementerio $xnom_cem el día $fecha_LMM a las $hora_hoy horas.</p><br />";

echo "<p align='right'>Se extiende la presente solicitud de la parte interesada para los fines consiguientes.</p>";
echo "<p align='right'> Sachaca, $fecha_LM.</p>";	
echo "</body>";
echo "</html>";


?>
