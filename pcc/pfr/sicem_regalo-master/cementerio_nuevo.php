<?php require_once("header_admin.php") ?>

<?php
  $xc  = conectar();

?>

<h3>Nuevo Usuario</h3>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=cementerio_grabar.php id="BetaSignup" width="500px">
  <input type=hidden name=tipo value="INSERT">
  <table>
  		
        <tr> <th> Nombre de Cementerio: </th> <td> <input type=text name=xnom_cem size=35 ></input>
            </td> </tr>
       
    <tr> 
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script><?php require_once("footer.php") ?>