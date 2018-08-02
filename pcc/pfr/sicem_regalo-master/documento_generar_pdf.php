<?php require_once("funciones.php") ?>

 
<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=documento.doc");

$xid_pendiente=leerParam("xid_pendiente","");
 //<p align='center' style="font-variant:small-caps; text-decoration:line-through; text-decoration:overline" >
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
echo "<img src='../../../wamp/www/sicem/img/escudo1.png' height='180' width='140'>";

echo "<p align='center' style='text-decoration:underline'><strong>CONTRATO DE CESIÓN EN USO POR FRACCIONAMIENTO</strong></p><br />"; 
/*?>
//<img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435">
<?php*/
//echo "<p align='right'>CONV  Nro </p><br />";
//echo"<p align='justify' style='text-align:justify; margin-left:70' >
echo"<p align='justify' style='text-align:justify' >Conste por el presente, EL CONTRATO DE CECION EN USO que celebran de una parte, la MUNICIPALIDAD DISTRITAL DE SACHACA con R.U.C. Nro.20190583369, cn domicilio legal en Av. Fernandini s/n ( Estadio de Sachaca ), representada por su Gerente de Servicios Vecinales designado mediante Resolución de Alcadía Nro. 409-2013 <strong>Arq. Cesar Aldabázal Soto</strong>, identificado con DNI Nro. <strong>29467638</strong >, a la que adelante se le denominará <strong>LA MUNICIPALIDAD</strong >; y de la otra parte el Sr. (a) <strong>$xnom_sol</strong >, identificado(a) con DNI Nro.<strong>$xdni_sol</strong>, con domicilio real en <strong>$xdir_sol</strong>, teléfono:<strong> $xcel_sol</strong>, a quien se denominará <strong>EL/ LA BENEFICIARIO</strong > en los términos contenidos en las claúsulas siguientes:</p>

<p align='left' style='text-decoration:underline'>ANTECEDENTES:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>PRIMERA: </strong></label><strong>LA MUNICIPALIDAD</strong> es propietaria de los terrenos y nichos que comprende los Cementerios Públicos Municipales de Sachaca, los cuales únicamente pueden ser objeto de cesión en uso a favor de particulares que lo soliciten cumpliendo las condiciones establecidas para ello.</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>SEGUNDA: </strong></label><strong>EL BENFICIARIO</strong> ha manifestado el interés en obtener un nicho, para lo cual ha cumplido con los requisitos establecidos en el Art. 25 del Reglamento de Cementerio aprobado por la municipalidad a través de Ordenanza Nro. 004-2014-MDS.</p>
	
<p align='left' style='text-decoration:underline'>OBJETO DEL CONTRATO:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>TERCERA: </strong></label>En virtud del presente contrato, <strong>LA MUNICIPALIDAD</strong> se obliga a ceder el uso a favor de <strong>EL BENEFICIARIO $xnom_sol</strong> el nicho Nro. <strong>$xnro_nicho</strong>, ubicado en la <strong>$xnro_fila</strong> fila del Pabellón <strong>$xnom_pab</strong> del Cementerio de <strong>$xnom_cem.</strong></p>
	
	<p align='justify' style='text-align:justify'><label style='font-size:19px; '><strong>CUARTA: </strong></label>Las partes dejan constancia que el nicho a que se refiere la cláusula anterior se encuentra desocupado y en buen estado de conservación, lo que permite su uso pleno.</p>
	
	<p align='left' style='text-decoration:underline'>DERECHO DE USO DE NICHO: FORMA, OPORTUNIDAD Y LUGAR DE PAGO:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>QUINTA: </strong></label>Las partes acuerdan que el monto del derecho de uso durate el plazo de vigencia previsto para el presente contrato asciende a S/. ($xcost_nicho .00 Soles y 00/100).</p>
	
	<p align='justify' style='text-align:justify'>Dicho monto será pagado en forma fraccionada en $xnro_cuotas cuota(s) mensuales conforme al cronograma que forma parte del presente contrato y que ha sido aprobado mediante Resolución de Gerencia de Servicios Vecinales Nro. ..... </p>
	
	<p align='justify' style='text-align:justify'>Se deja constancia que para la suscripción del presente contrato el <strong>BENEFICIARIO</strong> ha cumplido con abonar la cuota inicial de $xcuota_ini a través de Recibo Nro. .....</p>";
    
echo"<table border=0 cellpadding=5 cellspacing=5 align='center'>
 
	<tr bgcolor=\'#9999CC\' >  
              <td><font color=\'#000\'><strong>Nro de cuotas</strong></font></td>  
              <td><font color=\'#000\'><strong>FECHA</strong></font></TD>  
              <td><font color=\'#000\'><strong>S/.</strong></font></TD>  
         </tr>
         <tr bgcolor='#BFBFBF'><th>Cuota Inicial: </th> <td> $fecha_hoy </td><td>$xcuota_ini</td></tr>";
  		
      
		
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
						echo "<th>".$ano_hoy."-0".$mes_hoy.'-'.$dia_hoyX."</th>";
					else 
						echo "<th>".$ano_hoy.'-'.$mes_hoy.'-'.$dia_hoyX."</th>";	
						
					if($j<=$xresiduo)
					{
						echo "<td>".round($xpricuota, 2)."</td>";
					}
					else
					{				
						echo "<td>".round($xmontocomun, 2)."</td>";
					}
					$dia_hoyX = $dia_hoy;
					$mes_hoy=$mes_hoy+1;    
					echo "</tr>"; 
				}    	  
			}    
			echo "</table>"; 

echo"<p align='justify' style='text-align:justify' >Asimismo, se señala expresamente con el Reglamento de Cementerios de la Municipalidad, sobre el valor correspondiente al derecho de uso se ésta aplicando una tasa de interés compensatorio anual del 15%. </p>

<p align='justify' style='text-align:justify' >Finalmente, se hace constar que conforme con el referido Reglamento, el incumplido de pago de dos cuotas consecutivas dará lugar a la pérdida del beneficio teniéndose por vencidas todas las cuotas, pudiendo darse inicio al procedimiento de cobranza y/o  reversión del nicho. </p>
 
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>SEXTA: </strong></label>
El monto convenido en la cláusula precedente comprende únicamente a la cesión de uso propiamente dicho, no asi los costos por autorización para la instalación de lápidas, emblemas o epitafios, y para la construcción de cualquier clase de obras. El otorgamiento de este tipo de autorizaciones está sujeto al pago de la tasa correspondiente establecida en el TUPA de la Municipalidad.
</p>

<p align='justify' style='text-align:justify' >En todos los casos, está normado que no se autorizará la colocación de lápidas o placa a las personas naturales y/o jurídicas que hayan comprado nichos al crédito, sino hasta su cancelación.</p>

<p align='left' style='text-decoration:underline'>PLAZO DEL CONTRATO:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>SETIMA: </strong></label>Las partes convienen en fijar un plazo de duración determinado para el presente contrato, el cual será de veinticinco (25) años, que se computarán a partir de la suscripción del presente contrato hasta el 2039, fecha en la que <strong>EL BENFICIARIO</strong> está obligado a desocupar y devolver el bien materia de cesión de uso. Al vencimiento de dicho plazo, las partes de común acuerdo podrán renovar el presente contrato por plazos de igual duración.</p>
	
	<p align='justify' style='text-align:justify' >En caso que se produzca la desocupación de nichos por traslado de los restos a otros lugares, el derecho de cesión de uso podrá ser conservado  por el titular o sus herederos para la inhumación de otros restos por el plazo que quede hasta alcanzar los veinticinco (25) años de la cesión original. No obstante, el titular o sus herederos podrán solicitar la extinción del derecho de cesión de uso y el reembolso del monto equivalente al 40% del valor actualizado conforme el TUSNE de los derechos, y de un 20% si la desocupación se efectúa antes de los diez años.</p>
	
<p align='left' style='text-decoration:underline'>OBLIGACIONES DEL BENEFICIARIO:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>OCTAVA: </strong></label>Son obligaciones de <strong>EL BENEFICIARIO</strong> las siguientes.</p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >a. Solicitar autorización para la instalación de lápidas, emblemas o epitafios, y para la construcción de cualquier clase de obras. El otorgamiento de este tipo de autorizaciones está sujeto al pago de la tasa correspondiente establecida en el TUPA de la Municipalidad. </p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >b. Asegurar el cuidado, conservación y limpieza de las obras e instalaciones de titularidad particular, así como el aspecto exterior de las unidades de enterramiento adjudicadas colocando los elementos ornamentales conforme a las normas establecidas.</p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >c. Comunicar a la Administración las variaciones de domicilio, números de teléfono y de cualquier otro dato de influencia en las relaciones del titular con el servicio de Cementerio.</p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >d. Retirar a su costa las obras y ornamentos de su propiedad, cuando se extinga la cesión de uso.</p>
	
	<p align='justify' style='text-align:justify'><label style='font-size:19px; '><strong>NOVENA: </strong></label>En el supuesto que EL BENEFICIARIO permaneciera en posesión del nicho uego de vencido el plazo pactado en este contrato, o en caso de incumplimiento de cualquiera de sus obligaciones  LA MUNICIPALIDAD iniciará el procedimiento para el retiro y traslado de los restos a la fosa común.</p>
	
	<p align='left'>DE LA TRANSFERENCIA DE LOS DERECHOS DE CESIÓN EN USO</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>DÉCIMA: </strong></label>Los derechos derivado de la cesión de uso de nichos son transferibles por acto ente vivos o por causa de muerte, debiendo ser puesta en conocimiento de la Municipalidad con la documentación que la sustente para que el que adquiriente del derecho pueda ejercerlo.</p>
	
	<p align='justify' style='text-align:justify' >La transmisión “mortis causa” del derecho funerario se regirá por las normas establecidas en el Código Civil para las sucesiones (testamento o partición judicial o extrajudicial).</p>
	
	<p align='left' style='text-decoration:underline'>CLAUSULA RESOLUTORIA:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>DÉCIMA PRIMERA: </strong></label>Son causales de resolución de pleno derecho del presente contrato:</p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >a. La voluntad de <strong>EL BENEFICIARIO</strong>, que deberá ser comunicada por escrito a <strong>LA MUNICIPALIDAD</strong>.</p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >b. El incumplimiento de cualquiera de las obligaciones por parte de <strong>EL BENEFICIARIO</strong> establecidas en el presente documento.</p>
	
	<p align='left' style='text-decoration:underline'>APLICACIÓN SUPLETORIA DE LA LEY:</p>
    
    <p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>DÉCIMA SEGUNDA: </strong></label>Para todo lo no expresamente previsto en este contrato, la vinculación entre las partes se regirá por las disposiciones contenidas en nuestro Código Civil, Ley Orgánica de Municipalidades Ley Nro 27972, Reglamento de Cementerio aprobado mediante Ordenanza Nro.2013MDS y suplementariamente, por las normas aplicables por conexión y/o modificación.</p>
	
	<p align='left' style='text-decoration:underline'>DOMICILIOS:</p>
	
	<p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>DÉCIMA TERCER</strong></label>Para los efectos del presente contrato, las partes señalan los siguientes domicilios:</p>
	
	<p align='justify' style='text-align:justify; margin-left:60' >- Municipalidad Distrital de Sachaca: Av. Fernandini s/n (Estadio de Sachaca)</p>
	
		<p align='justify' style='text-align:justify; margin-left:60' >- El Beneficiario: $xdir_sol</p>
		
	<p align='justify' style='text-align:justify'>Queda convenido que, para todo efecto, las partes dejan constituidos sus domicilios en los lugares precedentemente citados, en los que se efectuará válidamente, cualquier notificación judicial o extrajudicial. El cambio domiciliario de cualquiera de las partes, sólo surtirá efecto a partir de sétimo día hábil siguiente de comunicación de dicho cambio a la contraparte, por conducto notarial.</p>
	
	<p align='left' style='text-decoration:underline'>COMPETENCIA TERRITORIAL:</p>
	
	<p align='justify' style='text-align:justify'> <label style='font-size:19px; '><strong>DÉCIMA CUARTA</strong></label>Las partes acuerdan que cualquier litigio, pleito, controversia, duda, discrepancia o reclamación resultante de la ejecución de este contrato, o relacionado con el directamente, asi como cualquier supuesto de incumplimiento, terminación, nulidad o invalidez del mismo, será sometido a la jurisdicción de los jueces y tribunales de la ciudad de Arequipa, constituyendo la presente una cláusula de prórroga convencional de la competencia territorial por el Art.25 del C.P.C.</p>
	
	<p align='justify' style='text-align:justify' >En señal de Conformidad del presente documento, las partes se ratifican y lo suscriben en Arequipa: ......</p>	";

echo "</body>";
echo "</html>";

?>
<p align='justify' style='text-align:justify; margin-right:auto' >