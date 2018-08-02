<?php require_once("header.php") ?>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js"></script>
<script type="text/javascript" src="formly.js"></script>

<link rel="stylesheet" href="formly.css" type="text/css" />
 <?php
	function generaPaises()
	{
		$xc    = conectar();
		  $sql   = "SELECT id_cem, nom_cem FROM cementerio";
		  $res   = mysqli_query($xc,$sql );
		  //$consulta=mysqli_query("SELECT id, opcion FROM lista_paises");
		desconectar($xc);
		// Voy imprimiendo el primer select compuesto por los paises
		?>

        <form method=post id="BetaSignup" action="prueba.php" width="500px">

                  <table border=0 cellpadding=5 cellspacing=5 align="center">

        <?php
		echo "<tr><th><select name='cementerio' id='cementerio' onChange='cargaContenido(this.id)'>";
		echo "<option value='0'>Elige Cementerio</option>";
		while($registro=mysqli_fetch_array($res))
		{
			echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
		}
		echo "</select></th></tr>";
	}
?>

	<div id="body">
		<div class="cem">
			<h8>gestión --> Escoja la Sede y el Pabellon</h8>

	                  <?php generaPaises(); ?>
     							  <tr><th><select disabled="disabled" name="pabellon" id="pabellon">
                                              <option value="0">Selecciona opcion...</option>
                                            </select></th></tr>
                                              <tr><th><input type=submit  name=xenvio     value="Generar">     </th></tr>
                                          </table>
                                          </form>

                                          <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
                                </script>

		</div>
	</div>

<?php require_once("footer.php") ?>
