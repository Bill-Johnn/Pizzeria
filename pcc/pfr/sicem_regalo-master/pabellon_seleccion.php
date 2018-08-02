<?php require_once("header_admin.php") ?>


<div id="body">
		<div class="cem">
        <h8>Seleccionar Cementerio</h8>
        <hr>

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php

 $xc    = conectar(); 
  $sql   = "SELECT * FROM cementerio"; 
  $res   = mysqli_query($xc, $sql );
  
  	 
 
?>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=pabellon.php id="BetaSignup" width="400px" >
  <table align="center">
<tr><th>Seleccione Cementerio: </th>
       <td><select name=xid_cem size=1>
             <option value=0>Elija</option>
             <?php
                while( $fila  = mysqli_fetch_array($res) ) {
                   $xid_cem = $fila[0];
                   $xnom_cem = $fila[1];
                   echo "<option value=$xid_cem>$xnom_cem</option>";
                }
             ?> 
           </select>
       </td>
   </tr>
   
   <tr> 
         <td><input type=submit value=Continuar></td> </tr>
  </table>
</form>
<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php

  desconectar( $xc );
 ?>

<?php require_once("footer.php") ?>