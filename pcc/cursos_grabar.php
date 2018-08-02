<?php 
require_once("header.php");
require_once("funciones.php");

$xaccion=leerParam("accion","");

if ($xaccion=="crear") {
    
    $xnom_cur=leerParam("nom_cur","");
    $xc = conectar();
    $sql = "INSERT INTO curso (nom_curso) VALUES ('$xnom_cur')";
    // echo "CONSULTA -> $sql";
    // die();
    mysqli_query($xc,$sql);
    desconectar($xc);
}elseif ($xaccion=="editar") {
    $xnom_cur=leerParam("nom_cur","");
    $xid_cur=leerParam("id_cur","");
    $xc = conectar();
    $sql = "UPDATE curso SET nom_curso='$xnom_cur' WHERE id_curso='$xid_cur'";
    // echo "CONSULTA -> $sql";
    // die();
    mysqli_query($xc,$sql);
    desconectar($xc);
}elseif ($xaccion=="") {//significa que estamos eliminadno el registro
    $xid_cur= leerParam("xid_cur","");
    $xc = conectar();
    $sql = "DELETE FROM curso WHERE id_curso='$xid_cur'";
    
    mysqli_query($xc,$sql);
    desconectar($xc);
}

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Alumnos
                <?php 
                    if($xaccion == "crear"){
                        echo"<small>Registro Creado Correctamente</small>";
                    }
                    if($xaccion == "editar"){
                        echo"<small>Registro Editado Correctamente</small>";
                    }
                    if($xaccion == ""){
                        echo"<small>Registro Eliminado Correctamente</small>";
                    }
                ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="cursos.php">Ver Cursos</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
