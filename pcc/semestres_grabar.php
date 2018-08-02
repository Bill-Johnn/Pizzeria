<?php require_once("header.php");
      require_once("funciones.php");

$xaccion=leerParam("accion",""); 

if($xaccion=="crear"){
$xnro_sem=leerParam("nro_sem","");
$xc=conectar();
$sql = "INSERT INTO semestres (nro_sem) VALUES('$xnro_sem')";
mysqli_query($xc,$sql);
desconectar($xc);
}else 

if ($xaccion=="editar") {
$xid_sem=leerParam("id_sem","");
$xnro_sem=leerParam("nro_sem","");

$xc=conectar();
$sql = "UPDATE  semestre SET nro_sem='$xnro_sem' WHERE id_sem=$xid_sem";

mysqli_query($xc,$sql);
desconectar($xc);
}
else 

if ($xaccion=="") {
$xid_sem=leerParam("xid_sem","");
$xc=conectar();
$sql = "DELETE FROM semestre WHERE id_sem='$xid_sem'";

mysqli_query($xc,$sql);
desconectar($xc);
}




?>
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Semestres
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
                                    <i class="fa fa-dashboard"></i>  <a href="semestres.php">Ver Semestres</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>