<?php require_once("header.php") ?>

<script type="text/javascript" src="funciones.js"></script>
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />

<div id="body">
		<div class="cem">
			<h8>Escriba el DNI del solicitante</h8>

<p></p>

<form name="frmbusqueda" width="400px" action=""  id="BetaSignup" onsubmit="buscarDato(); return false" >
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
