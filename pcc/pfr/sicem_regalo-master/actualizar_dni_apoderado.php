
<?php
function leerParam($param, $default) {
     if ( isset($_POST["$param"] ) )
        return $_POST["$param"];
     if ( isset($_GET["$param"] ) )
        return $_GET["$param"];
     return $default; 
  }
	$xid_sol=leerParam("xid_sol","");
	$xcel_sol=leerParam("xcel_sol","");
	$xdir_sol=leerParam("xdir_sol","");
	$xnom_sol=leerParam("xnom_sol","");
	$xdni_sol=leerParam("xdni_sol","");
	

?>
  
								   
<table border=0 cellpadding=5 cellspacing=5>
<form width="800px" ENCTYPE="multipart/form-data" method="POST">
 
            <tr> <th> Dni del Apoderado: </th> <td><input type="text" name=xdni_sol value="<?php echo $xdni_sol;?>"></td></tr>
          <tr> <th> Nombre del Apoderado: </th> <td>  <input type="text" name=xnom_sol value="<?php echo $xnom_sol;?>"></td></th>
          <tr> <th> Celular: </th> <td>  <input type="text" name=xcel_sol value="<?php echo $xcel_sol;?>"></td></th>
          <tr> <th> Dirección: </th> <td> <input type="text" name=xdir_sol value="<?php echo $xdir_sol;?>"></td></tr>
          <input type="hidden" name=xid_sol value="<?php echo $xid_sol;?>">
          <tr><input type=submit onclick = "this.form.action = 'actualizar_dni_apoderado_guardar.php'" value=" Guardar "> </tr>
</form>
</table>