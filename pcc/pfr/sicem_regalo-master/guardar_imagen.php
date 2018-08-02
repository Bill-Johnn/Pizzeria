

<?php

function leerParam($param, $default) {
     if ( isset($_POST["$param"] ) )
        return $_POST["$param"];
     if ( isset($_GET["$param"] ) )
        return $_GET["$param"];
     return $default; 
  }
	$xid_nicho=leerParam("xid_nicho","");

# Conectamos con la base de datos
$link=mysql_connect("localhost","root","");
mysql_select_db("municementerio",$link);
//echo "<BR>".$_FILES["userfile"]["name"];		//nombre del archivo
//echo "<BR>".$_FILES["userfile"]["type"];		//tipo
//echo "<BR>".$_FILES["userfile"]["tmp_name"];	//nombre del archivo de la imagen temporal
//echo "<BR>".$_FILES["userfile"]["size"];		//tamaño

# Comprovamos que se haya subido un fichero
if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
	# Cogemos el formato de la imagen
	if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
	{
		# Cogemos la anchura y altura de la imagen
		$info=getimagesize($_FILES["userfile"]["tmp_name"]);
		//echo "<BR>".$info[0]; //anchura
		//echo "<BR>".$info[1]; //altura
		//echo "<BR>".$info[2]; //1-GIF, 2-JPG, 3-PNG
		//echo "<BR>".$info[3]; //cadena de texto para el tag <img

		# Escapa caracteres especiales
		$imagenEscapes=mysql_real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));

		# Agregamos la imagen a la base de datos
		$result=mysqli_query("INSERT INTO `imagen` (anchura,altura,tipo,imagen) VALUES (".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')",$link);
		# Cogemos el identificador con que se ha guardado
		$id=mysql_insert_id();
		mysqli_query("UPDATE nicho SET id_ima_nicho='$id' WHERE id_nicho='$xid_nicho'",$link);

		# Mostramos la imagen agregada
		echo "Imagen agregada con el id ".$id."<BR>";
		//echo "<img src='imagen_mostrar.php?id=".$id."' width='".$info[0]."' height='".$info[1]."'>";
	}else{
		$error="El formato de archivo tiene que ser JPG, GIF, BMP o PNG.";
		echo "$error";
	}
}else{
	$error="No ha seleccionado ninguna imagen...";
	echo "$error";
}
?>

<html>
<head>
<script languaje="javascript">
function recarga_padre_y_cierra_ventana(){
var xid_nicho = "<?php echo $xid_nicho; ?>" ;
window.location.href = 'consulta_nicho.php?xid_nicho='+xid_nicho; 

window.close();
}
</script>
</head>
<body onLoad="recarga_padre_y_cierra_ventana()">
</body>
</html>