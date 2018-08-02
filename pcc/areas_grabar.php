<?php require_once("header.php");
      require_once("funciones.php");

$xaccion=leerParam("accion",""); 

if($xaccion=="crear"){
$xnom_area=leerParam("nom_area","");
$xc=conectar();
$sql = "INSERT INTO area (nom_area) VALUES('$xnom_area')";
mysqli_query($xc,$sql);
desconectar($xc);
}else 

if ($xaccion=="editar") {
$xid_area=leerParam("id_area","");
$xnom_area=leerParam("nom_area","");

$xc=conectar();
$sql = "UPDATE  area SET nom_area='$xnom_area' WHERE id_area=$xid_area";

mysqli_query($xc,$sql);
desconectar($xc);
}
else 

if ($xaccion=="") {
$xid_area=leerParam("xid_area","");
$xc=conectar();
$sql = "DELETE FROM area WHERE id_area='$xid_area'";

mysqli_query($xc,$sql);
desconectar($xc);
}




?>
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Areas
                                <?php 
                                    if ($xaccion == "crear") {
                                        echo "<small>Registro Creado Correctamente</small>";
                                    }
                                    if ($xaccion == "editar") {
                                        echo "<small>Registro Editado Correctamente</small>";
                                    }
                                    if ($xaccion == "") {
                                        echo "<small>Registro Eliminado Correctamente</small>";
                                    }
                                 ?>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="areas.php">Ver Areas</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>