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
			<th scope="col">Nombre_de_Solicitante</th>
            <th scope="col">Cementerio</th>
            <th scope="col">Pabellon</th>
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
		$xid_pab=$row['id_pabellon'];
		$xid_nicho=$row['id_nicho'];
		$xconv=$row['descripcion'];
		
		$sql11   = "SELECT nom_pab, id_cem FROM pabellon WHERE id_pab=$xid_pab"; 
	  $res11   = mysqli_query($xc,$sql11);
	  $fila11  = mysqli_fetch_array($res11);
	  $xnom_pab = $fila11[0];
	  $xid_cem =$fila11[1];
	  
	  $sql11   = "SELECT nom_cem FROM cementerio WHERE id_cem=$xid_cem"; 
	  $res11   = mysqli_query($xc,$sql11);
	  $fila11  = mysqli_fetch_array($res11);
	  $xnom_cem = $fila11[0];
	  
		
		if($i%2 ==0)
		{
			echo "
			<tr>
				<th scope='row' id='r100'>".$row['nom_dif'].' '.$row['priape_dif'].' '.$row['seguape_dif']."</th>
				<td>".$row['dni_sol']."</td>
				<td>".limitarPalabras($row['nom_sol'],4)."</td>
				<td>".$xnom_cem."</td>
				<td>".$xnom_pab."</td>
				<td>".$row['nro_nicho']."</td>
				<td> <a href=detalles_de_busqueda.php?xid_nicho=$xid_nicho&xconv='$xconv'>Ver Detalles</a>
                </td>
			</tr>";
			
			
		}
		else
		{
			echo "
			<tr class=odd>
				<th scope='row' id='r99'>".$row['nom_dif'].' '.$row['priape_dif'].' '.$row['seguape_dif']."</th>
				<td>".$row['dni_sol']."</td>
				<td>".limitarPalabras($row['nom_sol'],4)."</td>
				<td>".$xnom_cem."</td>
				<td>".$xnom_pab."</td>
				<td>".$row['nro_nicho']."</td>
				<td> <a href=detalles_de_busqueda.php?xid_nicho=$xid_nicho&xconv=$xconv>Ver Detalles</a>
                </td>
			</tr>";
			
		}
		$i++;
	}
	echo "</tbody>";
}
?>
	
	</table>