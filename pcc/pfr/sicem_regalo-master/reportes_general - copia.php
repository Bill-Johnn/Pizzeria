<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php  

require("funciones.php");

$xc=conectar();
$xcod  = $_SESSION['codigo'];
  
  
  $xc    = conectar(); 
 
	  $texto="REPORTE GENERAL : ";


/********************************************  
Write the query, call it, and find the number of fields  
/********************************************/  
$sql   = "SELECT * FROM pen_conv "; 
  $fila  = mysqli_query($xc, $sql );
 //$fila  = mysql_num_fields($res);
  
    
$i=0;    

/********************************************  
Extract field names and write them to the $header  
variable  
/********************************************/ 
ob_start();

  
echo "&nbsp;&nbsp;<center><table border=\"1\" align=\"center\">";  

echo "<font size='4' face='Times New Roman, Times, serif' color='#084B8A'><center>$texto</center><font size='5' color=\"#ffffff\">";

echo "<tr bgcolor=\"#ffffff\"  align=\"center\"  height='40'>  
  
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>CEMENTERIO</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>PABELLON</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NRO. NICHO</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>FILA</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NOMBRE DE DIFUNTO</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>PRIMER APELLIDO</strong></font></td> 
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>SEGUNDO APELLIDO</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>FECHA DE ENTIERRO</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>FECHA DE AUTORIZACIÓN</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>DNI. SOLICITANTE</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NOMBRE DE SOLICITANTE</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>COSTO DE NICHO</strong></font></td> 
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>OBSERVACIONES</strong></font></td>  
  
</tr>";  
while($row=mysqli_fetch_array($fila))  
{   
	$xid_pend_conv=$row[0];
	$xnom_dif==$row[1];
	$xpriape_dif=$row[2];
	$xseguape_dif=$row[3];
	$xfentierro=$row[4];
	$xfautorizacion=$row[5]; 
	$xdni_sol=$row[6];
	$xnom_sol=$row[7];
	$xdir_sol=$row[8];
	$xid_nicho=$row[9];
	$xid_pabellon=$row[10];
	$xcel_sol=$row[11];
	$xnro_nicho=$row[12];
	$xcost_nicho=$row[13];
	$xnro_cuotas=$row[14];
	$xmonto_cuota=$row[15];
	$xest_pendiente=$row[16];
	$xcuota_ini=$row[17];
	$xnom_alcalde=$row[18];
	$xdir_alcalde=$row[19];
	$xdni_alcalde=$row[20];
	$xobservaciones=$row[21];
	$xid_sol=$row[22];

	$sql1   = "SELECT titulo FROM documento where coddoc='$xcoddoc' "; 
  $fila1  = mysqli_query($xc, $sql1 );
  $res=mysqli_fetch_array($fila1);
  
  $sql4   = "SELECT nomuni FROM unidad where coduni='$xcodrec' "; 
		  $fila4 = mysqli_query($xc,$sql4 );
		  $res4=mysqli_fetch_array($fila4);
		  $nomrec=$res4[0];
		  
	$sql5   = "SELECT nomusu FROM usuario where coduni='$xcodrec' "; 
		  $fila5 = mysqli_query($xc,$sql5 );
		  $res5=mysqli_fetch_array($fila5);
		  $nomusurec=$res5[0];
		  
		  $opci1=" ( ";	
		  $opci2=" ) "; 
		  $opci3=" ( ";	
		  $opci4=" ) ";  
  
  if($row[1]==28)
  {
		   $sql2   = "SELECT * FROM registro where coddoc='$xcoddoc' "; 
		  $fila2  = mysqli_query($xc,$sql2 );
		  $res2=mysqli_fetch_array($fila2);
		  $dniper=$res2[2];
		  
		  $sql3   = "SELECT * FROM persona where dniper='$dniper' "; 
		  $fila3 = mysqli_query($xc,$sql3 );
		  $res3=mysqli_fetch_array($fila3);
		  $nombre=$res3[1];
		  $razsoc=$res3[4];
		  	  
			  $opci1="";	
		  $opci2="";
		  
		  
			if ($razsoc!="") 
				 {
				 $nombre=$razsoc;
				 }
						  
	  }
	  
	  
	  else
	  {
	
	 	$sql3   = "SELECT nomuni FROM unidad where coduni='$xcodemi' "; 
		  $fila3 = mysqli_query($xc,$sql3 );
		  $res3=mysqli_fetch_array($fila3);
		  $nombre=$res3[0];
		  
		  $sql6  = "SELECT nomusu FROM usuario where coduni='$xcodemi' "; 
		  $fila6 = mysqli_query($xc,$sql6 );
		  $res6=mysqli_fetch_array($fila6);
		  $nomusuemi=$res6[0];
		  
		 
		  
	
	}
  
 

    echo "<tr>";    
              echo "<td  align='center'><strong>".$row[3]."</strong></td>";
			  echo "<td  align='center'><strong>".$row[0]."</strong></td>";
			  echo "<td  align='center'><strong>".$res[0]."</strong></td>";
			  echo "<td  align='center'><strong>".$row[4]."</strong></td>";
			  echo "<td  align='center'><strong>".$nombre.$opci1.$nomusuemi.$opci2."</strong></td>";
			  echo "<td  align='center'><strong>".$nomrec.$opci3.$nomusurec.$opci4."</strong></td>";    
        
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