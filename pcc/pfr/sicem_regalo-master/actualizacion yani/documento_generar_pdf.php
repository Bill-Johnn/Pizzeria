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
		$xnro_cuotas=$fila[14];
		$xmonto_cuota=$fila[15];
		$xcuota_ini=$fila[17];
		
	
	$sql1   = "SELECT nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnro_fila = $fila1[0];
	  	
		
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

/*DIFUNTO
		$xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");

/*SOLICITANTE
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");

/*NICHO
		$xid_nicho = leerParam("xid_nicho","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnom_cem=leerParam("xnom_cem","");
		$xnom_pab=leerParam("xnom_pab","");
		// no llega la fila
		
		$xnom_alcalde=leerParam("xnom_alcalde","");
		
		$xdir_alcalde=leerParam("xdir_alcalde","");
		$xdni_alcalde=leerParam("xdni_alcalde","");*/
		

		$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
		$hora_hoy=date('H:i');
		
	
		setlocale(LC_ALL, 'esm');
		$fecha_LM=strftime("%d de %B del %Y");
		$fecha_LMM=strftime("%A %d de %B del %Y");
		
		/*$xc=conectar();
		$result=mysqli_query("SELECT id_ima_nicho FROM `nicho` WHERE id_nicho='$xid_nicho'");
		$row2=mysqli_fetch_array($result);
		$xid_imagen=$row2[0];

		$result=mysqli_query("SELECT * FROM `imagen` WHERE id_imagen='1'");
		$row2=mysqli_fetch_array($result);
		$idni=1;*/



echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<img src='../../../Users/InG_G/Pictures/escudo1.png' height='180' width='140'>";

echo "<p align='center'><strong>CONVENIO DE FRACCIONAMIENTO</strong></p><br />"; 
/*?>
//<img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435">
<?php*/
echo "<p align='right'>CONV  Nro </p><br />";
echo"<p align='justify' style='text-align:justify; margin-left:70' >Conste por el presente, el Convenio de Fraccionamiento de NICHO, que efectúa La Municipalidad Distrital de Sachaca representada por el señor Alcalde Sr. <strong>$xnom_alcalde,</strong> identificado con D.N.I. Nro. <strong>$xdni_alcalde, </strong >con domicilio en <strong>$xdir_alcalde,</strong>a quien se denomina el VENDEDOR, y de otra parte, Sr.(a.) <strong>$xnom_sol, </strong>identificado(a) con D.N.I. Nro.<strong>$xdni_sol, </strong>con domicilio en <strong>$xdir_sol, </strong>y con número telefónico<strong> $xcel_sol, </strong> quien se denominará el COMPRADOR, en los términos siguientes.</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>PRIMERO: </strong></label>La MUNICIPALIDAD DISTRITAL DE LA VILLA DE SACHACA, estando a lo dispuesto por el inciso decimo quinto del Art. 65° de la Ley Organica de Municipalidades, esta obligada a la habilitación, conservación y administración de los CEMENTERIOS que se instalen en su jurisdicción.</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>SEGUNDO: </strong></label>En tal sentido la Municipalidad continuamente efectua la construcción y mantenimiento de nuevos pabellones de nichos en los Cementerios que administra, que son los de Sachaca y de Tío Chico, cuyo costo debe ser asumido por los vecinos, en cuanto se atienda a sus requerimientos. Para lo cual mediante Sesión de Concejo se han fijado los valores de nichos construidos.</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>TERCERO: </strong></label>Por el presente la Municipalidad enajena temporalmente mediante el presente CONVENIO DE FRACCIONAMIENTO, por derecho a sepultura en el Nicho Nro. <strong>$xnro_nicho ,</strong> <strong> $xnro_fila,</strong> Pabellón <strong>$xnom_pab, </strong>del Cementerio Tradicional de<strong> $xnom_cem, </strong>para Inhumar los restos mortales de quien en vida fue: <strong>$xnom_dif $xpriape_dif $xseguape_dif</strong> con un costo total de <strong>S./ $xcost_nicho ($xnom_cost), </strong> en calidad de VENDIDO, a favor del COMPRADOR.</p>
	
	<p align='justify' style='text-align:justify'><label style='font-size:19px; '><strong>CUARTO: </strong></label>El COMPRADOR efectua el pago de la sepultura al CREDITO, de la siguiente manera:</p>";
    
echo"<table border=0 cellpadding=5 cellspacing=5 align='center'>
 
	<tr bgcolor=\'#9999CC\' >  
              <td><font color=\'#000\'><strong>Nro de cuotas</strong></font></td>  
              <td><font color=\'#000\'><strong>FECHA</strong></font></TD>  
              <td><font color=\'#000\'><strong>S/.</strong></font></TD>  
         </tr>
         <tr bgcolor='#BFBFBF'><th>Cuota Inicial: </th> <td> $fecha_hoy </td><td>$xcuota_ini</td></tr>";
  		
      
		
			if($xcuota_ini and $xnro_cuotas)  
				{   
					$xcuota_men=($xcost_nicho-$xcuota_ini)/$xnro_cuotas; 
					  $mes_hoy=$mes_hoy+1;  
					 for($j=1; $j<=$xnro_cuotas; $j++) { 
					 echo "<tr bgcolor=\"#F2F2F2\">";
					 	echo "<th>".$j.Cuota."</th>"; 
						if($mes_hoy>12)
						{	$mes_hoy=1;
							 $ano_hoy=$ano_hoy+1;}
						echo "<th>".$ano_hoy.'-'.$mes_hoy.'-'.$dia_hoy."</th>";   
						 echo "<td>".$xcuota_men."</td>";
						 $mes_hoy=$mes_hoy+1;    
					 echo "</tr>"; 
					 }    
					          
				}    
			echo "</table>"; 

echo"<p align='justify' style='text-align:justify'><label style='font-size:19px;'><strong>QUINTO: </strong></label>El comprador mediante el presente autoriza a la Municipalidad para que en el caso de no cumplir con el pago puntual de las cuotas referidas, a que traslade sin consentimiento, los restos de la persona enterrada a otro nicho de menor valor, pues declara la compradora, que sabe muy bien que con los dineros que se obtinen por dicha venta, sirven para contruir otros nuevos nichos y darle mantenimiento a los cementerios.</p>
    <p align='justify' style='text-align:justify'>Ambas partes declaran que, en el presente no ha mediado causal de invalidez alguna, firmando el presente en señal de conformidad en Sachaca, a los $dia_hoy días .....</p><br /><br />";
	
	echo "<p>          ....................................................             ....................................................</p>";
	echo "<p>          $xnom_alcalde   $xnom_sol</p>";	
echo "</body>";
echo "</html>";


?>
<p align='justify' style='text-align:justify; margin-right:auto' >