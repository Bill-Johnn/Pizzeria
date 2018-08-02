<?php require_once("header_admin.php") ?>



<?php
  
  $xid_pab = leerParam("xid_pab","");
  $xnro_nicho = leerParam("xnro_nicho","");
  $xc = conectar(); 
  
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho ,nro_fil FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$xnro_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xnro_nicho=$fila[3];
	  $xnro_fila=$fila[4];
	  
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
    <tr> <th> Costo de Nicho: </th> 
    	<td> <input type=text name=xcost_nicho size=25 value="<?php echo $xcost_nicho; ?>" readonly=yes> </td> </tr>
   
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>

<div  style=" position:absolute; top:250px; left:0px;" >

                        <form method=post id="BetaSignup7" action="elimina_datos.php" width="200px"  title="ELIMINAR" >
                        
                            <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                            <input type="hidden" name=xid_sol size=15 value="<?php echo $xid_sol;  ?>" readonly >
                            <input type="hidden" name=xid_dif size=15 value="<?php echo $xid_dif;  ?>" readonly >
                        
                        <input type=submit  name=xenvio  value="ELIMINAR DATOS!"  >
                        
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
<?php require_once("footer.php") ?>