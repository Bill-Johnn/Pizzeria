<?php 
require_once("header.php");
require_once("funciones.php");
$xc = conectar();
$sql = "SELECT * FROM carrera";
$res = mysqli_query($xc,$sql);
desconectar($xc);

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Carreras
                <small>Listado</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="carrera_registrar.php">Nueva Carrera</a>
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
                        $xid_carr = $fila["id_carr"];
                        $xnom_carr = $fila["nom_carr"];
                            echo "<tr>";
                                echo "<td>$xid_carr</td>";
                                echo "<td>$xnom_carr</td>";   
                                echo "<td><a href='carrera_editar.php?xid_carr=$xid_carr'> Editar </a>
                                 <a href='carrera_grabar.php?xid_carr=$xid_carr'> Eliminar </a></td>";
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