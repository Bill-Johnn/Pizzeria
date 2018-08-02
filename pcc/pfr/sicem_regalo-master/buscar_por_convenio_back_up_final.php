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
		$cadbusca="SELECT * FROM convenio WHERE dni_sol LIKE '%$busqueda%' ;";
		
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
			
			<th scope="col">DNI. del solicitante</th>
            <th scope="col">Nombre y Apellidos del difunto</th>
			<th scope="col">Costo de Nicho</th>
			<th scope="col">Nro. Cuotas</th>
            <th scope="col">Cuota Inicial</th>
            <th scope="col">Monto por cuotas</th>
            <th scope="col">Accion</th>
			
			
		</tr>
	</thead>
<?php
	$result=mysqli_query($cadbusca);
	$i=0;
	echo "<tbody>";
	while ($row = mysqli_fetch_array($result)){
		$xid_conv=$row['id_conv'];
		$xid_dif=$row['id_dif'];
			  $sql1   = "SELECT * FROM difunto WHERE id_dif=$xid_dif"; 
			  $res1   = mysqli_query($xc, $sql1 );
			  $fila1  = mysqli_fetch_array($res1);
		if($i%2 ==0)
		{	
			
			  
			echo "
			<tr>
				<th scope='row' id='r100'>".$row['dni_sol']."</th>
				<td>".$fila1['nom_dif'].$fila1['priape_dif'].$fila1['segape_dif']."</td>
				<td>".$row['cost_nicho']."</td>
				<td>".$row['nro_cuotas']."</td>
				<td>".$row['cuota_ini']."</td>
				<td>".$row['monto_cuota']."</td>
				<td> 
				<a href=pagar_cuotas.php?xid_conv=$xid_conv>Pagar Cuotas</a>
                </td>
			</tr>";
		}
		else
		{
			echo "
			<tr class=odd>
				<th scope='row' id='r99'>".$row['dni_sol']."</th>
				<td>".$fila1['nom_dif'].$fila1['priape_dif'].$fila1['segape_dif']."</td>
				<td>".$row['cost_nicho']."</td>
				<td>".$row['nro_cuotas']."</td>
				<td>".$row['cuota_ini']."</td>
				<td>".$row['monto_cuota']."</td>
				<td> <a href=pagar_cuotas.php?xid_conv=$xid_conv>Pagar Cuotas</a>
                </td>
			</tr>";
		}
		$i++;
	}
	echo "</tbody>";
}
?>
	
	</table>