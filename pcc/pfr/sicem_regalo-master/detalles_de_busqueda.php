<?php require_once("header.php") ?>



<?php
  
  $xid_nicho = leerParam("xid_nicho","");
  $xconv = leerParam("xconv","");
  $xc = conectar(); 
  
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho ,nro_fil , nro_col , id_pab FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xnro_nicho=$fila[3];
	  $xnro_fila=$fila[4];
	  $xnro_col=$fila[5];
	  $xid_pab=$fila[6];
	  
	   $sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab=$fila1[0];
	  $xid_cem=$fila1[1];
	  
	  
	   
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem=$fila2[0];
	  
	  
	  
	  $sql5 = "SELECT id_dif,nom_dif,fech_sep,dni_sol,priape_dif,segape_dif,id_sol FROM difunto WHERE id_nicho='$xid_nicho'";
	 // echo "$sql5";
	//  die();
	  $res5 = mysqli_query($xc,$sql5 );
	  $fila5= mysqli_fetch_array($res5);
	  $xid_dif=$fila5[0];
	  $xnom_dif=$fila5[1];
	  $xfentierro=$fila5[2];
	  $xdni_sol=$fila5[3];
	  $xpriape_dif=$fila5[4];
	  $xseguape_dif=$fila5[5];
	  $xid_sol=$fila5[6];
	  

			  
	  $sql6="SELECT nom_sol, tel_sol, dir_sol FROM solicitante WHERE dni_sol='$xdni_sol' AND id_sol='$xid_sol'";
	//  echo "$xdni_sol";
	  //die();
	  $res6=mysqli_query($xc,$sql6 );
	  $fila6= mysqli_fetch_array($res6);
	  $xnom_sol=$fila6[0];	  
	  $xcel_sol=$fila6[1];
	  $xdir_sol=$fila6[2];
	 
	 $sql1 = "SELECT id_conv FROM convenio WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol'";
	  $res1 = mysqli_query($xc,$sql1 );    
	  $fila1 = mysqli_fetch_array($res1);
	  $xid_convenio = $fila1['id_conv'];
    
  desconectar( $xc );
?>
<div id="body">
		<div class="cem">
<h8>Editar Costo</h8>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=nicho_grabar.php id="BetaSignup" width="600px">
  <input type=hidden name=tipo value="UPDATE_2">
     <input type=hidden name=xid_nicho value="<?php echo $xid_nicho;  ?>">
     <input type=hidden name=xid_sol value="<?php echo $xid_sol;  ?>">
	<input type=hidden name=xid_pab value="<?php echo $xid_pab;  ?>">
  <table border=0 cellpadding=5 cellspacing=5>
  <tr><td><p style="font-style:italic; font-size:24px"> DIFUNTO </p></td></tr>
	<tr> <th> Codigo del Difunto: </th> 
    	<td> <input type=text name=xid_dif size=25 value="<?php echo $xid_dif; ?>" readonly=yes> </td> </tr>
	<tr> <th> Nombre del Difunto: </th> 
    	<td> <input type=text name=xnom_dif size=25 value="<?php echo "$xnom_dif "; ?>" > </td></th></tr>
    <tr> <th> Primer Apellido del Difunto: </th> 
    	<td> <input type=text name=xpriape_dif size=25 value="<?php echo "$xpriape_dif "; ?>" > </td></th></tr>
     <tr> <th> Segundo Apellido del Difunto: </th> 
    	<td> <input type=text name=xseguape_dif size=25 value="<?php echo "$xseguape_dif"; ?>" > </td></th></tr>
	<tr> <th> Fecha de Sepultura: </th> 
    	<td> <input type=text name=xfentierro size=25 value="<?php echo $xfentierro; ?>"> </td></th> </tr>  
	<tr><td><p style="font-style:italic; font-size:24px"> SOLICITANTE</p></td></tr>
    <tr> <th> Dni del Apoderado: </th> 
    	<td> <input type=text name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>"> </td> </tr>
	<tr> <th> Nombre del Apoderado: </th> 
    	<td> <input type=text name=xnom_sol size=25 value="<?php echo $xnom_sol; ?>"> </td></th>
	<tr> <th> Telefono: </th> 
    	<td> <input type=text name=xcel_sol size=25 value="<?php echo $xcel_sol; ?>"> </td></th>
	<tr> <th> Direccion: </th> 
    	<td> <input type=text name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>"> </td></th>
    <tr><td><p style="font-style:italic; font-size:24px"> NICHO</p></td></tr>
    <tr> <th> Cementerio: </th> 
    	<td> <input type=text name=xnom_cem size=60 value="<?php echo $xnom_cem; ?>"> </td> </tr>
	<tr> <th> Pabellón: </th> 
    	<td> <input type=text name=xnom_pab size=25 value="<?php echo $xnom_pab; ?>"> </td></th>
	<tr> <th> Nro de Nicho: </th> 
    	<td> <input type=text name=xnro_nicho size=25 value="<?php echo $xnro_nicho; ?>"> </td></th>
    <tr> <th> Nro de Fila: </th> 
    	<td> <input type=text name=xnro_fila size=25 value="<?php echo $xnro_fila; ?>"> </td></th>
	<tr> <th> Nro de Nicho: </th> 
    	<td> <input type=text name=xnro_col size=25 value="<?php echo $xnro_col; ?>"> </td></th>
    <tr> <th> Costo de Nicho: </th> 
    	<td> <input type=text name=xcost_nicho size=25 value="<?php echo $xcost_nicho; ?>" readonly=yes> </td> </tr>
   <?php 
   if($xconv=='Compra')
   {
	  
       echo "<tr><td> <a href=pagar_cuotas_ver_detalles.php?xid_conv=$xid_convenio&xid_nicho=$xid_nicho&xconv=$xconv>Ver Detalles de Convenio</a>
                </td></tr>";
	   
	}
   ?>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>