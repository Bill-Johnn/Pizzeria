<?php require_once("header.php"); 
require_once("funciones.php");
$xid_carr = leerParam("xid_carr","");
$sql = "SELECT * FROM carrera WHERE id_carr = '$xid_carr'";
$xc = conectar();
$res = mysqli_query($xc,$sql);
desconectar($xc);
$fila = mysqli_fetch_array($res);
?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Carrera
                <small>EDITAR</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="carrera_grabar.php">
                <input hidden="YES" name="accion" value="editar">
                <input hidden="YES" name="id_carr" value=<?php echo $xid_carr; ?>>
                <fieldset class="form-group">
                    <label for="nom_carr">Carrera:</label>
                    <input class="form-control" placeholder="Numero de la carrea" required="required" name="nom_carr" value=<?php echo '"'.$fila['nom_carr'].'"'; ?> id="nom_carr">
                </fieldset>

                <button type="submit" class="btn btn-secondary">Guardar</button>
                
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>