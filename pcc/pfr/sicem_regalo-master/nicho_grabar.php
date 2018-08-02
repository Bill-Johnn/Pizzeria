<?php require_once("header_admin.php") ?>

<h3>Registro de cursos</h3>
<hr>

<?php
  
   

/*SOLICITANTE*/

		$xid_sol= leerParam("xid_sol","");
		$xdni_sol= leerParam("xdni_sol","");
		$xnom_sol= leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");
		$xid_pab=leerParam("xid_pab","");

/*NICHO*/
		$xid_nicho = leerParam("xid_nicho","");
		
		$xid_dif=leerParam("xid_dif","");
		$xnom_dif=leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		
		$xcost_nicho=leerParam("xcost_nicho","");
		// no llega la fila
     
    $xtipo=leerParam("tipo","");
	


  $xc = conectar();

  if ( $xtipo == "UPDATE_1" ) 
  {
	  $sql = "UPDATE nicho SET cost_nicho='$xcost_nicho'  WHERE id_nicho='$xid_nicho'";
   mysqli_query($xc, $sql );
  //	echo " $xtipo+ $xcodusu + ";
   //die();
   }
   
   if ( $xtipo == "UPDATE_2" ) 
  {
	  $sql = "UPDATE pen_conv SET dni_sol='$xdni_sol', nom_sol='$xnom_sol',dir_sol='$xdir_sol',cel_sol='$xcel_sol', nom_dif='$xnom_dif', priape_dif='$xpriape_dif', seguape_dif='$xseguape_dif',fentierro='$xfentierro'  WHERE id_nicho='$xid_nicho' ";
   mysqli_query($xc, $sql );
   
   		$sql = "UPDATE solicitante SET dni_sol='$xdni_sol', nom_sol='$xnom_sol',dir_sol='$xdir_sol',tel_sol='$xcel_sol' WHERE id_sol='$xid_sol'";
   mysqli_query($xc, $sql );
   
   $sql = "UPDATE difunto SET nom_dif='$xnom_dif', priape_dif='$xpriape_dif', segape_dif='$xseguape_dif',fech_sep='$xfentierro',dni_sol='$xdni_sol'  WHERE id_dif='$xid_dif'";
   mysqli_query($xc, $sql );
   
   $sql = "UPDATE nicho SET cost_nicho='$xcost_nicho'  WHERE id_nicho='$xid_nicho'";
   mysqli_query($xc, $sql );
   
   $sql="UPDATE autorizacion set dni_sol='$xdni_sol' WHERE id_sol=$xid_sol";
mysqli_query($xc,$sql);

$sql="UPDATE convenio set dni_sol='$xdni_sol' WHERE id_sol=$xid_sol";
mysqli_query($xc,$sql);

  //	echo " $xtipo+ $xcodusu + ";
   //die();
   }
   
   

  /*else
   <
 {    
$sql = "INSERT INTO `usuario`  VALUES ('$xid_usu', '$xnom_usu', '$xdni_usu', '$xcla_usu', '$xtipo_usu')";

  mysqli_query($xc, $sql );    
 }*/
 
  desconectar( $xc );
header ("location:nicho_muestra.php?pabellon=$xid_pab");
 
?>

<?php require_once("footer.php") ?>
