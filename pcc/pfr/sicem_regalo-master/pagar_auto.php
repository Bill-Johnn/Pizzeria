<?php require_once("funciones.php") ?>
<?php
$xc    = conectar(); 
 
 $xid_auto=leerParam("xid_auto","");
 
// echo "$xid_pendiente + + +s";
// die();

	
		$sql7 = "UPDATE autorizacion SET est_auto='PAGADO' WHERE id_auto='$xid_auto'";
				mysqli_query($xc,$sql7 );
				
		header("Location:pend_autori.php");		
		

  desconectar( $xc );
 
?>
