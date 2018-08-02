	<?php require_once("header.php") ?>
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>
<?php
$xc    = conectar(); 
 
 $xid_conv=leerParam("xid_conv","");
 
// echo "$xid_pendiente + + +s";
// die();

$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
 
	?>
    <div id="body">
		<div class="cem">
			<h8>Escoja la cuota que desea cancelar</h8>
		          
<div align='center'>

            <table id='newspaper-b' align=center> 
            <thead>
                <tr>
                    <th scope='col'>Nombre_de_solicitante</th>
                    <th scope='col'>Nombre_de_difunto.</th>
                    <th scope='col'>Cuota_Nro.</th>
                    <th width=120 scope='col'>Fecha_de_Pago</th>
                    <th scope='col'>Cuota_Mensual</th>
                    <th scope='col'>Estado_de_Pago</th>
                    <th scope='col'>Detalles</th>
                   
                </tr>
                </thead>
           
	<?php
	
		
		echo "<tbody>";
		$aux_conv=0;
		
	$sql="SELECT * FROM deudas WHERE estado='POR PAGAR' AND (fecha_pago<'$fecha_hoy') AND (cuotas>0)  order by id_conv, cuotas asc";
	$res1=mysqli_query($xc,$sql);
	
	
	
	
	while ($fila1=mysqli_fetch_array($res1)){

			$sql7="SELECT * FROM convenio WHERE id_conv='$fila1[id_conv]'";
			$res7=mysqli_query($xc,$sql7 );
			$fila7=mysqli_fetch_array($res7);
			
			$xid_dif=$fila7['id_dif'];
			$xid_sol=$fila7['id_sol'];
			
			
			$sql123="SELECT * FROM difunto WHERE id_dif=$xid_dif";
			$res123=mysqli_query($xc,$sql123);
			$fila123=mysqli_fetch_array($res123);
			$xnom_dif=$fila123['nom_dif']." ".$fila123['priape_dif']." ".$fila123['segape_dif'];
			
			$sql321="SELECT * FROM solicitante WHERE id_sol=$xid_sol";
			$res321=mysqli_query($xc,$sql321);
			$fila321=mysqli_fetch_array($res321);
			$xnom_sol=$fila321['nom_sol'];
			
			
			if($fila1['id_conv']>$aux_conv)
			
				echo "
			<tr>
				<td>".$xnom_sol." </td>
				<td>".$xnom_dif."</td>
				<td>".$fila1['cuotas']." </td>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
				<td> <a href=pagar_cuotas_ver.php?xid_conv=$fila1[id_conv]>Ver_Detalles</a>
                </td>
				
			</tr>";
			
			$aux_conv=$fila1['id_conv'];
			
			
			}
	echo "</tbody>";



  desconectar( $xc );
 
?>
