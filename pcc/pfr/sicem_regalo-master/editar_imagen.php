
<?php
function leerParam($param, $default) {
     if ( isset($_POST["$param"] ) )
        return $_POST["$param"];
     if ( isset($_GET["$param"] ) )
        return $_GET["$param"];
     return $default; 
  }
	$xid_nicho=leerParam("xid_nicho","");
	
	 
?>

<form width="800px" ENCTYPE="multipart/form-data" method="POST">
 
                            
                             Imagen:  <INPUT NAME="userfile" TYPE="file" />
                            <input type="hidden" name=xid_nicho value="<?php echo $xid_nicho;?>">
                    <input type=submit onclick = "this.form.action = 'guardar_imagen.php'" value=" Guardar "> 
				</form>
        
