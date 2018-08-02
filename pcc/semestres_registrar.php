<?php require_once("header.php"); 
      require_once("funciones.php");

      $xc= conectar();
      $sql= "SELECT * FROM semestre";
      $res= mysqli_query($xc,$sql);
      desconectar($xc);
?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Semestres
                                <small>Registrar</small>
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="semestres_grabar.php">
                            <input hidden="YES" name="accion" value="crear">


                            <fieldset class="form-group">
                                <label for="nro_sem">Número del semestre: </label>
                                <input class="form-control" placeholder="Escriba el Número del Semestre" required="required" name="nro_sem" id="nro_sem">
                            </fieldset>

                            <button type="submit" class="btn btn-secondary">Registrar</button>
                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                        </form>
                    </div>      
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>