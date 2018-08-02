<?php require_once("header_admin.php") ?>

<?php
  $xc  = conectar();

?>

<h3>Nuevo Usuario</h3>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=usuario_grabar.php id="BetaSignup" width="450px">
  <input type=hidden name=tipo value="INSERT">
  <table>
  		<tr> <th> Codigo de Usuario: </th> <td> <input type=text name=xid_usu size=15 >
            </td> </tr>
        <tr> <th> Nombre: </th> <td> <input type=text name=xnom_usu size=35 >
            </td> </tr>
        <tr> <th> Clave: </th> <td> <input type=text name=xcla_usu size=15 >
        </td> </tr>
        <tr> <th> Dni.: </th> <td> <input type=text name=xdni_usu size=15 >
        </td> </tr>        
        <tr><th>Tipo de Usuario: </th>
       <td><select name=xtipo_usu size=1>
             <option value=0>Elija</option>
             <option value=Caja>Caja</option>
             <option value=Gerente>Gerente</option>
             <option value=Administrador>Administrador</option>
             
           </select>
       </td>
   </tr>
    <tr> 
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script><?php require_once("footer.php") ?>