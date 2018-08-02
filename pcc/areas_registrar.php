<?php require_once("header.php"); 
      require_once("funciones.php");

      $xc= conectar();
      $sql= "SELECT * FROM area";
      $res= mysqli_query($xc,$sql);
      desconectar($xc);
?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Areas
                                <small>Registrar</small>
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="areas_grabar.php">
                            <input hidden="YES" name="accion" value="crear">
                            <fieldset class="form-group">
                                <label for="nom_area">Nombre: </label>
                                <input class="form-control" placeholder="Escriba el Nombre del Area" required="required" name="nom_area" id="nom_area">
                            </fieldset>

                            <button type="submit" class="btn btn-secondary">Submit Button</button>
                            <button type="reset" class="btn btn-secondary">Reset Button</button>
                        </form>
                    </div>      
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>