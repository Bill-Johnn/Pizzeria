<?php
require('funciones.php');

$xc=conectar();

$busqueda=$_POST['busqueda'];
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
	if ($numero==1) {
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$cadbusca="SELECT * FROM pen_conv WHERE est_pendiente='PAGADO' AND (nom_dif LIKE '%$busqueda%' OR priape_dif LIKE '%$busqueda%' OR seguape_dif LIKE '%$busqueda%' OR dni_sol LIKE '%$busqueda%' OR nom_sol LIKE '%$busqueda%') ;";
		
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$cadbusca="SELECT * , MATCH ( coddoc, titulo ) AGAINST ( '$busqueda' ) AS Score FROM documento WHERE MATCH ( coddoc, titulo ) AGAINST ( '$busqueda' ) 
		ORDER BY Score DESC;";
	}
	
	function limitarPalabras($cadena, $longitud, $elipsis = "..."){
		$palabras = explode(' ', $cadena);
		if (count($palabras) > $longitud)
			return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
		else
			return $cadena;
	}
?>
<style type="text/css" >
<!--
@import url("tablas.css");
-->
</style>

	<table style="width:100%" summary="Submitted table designs"> 
	<thead>
		<tr bgcolor="#003399">
			<th scope="col">Nombre y Apellidos del difunto</th>
			<th scope="col">DNI. del solicitante</th>
			<th scope="col">Nombre de Solicitante</th>
			<th scope="col">Dir. Solicitante</th>
            <th scope="col">Cel. Solicitante</th>
            <th scope="col">Id Nicho</th>
			<th scope="col">Nro. Nicho</th>
            <th scope="col">Acción</th>
			
		</tr>
	</thead>
<?php
	$result=mysqli_query($xc,$cadbusca);
	$i=0;
	echo "<tbody>";
	while ($row = mysqli_fetch_array($result)){
		$xid_pendiente=$row['id_pend_conv'];
		$xtipo=$row['cuota_ini'];
		
		if($i%2 ==0)
		{
			echo "
			<tr>
				<th scope='row' id='r100'>".$row['nom_dif'].' '.$row['priape_dif'].' '.$row['seguape_dif']."</th>
				<td>".$row['dni_sol']."</td>
				<td>".limitarPalabras($row['nom_sol'],3)."</td>
				<td>".$row['dir_sol']."</td>
				<td>".$row['cel_sol']."</td>
				<td>".$row['id_nicho']."</td>
				<td>".$row['nro_nicho']."</td>
				<td> ";
			if($xtipo){
				echo " <a href=documento_generar_pdf.php?xid_pendiente=$xid_pendiente>Generar Convenio</a> <p>
                       <a href=ficha_autorizacion_word.php?xid_pendiente=$xid_pendiente>Generar Autorización</a>
				
                </td>
			</tr>";
			}
			else{
				echo " <a href=ficha_autorizacion_word.php?xid_pendiente=$xid_pendiente>Generar Ficha de Autorización</a>
                </td>
			</tr>";
			}
		}
		else
		{
			echo "
			<tr class=odd>
				<th scope='row' id='r99'>".$row['nom_dif'].' '.$row['priape_dif'].' '.$row['seguape_dif']."</th>
				<td>".$row['dni_sol']."</td>
				<td>".limitarPalabras($row['nom_sol'],3)."</td>
				<td>".$row['dir_sol']."</td>
				<td>".$row['cel_sol']."</td>
				<td>".$row['id_nicho']."</td>
				<td>".$row['nro_nicho']."</td>
				<td> ";
			if($xtipo){
				echo " <a href=documento_generar_pdf.php?xid_pendiente=$xid_pendiente>Generar Convenio</a><p>
				<a href=ficha_autorizacion_word.php?xid_pendiente=$xid_pendiente>Generar Autorización</a>
                </td>
			</tr>";
			}
			else{
				echo " <a href=ficha_autorizacion_word.php?xid_pendiente=$xid_pendiente>Generar Ficha de Autorización</a>
                </td>
			</tr>";
			}
		}
		$i++;
	}
	echo "</tbody>";
}
?>
	
	</table>