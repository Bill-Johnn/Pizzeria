<?php 
require_once("header.php");
?>

 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Cursos
                <small>Registrar</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="cursos_grabar.php">
                <input hidden="YES" name="accion" value="crear">
                <fieldset class="form-group">
                    <label for="nom_per">Nombre del Curso:</label>
                    <input class="form-control" placeholder="Escriba el curso" required="required" name="nom_cur" id="nom_cur">
                </fieldset>

                <button type="submit" class="btn btn-secondary">Guardar</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
