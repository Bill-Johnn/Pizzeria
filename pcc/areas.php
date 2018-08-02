<?php 
require_once("Datos/AreaDatos.php"); 
require_once("header.php"); 
require_once("funciones.php");

$objAreaDatos = new AreaDatos();


?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Areas
                                <small>Listado</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="areas_registrar.php">Nuevo Area</a>
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
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                    $objAreaDatos->listarAreas()
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>