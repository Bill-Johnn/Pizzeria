<?php require_once("header.php"); 
require_once("funciones.php");
$xc=conectar();
$sql = "SELECT * FROM semestre";
$res = mysqli_query($xc,$sql);
desconectar($xc);
?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Semestres
                                <small>Listado</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="semestres_registrar.php">Nuevo Semestre</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                    <div class="col-lg-12">
                        <h2>Basic Table</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Numero de Semestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                    while ($fila = mysqli_fetch_array($res)) {
                                        $xid_sem = $fila["id_sem"];
                                        $xnro_sem = $fila["nro_sem"];
                                        echo "<tr>";
                                        echo "<td>$xid_sem</td>";
                                        echo "<td>$xnro_sem</td>";
                                        echo "<td><a href='semestres_editar.php?xid_sem=$xid_sem'>Editar</a> <a href='semestres_grabar.php?xid_sem=$xid_sem'>Eliminar</a></td>";
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