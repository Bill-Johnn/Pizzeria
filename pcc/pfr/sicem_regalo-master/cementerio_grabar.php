<?php require_once("header_admin.php") ?>

<h3>Registro de cursos</h3>
<hr>

<?php
  $xid_cem = leerParam("xid_cem","");
   $xnom_cem = leerParam("xnom_cem","");
   $xtipo=leerParam("tipo","");
  
  $xc = conectar();

  if ( $xtipo == "UPDATE" ) 
  {
	  $sql = "UPDATE cementerio SET nom_cem='$xnom_cem'  WHERE id_cem='$xid_cem'";
   mysqli_query($xc, $sql );
  //	echo " $xtipo+ $xcodusu + ";
   //die();
   }
   
   

  else
   
   {  
$sql = "INSERT INTO `cementerio` (nom_cem)  VALUES ('$xnom_cem')";

  mysqli_query($xc, $sql );    
   }
  desconectar( $xc );

  header("Location:cementerio.php");
 
?>

<?php require_once("footer.php") ?>
