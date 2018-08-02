
<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php require_once("header_caja.php") ?>
<?php
$xc    = conectar(); 
 $sql1 = "SELECT id_auto, dni_sol, tipo_auto, monto_auto, id_sol FROM autorizacion WHERE est_auto='POR PAGAR'";
  $res1 = mysqli_query($xc, $sql1 );
  

  echo " 
  <div id=body>
		<div class=cem>
			<h8>Pagos de Autorizaciones</h8> <div align='center'>
         <table id='newspaper-b' align=center>
		 <thead>
          <tr>
			  <th scope='col'>DNI del solicitante:</th>
			  <th scope='col'>Nombre_de_solicitante:</th>
			  <th scope='col'>Nombre_de_difunto:</th>
			  <th scope='col'>Concepto:</th>
  			  <th scope='col'>Monto a Cancelar:</th>
			   <th scope='col'>Accion:</th>
			  
          </tr>
		  </thead>
       ";
	  while ( $fila = mysqli_fetch_array($res1) ) 
	  {
     	$xid_auto=$fila[0];
		$xdni_sol=$fila[1];
		$xtipo_auto=$fila[2];
		$xmonto_auto=$fila[3];
		$xid_sol=$fila[4];
		
		$sql2 = "select nom_sol, nom_dif, priape_dif, seguape_dif from pen_conv where id_sol ='$xid_sol'";
		$res2 = mysqli_query($xc,$sql2 );
		$fila2 = mysqli_fetch_array($res2);
		$xnom_sol = $fila2[0];
		$xnom_dif = $fila2[1]." ".$fila2[2]." ".$fila2[3];
		  echo "
		  <tbody>
		  <tr> 
		  
		  <td>$xdni_sol</td>
		  <td>$xnom_sol</td>
		  <td>$xnom_dif</td>
		  <td>$xtipo_auto</td>
		  <td>$xmonto_auto</td>";
			  
		?>
		     
			  <td> 
			  
                      <form method=post action="aviso_pagar_auto.php">
						<input type="hidden" name=xid_auto value="<?php echo $xid_auto;  ?>">
						   <input type=submit name=xenvio value='PAGAR'>
						 
					  </form
                ></td>
				
		<?php		
				
                 echo "</tr></tbody>";
			  
		
//<img src='img/edit.ico' />
  } 
  echo "</table></div>
       ";

  desconectar( $xc );
 
?>

<?php require_once("footer.php") ?>