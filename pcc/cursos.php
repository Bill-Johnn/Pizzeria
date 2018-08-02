<?php 
require_once("header.php");
require_once("funciones.php");
$xc = conectar();
$sql = "SELECT * FROM curso";
$res = mysqli_query($xc,$sql);
desconectar($xc);

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Curso
                <small>LISTADO</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="cursos_registrar.php">Nuevo Curso</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       while ($fila = mysqli_fetch_array($res)) {
                        $xid_cur = $fila["id_curso"];
                        $xnom_cur = $fila["nom_curso"];
                            echo "<tr>";
                                echo "<td>$xid_cur</td>";
                                echo "<td>$xnom_cur</td>";   
                                echo "<td><a href='cursos_editar.php?xid_cur=$xid_cur'> Editar </a>
                                 <a href='cursos_grabar.php?xid_cur=$xid_cur'>Eliminar</a></td>";
                            echo "</tr>";
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
