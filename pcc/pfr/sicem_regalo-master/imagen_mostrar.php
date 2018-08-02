<?php
$nombre = $_GET['nombre'];
########## imagen_mostrar.php ##########
# deve recibir el id de la imagen a mostrar
# http://www.lawebdelprogramador.com

#Conectamos con la base de datos
$link=mysql_connect("localhost","root","");
mysql_select_db("municementerio",$link);

# Buscamos la imagen a mostrar
$result=mysqli_query("SELECT * FROM `imagen` WHERE id_imagen='$nombre'");
$row2=mysqli_fetch_array($result);

# Mostramos la imagen

header("Content-type: image/jpeg");
echo $row2['imagen'];
?>


