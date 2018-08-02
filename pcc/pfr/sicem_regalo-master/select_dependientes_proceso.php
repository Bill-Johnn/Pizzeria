<?php require_once("funciones.php") ?>
<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"cementerio"=>"cementerio",
"pabellon"=>"pabellon"

);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];
	
	$xc=conectar();
	$consulta=mysqli_query($xc,"SELECT id_pab, nom_pab FROM $tabla WHERE id_cem='$opcionSeleccionada'") or die(mysqli_error());
	desconectar($xc);
	
	// Comienzo a imprimir el select
	echo "<p>";
	echo "<select name='".$selectDestino."' id='".$selectDestino."'>";
	echo "<option value='0'>Elige</option>";
	
	while($registro=mysqli_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>