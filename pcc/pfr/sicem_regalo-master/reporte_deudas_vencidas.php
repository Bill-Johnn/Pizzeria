<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php  

require("funciones.php");

$xc=conectar();

$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
		
	$aux_conv=0;
	$sql="SELECT * FROM deudas WHERE estado='POR PAGAR' AND (fecha_pago<'$fecha_hoy') AND (id_conv>'$aux_conv')  order by cuotas asc";
	$res1=mysqli_query($xc,$sql);

ob_start();

  
echo "&nbsp;&nbsp;<center><table border=\"1\" align=\"center\">";  

echo "<font size='4' face='Times New Roman, Times, serif' color='#084B8A'><center>texto area</center><font size='5' color=\"#ffffff\">";

echo "<tr bgcolor=\"#ffffff\"  align=\"center\"  height='40'>  
  
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>Nombre de Solicitante</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>Nombre de Difunto</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>Cuota Nro</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>Fecha de Pago</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>Cuota Mensual</strong></font></td>  

  
</tr>";  
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
			
			 echo "<tr>";    
              echo "<td  align='center'><strong>".$xnom_sol."</strong></td>";
			  echo "<td  align='center'><strong>".$xnom_dif."</strong></td>";
			  echo "<td  align='center'><strong>".$fila1['cuotas']."</strong></td>";
			  echo "<td  align='center'><strong>".$fila1['fecha_pago']."</strong></td>";
			  echo "<td  align='center'><strong>".$fila1['monto_cuota']."</strong></td>";
			    
        
     echo "</tr>";  
				
			}
   
	 
	     
   
echo "</table>";  

//$reporte = ob_get_clean(); 

/********************************************  
Write the query, call it, and find the number of fields  
/********************************************/  


$reporte = ob_get_clean(); 







/********************************************  
Set the automatic downloadn section  
/********************************************/ 

header("Content-type: application/vnd.ms-excel");  
header("Content-Disposition: attachment; filename=Reporte Documentos.xls");  
header("Pragma: no-cache");  
header("Expires: 0");   

echo $reporte;  


?>