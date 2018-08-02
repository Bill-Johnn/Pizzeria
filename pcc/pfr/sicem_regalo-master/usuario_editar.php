<?php require_once("header_admin.php") ?>

<?php
  
  $xid_usu  = leerParam("xid_usu","");
  $xc    = conectar(); 
  $sql   = "SELECT * FROM usuario WHERE id_usuario='$xid_usu'"; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  	 $xid_usu = $fila[0];
     $xcla_usu= $fila[3];
	 $xdni_usu=$fila[2];
	 $xnom_usu = $fila[1];
     $xtipo_usu=$fila[4];

  desconectar( $xc );
?>

<h3>Editar Usuario</h3>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=usuario_grabar.php id="BetaSignup" width="600px">
  <input type=hidden name=tipo value="UPDATE">
  <table>
    
    <tr> <th>Codigo: </th>
         <td><input type=text name=xid_usu size=10  value="<?php echo $xid_usu;  ?>" readonly=yes></td> </tr>
    <tr> <th>Clave: </th>
         <td><input type=text name=xcla_usu size=10 value="<?php echo $xcla_usu; ?>"></td> </tr>
    <tr> <th>Nombre: </th>
         <td><input type=text name=xnom_usu size=40 value="<?php echo $xnom_usu; ?>"></td> </tr>
     <tr> <th> Dni.: </th> <td> <input type=text name=xdni_usu size=15 value="<?php echo $xdni_usu; ?>">
        </td> </tr>
       <tr><th>Tipo de Usuario: </th>
       <td><input type=text name=xtipo_usu size=40 value="<?php echo $xtipo_usu; ?>" readonly=yes></td> </tr>
 
   
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php require_once("footer.php") ?>