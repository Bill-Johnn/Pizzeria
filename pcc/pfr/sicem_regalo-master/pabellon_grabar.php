<?php require_once("header_admin.php") ?>

<h3>Registro de cursos</h3>
<hr>

<?php
  $xid_pab = leerParam("xid_pab","");
   $xnom_pab = leerParam("xnom_pab","");
   $xid_cem = leerParam("xid_cem","");
   $xtot_fil = leerParam("xtot_fil","");
   $xtot_col  = leerParam("xtot_col","");
   $xtipo_numer  = leerParam("xtipo_numer",""); 
    
    $xtipo=leerParam("tipo","");
	//echo "++++++++++ $xid_pab ++ $xnom_pab ++ $xid_cem ++ $xtot_fil ++ $xtot_col ++ $xtipo_numer ++";
	//die();


  $xc = conectar();

  if ( $xtipo == "UPDATE" ) 
  {
	  $sql = "UPDATE pabellon SET nom_pab='$xnom_pab' , tot_fil='$xtot_fil',tot_col='$xtot_col', tipo_numer='$xtipo_numer'  WHERE id_pab='$xid_pab'";
   mysqli_query($xc, $sql );
  //	echo " $xtipo+ $xcodusu + ";
   //die();
   }
   
   

  else
   
     
$sql = "INSERT INTO `pabellon` (nom_pab,id_cem,tot_fil,tot_col,tipo_numer) VALUES ('$xnom_pab', '$xid_cem', '$xtot_fil', '$xtot_col', '$xtipo_numer')";

  mysqli_query($xc, $sql );    

  desconectar( $xc );

  header("Location:pabellon_seleccion.php");
 
?>

<?php require_once("footer.php") ?>
