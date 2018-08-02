<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php

		$xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");
		$xid_nicho = leerParam("xid_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xnro_nicho=leerParam("xnro_nicho","");
   		$xcost_nicho=leerParam("xcost_nicho","");

//echo "$xnom_dif + $xpriape_dif + $xseguape_dif + $xfentierro + $xfautorizacion +";
//die();  

$xc=conectar();

$fila=mysqli_fetch_array($xc,mysqli_query("SELECT id_sol FROM solicitante ORDER BY 1 desc"));
$xid_sol=$fila[0]+1;
desconectar($xc);



?>
<script type="text/javascript" src="formly.js"></script>
<script type="text/javascript" src="restricciones.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
<div id="body">
		<div class="cem">
			<h8>Registrar Solicitante</h8>



<form method=post id="BetaSignup" action="comprar_nicho_resumen.php" width="700px" >


       <table border=0 cellpadding=5 cellspacing=5>
       <tr> <th> Codigo del Solicitante: </th> <td> <input type=text name=xid_sol size=70 value="<?php echo $xid_sol;  ?>" readonly="YES"> </td> </tr>
         <tr> <th> D.N.I. del Solicitante: </th> <td> <input type=text name=xdni_sol size=25 maxlength="8" onKeyPress="return justNumbers(event);"> </td> </tr>
         <tr> <th> Nombres y Apellidos: </th> <td> <input type=text name=xnom_sol size=70 > </td> </tr>
         <tr> <th> Direccion: </th> <td> <input type=text name=xdir_sol size=70 > </td> </tr>
         <tr> <th> Telefono o Celular: </th> <td> <input type=text name=xcel_sol size=25 onKeyPress="return justNumbers(event);"> </td> </tr>
       </table>
       <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly="YES" >
       <input type="hidden" name=xid_sol size=15 value="<?php echo $xid_sol;  ?>" readonly="YES" >
           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly="YES" >
             <input type="hidden" name=xnom_dif size=15 value="<?php echo $xnom_dif;  ?>" readonly="YES" >
             <input type="hidden" name=xpriape_dif size=15 value="<?php echo $xpriape_dif;  ?>" readonly="YES" >
             <input type="hidden" name=xseguape_dif size=15 value="<?php echo $xseguape_dif;  ?>" readonly="YES" >
             <input type="hidden" name=xfentierro size=15 value="<?php echo $xfentierro;  ?>" readonly="YES" >
             <input type="hidden" name=xfautorizacion size=15 value="<?php echo $xfautorizacion;  ?>" readonly="YES" >
                         <input type="hidden" name=xcost_nicho size=15 value="<?php echo $xcost_nicho;  ?>" readonly="YES" >
<input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly="YES" >
             <input type=submit  name=xenvio     value="Finalizar"  >

    </form>
    </div></div>

	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>
