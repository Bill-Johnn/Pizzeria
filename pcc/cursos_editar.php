<?php require_once("header.php"); 
require_once("funciones.php");
$xid_cur = leerParam("xid_cur","");
$sql = "SELECT * FROM curso WHERE id_curso = '$xid_cur'";
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
                Curso
                <small>EDITAR</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="cursos_grabar.php">
                <input hidden="YES" name="accion" value="editar">
                <input hidden="YES" name="id_cur" value=<?php echo $xid_cur; ?>>
                <fieldset class="form-group">
                    <label for="nom_cur">Nombre del curso:</label>
                    <input class="form-control" placeholder="Escriba el curso" required="required" name="nom_cur" value=<?php echo '"'.$fila['nom_curso'].'"'; ?> id="nom_cur">
                </fieldset>

                <button type="submit" class="btn btn-secondary">Guardar</button>
                
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
