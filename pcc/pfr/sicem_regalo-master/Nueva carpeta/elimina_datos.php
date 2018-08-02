<?php require_once("header_admin.php") ?>

<?php

$xc    = conectar(); 
	$xid_nicho=leerParam("xid_nicho","");
	$xid_dif=leerParam("xid_dif","");
	$xid_sol=leerParam("xid_sol","");
	

  
  
 
  $sql4="SELECT id_conv FROM convenio WHERE id_sol=$xid_sol AND id_dif=$xid_dif";
  $res4=mysqli_query($xc,$sql4 );

 
 if($fila4 = mysqli_fetch_array($res4)){
 
  	$xid_conv=$fila4[0];
 
  $sql3="DELETE FROM convenio WHERE id_conv=$xid_conv";
  mysqli_query($xc,$sql3 );
   
   $sql5="DELETE FROM deudas WHERE id_conv=$xid_conv";
  mysqli_query($xc,$sql5 );
  }
  
 
 	
 $sql = "UPDATE nicho SET est_nicho='D' WHERE id_nicho=$xid_nicho";
  $res = mysqli_query($xc, $sql );
  
  $sql1="DELETE FROM pen_conv WHERE id_sol=$xid_sol AND id_nicho=$xid_nicho";
  mysqli_query($xc, $sql1 );

  
  $sql2="DELETE FROM autorizacion WHERE id_sol=$xid_sol AND id_dif=$xid_dif";
  mysqli_query($xc,$sql2 );
  
  $sql6="DELETE FROM difunto WHERE id_dif=$xid_dif";
  mysqli_query($xc,$sql6 );
  
  $sql7="SELECT id_ima_nicho FROM nicho WHERE id_nicho=$xid_nicho";
  $res7=mysqli_query($xc,$sql7 );
  $fila7 = mysqli_fetch_array($res7);
  $xid_ima=$fila7[0];
  if($xid_ima!=1)
  {
	  $sql8="DELETE FROM imagen WHERE id_imagen=$xid_ima";
	   mysqli_query($xc,$sql8 );
  }
  
  //$sql9="DELETE FROM solicitante WHERE id_sol=$xid_sol";
  //mysqli_query($xc,$sql9);
  
  header("Location:aviso_eliminacion_datos.php");
  desconectar( $xc );
 

 
?>

<?php require_once("footer.php") ?>