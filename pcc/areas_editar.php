<?php require_once("header.php"); 
      require_once("funciones.php");
      require_once("Datos/AreaDatos.php"); 

      $xid_area=leerParam("xid_area","");
      $objAreaDatos = new AreaDatos();
      $areas = $objAreaDatos->editarAreas(leerParam("xid_area",""));
?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Areas 
                                <small>Editar</small>
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="areas_grabar.php">
                            <input hidden="YES" name="accion" value="editar">
                            <input hidden="YES" name="id_area" value="<?php echo $areas->id_area ?>">
                            <fieldset class="form-group">
                                <label for="nom_area">Nombre: </label>
                                <input class="form-control" placeholder="Escriba su Nombre" required="required" name="nom_area" id="nom_area" value="<?php echo $areas->nom_area ?>">
                            </fieldset>

                            <button type="submit" class="btn btn-secondary">Guardar Button</button>
                        </form>
                    </div>      
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>