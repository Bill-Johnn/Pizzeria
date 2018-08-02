<?php require_once("header_admin.php") ?>

<h3>Registro de cursos</h3>
<hr>

<?php
  $xid_usu = leerParam("xid_usu","");
   $xcla_usu = leerParam("xcla_usu","");
   $xdni_usu = leerParam("xdni_usu","");
   $xnom_usu = leerParam("xnom_usu","");
   $xtipo_usu  = leerParam("xtipo_usu","");  
    $xtipo=leerParam("tipo","");
	


  $xc = conectar();

  if ( $xtipo == "UPDATE" ) 
  {
	  $sql = "UPDATE usuario SET cla_usu='$xcla_usu' , nom_usu='$xnom_usu',dni_usu='$xdni_usu'  WHERE id_usuario='$xid_usu'";
   mysqli_query($xc, $sql );
  //	echo " $xtipo+ $xcodusu + ";
   //die();
   }
   
   

  else
   
     
$sql = "INSERT INTO `usuario`  VALUES ('$xid_usu', '$xnom_usu', '$xdni_usu', '$xcla_usu', '$xtipo_usu')";

  mysqli_query($xc, $sql );    

  desconectar( $xc );

  header("Location:usuario.php");
 
?>

<?php require_once("footer.php") ?>
