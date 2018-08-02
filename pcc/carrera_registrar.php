<?php 
require_once("header.php");
require_once("funciones.php");
$xc = conectar();
$sql = "SELECT * FROM tipopersona";
$res =  mysqli_query($xc,$sql);
desconectar($xc);
   ?>

  <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Alumnos
                                <small>Registrar</small>
                            </h1>
                           
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-lg-12">

                        <form role="form" method="POST" action="carrera_grabar.php">

                            <input hidden="YES" name="accion" value="crear">
                            <fieldset class="form-group">
                                <label for="nom_carr">Nombre de la carrera:</label>
                                <input class="form-control" placeholder="Carrera:" required="required" name="nom_carr" id="nom_carr">

                            </fieldset>
                          

                            <button type="submit" class="btn btn-secondary">Registrar</button>
                            <button type="reset" class="btn btn-secondary">Limpiar</button>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

    <?php require_once("footer.php"); ?>