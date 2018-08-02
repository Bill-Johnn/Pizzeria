<?php 
require_once("header.php");
require_once("funciones.php");

$xaccion=leerParam("accion","");

if ($xaccion=="crear") {
$xnom_carr=leerParam("nom_carr","");
$xc=conectar();
$sql = "INSERT INTO carrera (nom_carr) VALUES ('$xnom_carr')";
mysqli_query($xc,$sql);
desconectar($xc);
}

elseif ($xaccion=="editar") {
$xid_carr=leerParam("id_carr","");
$xnom_carr=leerParam("nom_carr","");

$xc=conectar();

$sql = "UPDATE carrera SET nom_carr = '$xnom_carr' WHERE id_carr='$xid_carr'";

mysqli_query($xc,$sql);
desconectar($xc);  
}
elseif ($xaccion=="") {
    $xid_carr= leerParam("xid_carr","");
    $xc=conectar();

$sql = "DELETE FROM carrera WHERE id_carr='$xid_carr'";

mysqli_query($xc,$sql);
desconectar($xc); 
}
?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                carrera registrar
                                <?php
                                    if ($xaccion == "crear") {
                                        echo "<small>Registro Creado Correctamente</small>";
                                     } 
                                    if ($xaccion == "editar") {
                                        echo "<small>Registro Editado Correctamente</small>";
                                    }
                                    if ($xaccion == "eliminar") {
                                        echo "<small>Registro Eliminado Correctamente</small>";
                                    }
                                ?>
                            </h1>
                             <ol>
                                 <li>
                                    <i class="fa fa-deshboard"></i> <a href="carrera.php">Ver registros</a>
                                 </li>
                             </ol>
                        </div>
                    </div>
 </div>