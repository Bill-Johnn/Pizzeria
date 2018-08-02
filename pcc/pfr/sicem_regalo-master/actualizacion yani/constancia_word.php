<?php require_once("funciones.php") ?>
<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=documento.doc");


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
		$xnro_fila=leerParam("xnro_fila","");
		// no llega la fila
		
		$xnom_alcalde=leerParam("xnom_alcalde","");
		
		$xdir_alcalde=leerParam("xdir_alcalde","");
		$xdni_alcalde=leerParam("xdni_alcalde","");
		
		
$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
		
		setlocale(LC_ALL, 'esm');
		$fecha_LM=strftime("%d de %B del %Y");
		$fecha_LMM=strftime("%A %d de %B del %Y");
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");
		
		
		switch($xnro_fila)
	{
		case 1: $xnro_fila=Primera ;break;
		case 2: $xnro_fila=Segunda ;break;
		case 3: $xnro_fila=Tercera ;break;
		case 4: $xnro_fila=Cuarta ;break;
		case 5: $xnro_fila=Quinta ;break;
		case 6: $xnro_fila=Sexta ;break;
	}
		
		$xc=conectar();
		/*$result=mysqli_query("SELECT id_ima_nicho FROM `nicho` WHERE id_nicho='$xid_nicho'");
		$row2=mysqli_fetch_array($result);
		$xid_imagen=$row2[0];

		$result=mysqli_query("SELECT * FROM `imagen` WHERE id_imagen='1'");
		$row2=mysqli_fetch_array($result);
		$image=$row2['imagen'];
		$idni=1;*/
?>

<?php

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";

?>

<?php
echo "<img src='../../../Users/InG_G/Pictures/escudo1.png' height='180' width='140'>";

echo "<p align='right'>LA ENCARGADA DEL DEPARTAMENTO DE REGISTRO CIVIL Y CEMENTERIOS DE LA MUNICIPALIDAD DISTRITAL DE SACHACA:</p><br />";
echo "<p align='center'><strong>DEJA CONSTANCIA:</strong> </p><br />";
echo"<p align='justify'style='text-align:justify' >Que en el cementerio Municipal de Sachaca, se encuentran sepultados los restos mortales de quien en vida fue: <strong>$xnom_dif $xpriape_dif $xseguape_dif, </strong> en el nicho Nro. <strong>$xnro_nicho, </strong>de la <strong>$xnro_fila </strong>fila del Pabellón <strong>$xnom_pab, </strong> sepultada el día $xfentierro</p><br />";

echo "<p align='right' style='text-align:justify'>SE EXPIDE LA PRESENTE CONSTANCIA A SOLICITUD DE LA PARTE INTERESADA, Y PARA LOS FINES QUE DETERMINE</p>";
echo "<p align='right'> Sachaca, $fecha_LM.</p>";	
echo "</body>";
echo "</html>";


?>
