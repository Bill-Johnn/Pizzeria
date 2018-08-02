<?php require_once("header_admin.php") ?>

<h3>Eliminar usuario</h3>
<hr>

<?php

  $xid_usu  = leerParam("xid_usu","");

  $xc = conectar();
  
  $sql = "DELETE FROM usuario WHERE id_usuario='$xid_usu'";
  mysqli_query($xc, $sql );    

  desconectar( $xc );

  header("Location:usuario.php");
 
?>

<?php require_once("footer.php") ?>