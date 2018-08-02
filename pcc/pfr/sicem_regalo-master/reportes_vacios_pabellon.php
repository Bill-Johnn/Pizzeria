<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php  

require("funciones.php");

$xc=conectar();
$xid_pab=leerParam("xid_pab","");

		

  $xc    = conectar(); 
 


/********************************************  
Write the query, call it, and find the number of fields  
/********************************************/  
$sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab=$fila1[0];
	  $xid_cem=$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem=$fila2[0];
	  
	  $sql5   = "SELECT * FROM nicho where id_pab='$xid_pab' AND est_nicho='D' "; 
		  $res5 = mysqli_query($xc,$sql5 );
 //$fila  = mysql_num_fields($res);

/********************************************  
Extract field names and write them to the $header  
variable  
/********************************************/ 
ob_start();

  
echo "&nbsp;&nbsp;<center><table border=\"1\" align=\"center\">";  

echo "<font size='4' face='Times New Roman, Times, serif' color='#084B8A'><center>$texto $area</center><font size='5' color=\"#ffffff\">";

echo "<tr bgcolor=\"#ffffff\"  align=\"center\"  height='40'>  
  
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>CEMENTERIO</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>PABELLON</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NRO DE NICHO</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NRO FILA</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NRO COLUMNA</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>COSTO DE NICHO</strong></font></td>  

  
</tr>";  
while($fila5=mysqli_fetch_array($res5))  
{    
	$xnro_nicho=$fila5[2];
	  $xnro_fila=$fila5[3];
	  $xnro_col=$fila5[4];
	  $xcost_nicho=$fila5[6];

    echo "<tr>";    
              echo "<td  align='center'><strong>".$xnom_cem."</strong></td>";
			  echo "<td  align='center'><strong>".$xnom_pab."</strong></td>";
			  echo "<td  align='center'><strong>".$xnro_nicho."</strong></td>";
			  echo "<td  align='center'><strong>".$xnro_fila."</strong></td>";
			  echo "<td  align='center'><strong>".$xnro_col."</strong></td>";
			  echo "<td  align='center'><strong>".$xcost_nicho."</strong></td>";
			    
        
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