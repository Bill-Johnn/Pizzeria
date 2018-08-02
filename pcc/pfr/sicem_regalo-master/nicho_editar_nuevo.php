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
  <input type=hidden name=tipo value="UPDATE_1">
     <input type=hidden name=xid_nicho value="<?php echo $xid_nicho;  ?>">
     <input type=hidden name=xid_pab value="<?php echo $xid_pab;  ?>">

  <table>
    
    <tr> <th>Costo de Nicho: </th>
         <td><input type=text name=xcost_nicho size=10  value="<?php echo $xcost_nicho;  ?>"></td> </tr>
    </tr>
   
 
   
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php require_once("footer.php") ?>