
<?php
function leerParam($param, $default) {
     if ( isset($_POST["$param"] ) )
        return $_POST["$param"];
     if ( isset($_GET["$param"] ) )
        return $_GET["$param"];
     return $default; 
  }
	$xid_dif=leerParam("xid_dif","");
	$xnom_dif=leerParam("xnom_dif","");
	$xpriape_dif=leerParam("xpriape_dif","");
	$xseguape_dif=leerParam("xseguape_dif","");
	$xfentierro=leerParam("xfentierro","");
	$xid_nicho = leerParam("xid_nicho","");
	

?>
  
								   
<table border=0 cellpadding=5 cellspacing=5>
<form width="800px" ENCTYPE="multipart/form-data" method="POST">
 
            
          <tr> <th> Nombre de Difunto: </th> <td>  <input type="text" name=xnom_dif value="<?php echo $xnom_dif;?>"></td></th>
          <tr> <th> Primer Apellido de Difunto: </th> <td>  <input type="text" name=xpriape_dif value="<?php echo $xpriape_dif;?>"></td></th>
          <tr> <th> Segundo Apellido de Difunto: </th> <td>  <input type="text" name=xseguape_dif value="<?php echo $xseguape_dif;?>"></td></th>
          <tr> <th> Fecha de Entierro: </th> <td>  <input type="text" name=xfentierro value="<?php echo $xfentierro;?>"></td></th>
          <input type="hidden" name=xid_dif value="<?php echo $xid_dif;?>">
          <input type="hidden" name=xid_nicho value="<?php echo $xid_nicho;?>">
          <tr><input type=submit onclick = "this.form.action = 'actualizar_difunto_guardar.php'" value=" Guardar "> </tr>
</form>
</table>