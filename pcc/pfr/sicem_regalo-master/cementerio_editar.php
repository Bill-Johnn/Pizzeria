<?php require_once("header_admin.php") ?>

<?php
  
  $xid_cem = leerParam("xid_cem","");
  $xc    = conectar(); 
  $sql   = "SELECT * FROM cementerio WHERE id_cem='$xid_cem'"; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  	 $xid_cem = $fila[0];
	 $xnom_cem = $fila[1];

  desconectar( $xc );
?>

<h3>Editar Usuario</h3>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=cementerio_grabar.php id="BetaSignup" width="600px">
  <input type=hidden name=tipo value="UPDATE">
  <table>
    
    <tr> <th>Id de Cementerio: </th>
         <td><input type=text name=xid_cem size=10  value="<?php echo $xid_cem;  ?>" readonly=yes></td> </tr>
    
    <tr> <th>Nombre de Cementerio: </th>
         <td><input type=text name=xnom_cem size=40 value="<?php echo $xnom_cem; ?>"></td> </tr>
    
   
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php require_once("footer.php") ?>