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
  $xid_nicho=leerParam("xid_nicho","");

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
		$xid_sol=$fila[8];
		
		$sql1="SELECT * FROM deudas WHERE id_conv='$xid_conv'";
		 $res1=mysqli_query($xc,$sql1 );
		 
 $sql11="SELECT nom_sol FROM solicitante WHERE id_sol='$xid_sol'";
 $res11=mysqli_query($xc,$sql11);
 $fila11=mysqli_fetch_array($res11);
		$xnom_sol=$fila11[0];
		
	
	?>
    <div id="body">
		<div class="cem">
			<h8>Estado de cuotas</h8>
		          
<div id="muestra" align='center'>

            <table id='newspaper-b' align=center> 
            <thead>
                <tr  align='center'>
                    <th scope='col'>SOLICITANTE: </th>
                    <th scope='col'><?php echo "$xnom_sol"; ?></th>
                    <th scope='col'></th>
                    <th scope='col'></th>
                   
                    
                </tr>
                <tr  align='center'>
                    
                    <th scope='col'>Cuota</th>
                    <th scope='col'>Fecha_de_Pago</th>
                    <th scope='col'>Monto_de_Pago</th>
                    <th scope='col'>Estado_de_Pago</th>
                   
                </tr>
                </thead>
           
            
            	<tr  align='center'>
                    
                    <th>Cuota Inicial</th>
                    <td><?php echo "$xfautorizacion"; ?></td>
                    <td><?php echo "$xcuota_ini"; ?></td>
                    <td>CANCELADO</td>
                 
                   
                </tr>
	<?php
	
		
		echo "<tbody>";
	
	
	
	while ($fila1=mysqli_fetch_array($res1)){
			
			if (((dateDiff($fecha_hoy,$fila1['fecha_pago'] ))<0) && !($fila1['estado']=='PAGADO'))
			  
			{
				echo "
			<tr bgcolor=#FF4A4F align='center'>
				<th>".$fila1['cuotas']." Cuota</th>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
				
                </td>
				
			
			</tr>";
			}
			else
			{
				echo "
			<tr align='center'>
				<th>".$fila1['cuotas']." Cuota</th>
				<td>".$fila1['fecha_pago']."</td>				
				<td>".$fila1['monto_cuota']."</td>
				<td>".$fila1['estado']."</td>
			
				
			</tr>";
			}
		
		
		
	}
	
	?>
    </table>
    </div>
    
    <div style="position:absolute; top:400px; left:1000px">  
    
    <input type="image"  src="img/imprimir.jpg" value="Imprimir Tabla" onclick="javascript:imprSelec('muestra');function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();};" />
   </div>
   
    <div style="position:absolute; top:310px; left:10px">
<form method="post" action="dvencidas.php">
 <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                <input type="image"  src="img/regresar.jpg"/>
</form>


</div>
<div style="position:absolute; top:300px; left:1000px">
<form method="post" action="notificar.php"  >
 <input type="hidden" name=xid_conv size=15 value="<?php echo $xid_conv ?>" readonly >
 <input type="hidden" name=xnro_cuota size=15 value="<?php echo $fila1['cuotas'];  ?>" readonly >
    <input type="image"  src="img/notificar.jpg"/>
                
</form>
</div>

	<?php

	echo "</tbody>";



  desconectar( $xc );
 
?>
