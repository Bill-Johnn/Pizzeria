
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
 $sql = "SELECT * FROM pend_tras WHERE estado='POR PAGAR'";
  $res = mysqli_query($xc, $sql );
    
  
     

  echo " 
  <div align='center'>
         <table id='newspaper-b' align=center>
		 <thead>
          <tr>
			  <th scope='col'>Código:</th>
			  <th scope='col'>Nombre_de_Difunto:</th>
			  <th scope='col'>DNI_de_Solicitante:</th>
  			 <th scope='col'>Costo:</th>
			  <th scope='col'>Accion:</th>
			  
          </tr>
		  </thead>
       ";
	  while ( $fila = mysqli_fetch_array($res) ) 
	  {
	
 	 $xid_dif = $fila[1];
	 $xid_nicho_fin=$fila[3];
	$xid_pend_tras= $fila[0];	
	$sql1 = "SELECT cost_nicho FROM nicho WHERE id_nicho='$xid_nicho_fin'";
		  $res1 = mysqli_query($xc, $sql1 );
		  $fila1 = mysqli_fetch_array($res1);		   
		   $xcost_nicho=$fila1[0];
	
 
		$sql1 = "SELECT * FROM difunto WHERE id_dif='$xid_dif'";
		  $res1 = mysqli_query($xc, $sql1 );
		  $fila1 = mysqli_fetch_array($res1);		   
		   $xnom_dif = $fila1['nom_dif']." ".$fila1['priape_dif']." ".$fila1['segape_dif']; 
		  $xdni_sol= $fila1['dni_sol'];
		
		
 
    echo "
		  <tbody>
		  <tr> 
		  <td>$xid_pend_tras</td>
		  <td>$xnom_dif</td>
		  <td>$xdni_sol</td>
		  <td>$xcost_nicho</td>"
		 			  
		?>
		     
			  <td> 
			  
                      <form method=post action="aviso_pagos_traslados.php">
						<input type="hidden" name=xid_pend_tras value="<?php echo $xid_pend_tras;  ?>">
                        
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