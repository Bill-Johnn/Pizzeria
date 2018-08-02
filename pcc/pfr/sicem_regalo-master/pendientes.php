
<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php require_once("header_caja.php") ?>

 <div id="body">
		<div class="cem">
			<h8>Pagos Pendientes</h8>
			
<?php
$xc    = conectar(); 
 $sql1 = "SELECT id_pend_conv, dni_sol, nom_sol, cost_nicho,cuota_ini, fautorizacion, descripcion FROM pen_conv WHERE est_pendiente='POR PAGAR'";
  $res1 = mysqli_query($xc, $sql1 );
  
  
  
  

  echo " 
  <div align='center'>
         <table id='newspaper-b' align=center>
		 <thead>
          <tr>
			  <th scope='col'>Código:</th>
			  <th scope='col'>DNI_del_solicitante:</th>
			  <th scope='col'>Nombre_del_solicitante:</th>
  			  <th scope='col'>Monto_Total:</th>
			  <th scope='col'>Cuota_A_Cancelar:</th>
			  <th scope='col'>Fecha_de_Trámite:</th>
			  <th scope='col'>Por_Concepto_de:</th>
			  <th scope='col'>Accion:</th>
			  
          </tr>
		  </thead>
       ";
	  while ( $fila = mysqli_fetch_array($res1) ) 
	  {
		$xcod_pendiente=$fila[0];
		$xdni_sol=$fila[1];
		$xnom_sol=$fila[2];
		$xcost_nicho=$fila[3];
		$xcuota_ini=$fila[4];
		$xfautorizacion=$fila[5];
		$xdescripcion=$fila[6];
		
		
$sql96 = "SELECT nom_dif, priape_dif, seguape_dif FROM pen_conv WHERE id_pend_conv='$xcod_pendiente'";
  $res96 = mysqli_query($xc, $sql96 );
  $fila96=mysqli_fetch_array($res96);
  
		$xnom_dif=$fila96[0];
		$xpriapre_dif=$fila96[1];
		$xseguape_dif=$fila96[2];
		
	   $sql32 = "SELECT j.est_nicho FROM nicho j, difunto d WHERE d.nom_dif='$xnom_dif' AND d.priape_dif='$xpriapre_dif' AND d.segape_dif='$xseguape_dif' AND j.id_nicho=d.id_nicho";
	   
	  
  $res32 = mysqli_query($xc,$sql32 );
  $fila32=mysqli_fetch_array($res32);
  $xest_nicho=$fila32[0];
  
    echo "
		  <tbody>
		  <tr> 
		  <td>$xcod_pendiente</td>
		  <td>$xdni_sol</td>
		  <td>$xnom_sol</td>
		  <td>$xcost_nicho</td>
		  <td>$xcuota_ini</td>
		  <td>$xfautorizacion</td>
		  <td>$xdescripcion</td>";
			  
		?>
		     
			  <td> 
			  
                        <form method=post action="aviso_pendientes.php">
						<input type="hidden" name=xid_pendiente value="<?php echo $xcod_pendiente;  ?>">
                       
                        <input type=submit name=xenvio value='PAGAR'>
                          					   
						 
					  </form></td>
				
		<?php		
				
                 echo "</tr></tbody>";
			  
		
//<img src='img/edit.ico' />
  } 
  echo "</table></div>
       ";

  desconectar( $xc );
 
?>

<?php require_once("footer.php") ?>