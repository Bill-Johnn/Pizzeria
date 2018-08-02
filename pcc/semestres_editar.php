<?php require_once("header.php"); 
      require_once("funciones.php");

      $xid_sem=leerParam("xid_sem","");
      $sql="SELECT * FROM semestre WHERE id_sem = '$xid_sem'";
      $xc= conectar();
      $res = mysqli_query($xc,$sql);
      desconectar($xc);
      $fila = mysqli_fetch_array($res);
?>

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Semestre 
                                <small>Editar</small>
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="semestres_grabar.php">
                            <input hidden="YES" name="accion" value="editar">
                            <input hidden="YES" name="id_sem" value=<?php echo $xid_sem; ?>>
                            <fieldset class="form-group">
                                <label for="nro_sem">Nombre: </label>
                                <input class="form-control" placeholder="Escriba su Nombre" required="required" name="nro_sem" id="nro_sem" value=<?php echo $fila['nro_sem']; ?>>
                            </fieldset>

                            <button type="submit" class="btn btn-secondary">Guardar Button</button>
                        </form>
                    </div>      
                </div>
                <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

<?php require_once("footer.php"); ?>