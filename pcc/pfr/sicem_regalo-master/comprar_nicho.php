<?php require_once("header.php") ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
 		 $xid_nicho = leerParam("xid_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xcost_nicho=leerParam("xcost_nicho","");
  $xcod  = $_SESSION['codigo'];

  $xc    = conectar();

  $xfecha= date('Y-m-d');
  $xdia= date('d');
  $xmes= date('m');

  //echo "$coddoc -- $nuevalor";
  //die();
  desconectar( $xc );
?>

<script type="text/javascript" src="formly.js"></script>
<script type="text/javascript" src="restricciones.js"></script>

<link rel="stylesheet" href="formly.css" type="text/css" />
<div id="body">
		<div class="cem">
			<h8>Registrar Difunto</h8>

<form method=post id="BetaSignup" action="comprar_nicho_dsol.php" width="700px" name="fvalida">


       <table border=0 cellpadding=5 cellspacing=5>
     <tr> <th> Nombres: </th> <td> <input type=text name=xnom_dif size=70 > </td> </tr>
     <tr> <th> Primer Apellido: </th> <td> <input type=text name=xpriape_dif size=25 > </td> </tr>
 		 <tr> <th> Segundo Apellido: </th> <td> <input type=text name=xseguape_dif size=25 ></td> </tr>
		 <tr> <th> Fecha de Entierro: </th> <td><input type="date" name=xfentierro size=10 ></td> </tr>
         <tr> <th> Fecha de Autorizacion: </th> <td><input type=text name=xfautorizacion size=25  value="<?php echo $xfecha; ?>" readonly></td> </tr>


       </table>
       <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly="YES" >
           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly="YES" >
<input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly="YES" >
            <input type="hidden" name=xcost_nicho size=15 value="<?php echo $xcost_nicho;  ?>" readonly="YES" >

      <input type=submit  name=xenvio     value="Siguiente"  onClick="valida_envia()" >


    </form>
    </div></div>

	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>
