<?php require_once("header.php") ?>



<?php
  
  /*$xcod  = $_SESSION['codigo'];
 
  $xc    = conectar(); 
  $sql   = "SELECT codusu, nomusu FROM usuario WHERE codusu='$xcod'"; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  $xcod = $fila[0];
  $xnombre = $fila[1];
 

  desconectar( $xc );*/
?>
<script type="text/javascript" src="funciones.js"></script>
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />

<div id="body">
		<div class="cem">
			<h8>Escriba el De</h8>
			
<p></p>

<form name="frmbusqueda" width="400px" action=""  id="BetaSignup" onsubmit="buscarDato2(); return false" >
  <div align="center">Termino a buscar:
    <input type="text" name="dato" /> 
  </div>
</form>
<fieldset><legend>Resultado</legend>
<div id="resultado"></div>
</fieldset>

    <script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php require_once("footer.php") ?>