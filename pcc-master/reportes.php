<?php 
require_once("header.php");
require_once("Datos/PersonaDatos.php");

require_once("Datos/AreaDatos.php");
require_once("funciones.php");
require_once("header.php");

$xid_per = leerParam("xid_per","");
$objPersonaDatos = new PersonaDatos();
$objAreaDatos = new AreaDatos();
$persona = $objPersonaDatos->getPersonaById($xid_per);
$areas = $objAreaDatos->getAreas();

?>
 <div class="container-fluid">
 <script type="text/javascript" src="js/funciones.js"></script>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Reportes
                <small>Tecsup</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="matriculas_registrar.php">Registrar Matricula</a>
                </li>
            </ol>
        </div>
    </div>

    <br>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header card-default">
                    Matriculas registradas entre las fechas:
                </div>
                <div class="card-block">
                    <form method="POST" action="reportes_matriculas_ini_fin.php">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>Del:</td>
                                <td><input type="date" name="fec_ini"></td>
                                <td>Al:</td>
                                <td><input type="date" name="fec_fin"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type='radio' name='tipo_doc' value='pdf' checked> PDF
                                    <input type='radio' name='tipo_doc' value='excel' checked> EXCEL
                                </td>
                                <td colspan="2">
                                    <input class="btn btn-primary" type="submit" value="Generar Reporte">            
                                </td>
                            </tr>
                        </table>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header card-default">
                    Cursos de:
                </div>
                <div class="card-block">
                <form method="POST" action="reportes_matriculas_ini_fin.php">
                <form role="form" name="frmMatricula" onsubmit="matricular(); return false;">
                <input hidden="YES" name="id_per" id="id_per" value=<?php echo $xid_per;?>>
                    <fieldset class="form-group">
                    <label>Elija Area</label>
                    <select class="form-control" name="id_area" onchange="buscarCarrera(); return false;">
                        <?php
                        foreach ($areas as $area) {
                            echo "<option value='$area->id_area'>$area->nom_area</option>";
                        }
                         ?>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label>Elija Carrera</label>
                        <select class="form-control" name="id_carr" id="id_carr" onchange="buscarSemCarr(); return false;"></select>

                </fieldset>
                  <tr>
                    <td colspan="2">
                        <input type='radio' name='tipo_doc' value='pdf' checked> PDF 
                        <input type='radio' name='tipo_doc' value='excel' checked> EXCEL
                    </td>
                    <td colspan="2">
                        <input class="btn btn-primary" type="submit" value="Generar Reporte">            
                    </td>
                 </tr>
                 </form>
                 </form>
                </div>
            </div>
        </div>
        <!-- /.col-sm-12 -->
    </div>


  


</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>