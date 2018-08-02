<?php require_once("funciones.php") ?>
<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=documento.doc");


/*SOLICITANTE*/
		$xtipo_auto= leerParam("xtipo_auto","");
		
		$xdni_sol= leerParam("xdni_sol","");
		$xnom_sol= leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");

/*NICHO*/
		$xid_nicho = leerParam("xid_nicho","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnom_cem=leerParam("xnom_cem","");
		$xnom_pab=leerParam("xnom_pab","");
		// no llega la fila
		
		$xid_dif = leerParam("xid_dif","");
$xc=conectar();

$sql   = "SELECT nom_dif, fech_sep, priape_dif, segape_dif FROM difunto WHERE id_dif=$xid_dif"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xnom_dif = $fila[0];
	  $xfentierro=$fila[1];
	  $xpriape_dif=$fila[2];
		$xseguape_dif=$fila[3];
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xnro_nicho=$fila[3];
	  $xid_pab=$fila[4];
	  $xnro_fila=$fila[5];

$sql   = "SELECT nom_pab, id_cem FROM pabellon WHERE id_pab=$xid_pab"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xnom_pab = $fila[0];
	  $xid_cem=$fila[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem=$fila2[0];

		switch($xnro_fila)
	{
		case 1: $xnro_fila=Primera ;break;
		case 2: $xnro_fila=Segunda ;break;
		case 3: $xnro_fila=Tercera ;break;
		case 4: $xnro_fila=Cuarta ;break;
		case 5: $xnro_fila=Quinta ;break;
		case 6: $xnro_fila=Sexta ;break;
	}
		
$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
		$hora_hoy=date('H:i');
		
	
		setlocale(LC_ALL, 'esm');
		$fecha_LM=strftime("%d de %B del %Y");
		$fecha_LMM=strftime("%A %d de %B del %Y");
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");
		
		$xc=conectar();
		/*$result=mysqli_query("SELECT id_ima_nicho FROM `nicho` WHERE id_nicho='$xid_nicho'");
		$row2=mysqli_fetch_array($result);
		$xid_imagen=$row2[0];

		$result=mysqli_query("SELECT * FROM `imagen` WHERE id_imagen='1'");
		$row2=mysqli_fetch_array($result);
		$idni=1;*/



echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<img src='../../../Users/InG_G/Pictures/escudo1.png' height='180' width='140'>";

echo "<p align='center'><strong>AUTORIZACIÓN</strong></p>"; 
/*?>
//<img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435">
<?php*/
echo "<p align='right' style='margin:60'>La que suscribe, Mary Carmen Vizcarra Loayza, Registrador de la oficina del Registro Civil y Cementerios </p><br />";
echo "<p align='center'><strong>AUTORIZA</strong> </p>";
echo"<p align='justify' style='text-align:justify' >Al Sr.(a.) <strong>$xnom_sol,</strong> identificado con D.N.I. Nro. <strong>$xdni_sol,</strong > domiciliado en <strong>$xdir_sol,</strong> para que proceda a colocar una $xtipo_auto, en el nicho Nro. <strong>$xnro_nicho, </strong>de la <strong>$xnro_fila </strong>fila del Pabellón <strong>$xnom_pab, </strong>del Cementerio $xnom_cem, donde se encuentran enterrados los restos de  quien en vida fue: <strong> $xnom_dif $xpriape_dif $xseguape_dif, </strong>el día $fecha_LMM a las $hora_hoy horas.</p><br />";
echo "<p align='right'> Sachaca, $fecha_LM.</p>";	
echo "</body>";
echo "</html>";


?>
<P 