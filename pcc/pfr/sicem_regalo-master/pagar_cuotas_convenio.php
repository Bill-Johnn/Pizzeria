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
 
 $sql="SELECT * FROM convenio WHERE id_conv='$xid_conv'";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xdni_sol=$fila[1];
		$xcost_nicho=$fila[3];
		$xfautorizacion=$fila[4];
		$xnro_cuotas=$fila[5];
		$xcuota_ini=$fila[6];
		$xmonto_cuota=$fila[7];
		
		$sql1="SELECT * FROM deudas WHERE id_conv='$xid_conv'";
		 $res1=mysqli_query($xc,$sql1 );
	
	?>
    <div id="body">
		<div class="cem">
			<h8>Escoja la cuota que desea cancelar</h8>
		          
<div align='center'>

            <table id='newspaper-b' align=center> 
            <thead>
                <tr>
                    
                    <th scope='col'>Cuota</th>
                    <th scope='col'>Fecha de Pago</th>
                    <th scope='col'>Monto de Pago</th>
                    <th scope='col'>Estado de Pago</th>
                    <th scope='col'>Accion</th>
                   
                </tr>
                </thead>
           
            
            	<tr>
                    
                    <th>Cuota Inicial</th>
                    <td><?php echo "$xfautorizacion"; ?></td>
                    <td><?php echo "$xcuota_ini"; ?></td>
                    <td>CANCELADO</td>
                    <th><?php echo "$xcost_nicho"; ?></th>
                   
                </tr>
	<?php
	
		
		echo "<tbody>";
	
	
	
	while ($fila1=mysqli_fetch_array($res1)){
			
			if (((dateDiff($fecha_hoy,$fila1['fecha_pago'] ))<0) && !($fila1['estado']=='PAGADO'))
			  
			{
				echo "
			<tr bgcolor=#FF4A4F>
				<th>".$fila1['cuotas']." Cuota</th>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
				<td> 
				<a href=cancelar_cuota.php?xid_conv=$xid_conv&xcuota=$fila1[cuotas]>Pagar</a>
                </td>
			</tr>";
			}
			else
			{
				echo "
			<tr>
				<th>".$fila1['cuotas']." Cuota</th>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
				<td> 
				<a href=cancelar_cuota.php?xid_conv=$xid_conv&xcuota=$fila1[cuotas]>Pagar</a>
                </td>
			</tr>";
			}
		
		
		
	}
	echo "</tbody>";



  desconectar( $xc );
 
?>
