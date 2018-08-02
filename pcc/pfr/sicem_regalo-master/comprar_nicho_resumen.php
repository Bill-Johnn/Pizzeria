<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
  

        $xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xid_sol=leerParam("xid_sol","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xid_nicho = leerParam("xid_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcel_sol=leerParam("xcel_sol","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xcost_nicho=leerParam("xcost_nicho","");
				
				//echo " $xnom_dif ++ ";
				//die(); 
				$xc    = conectar(); 
  $sql   = "SELECT id_cem,nom_pab FROM pabellon WHERE id_pab='$xid_pab'";
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  $xid_cem = $fila[0];
  $xnom_pab=$fila[1];
  
  $sql1   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'";
  $res1   = mysqli_query($xc, $sql1 );
  $fila1  = mysqli_fetch_array($res1);
  $xnom_cem = $fila1[0];
  
  
  
  
  desconectar($xc);
?>

<script type="text/javascript" src="formly.js"></script>
<script type="text/javascript" src="restricciones.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
<div id="body">
		<div class="cem">
			<h8>Resumen del Registro</h8>

<form method=post id="BetaSignup"  width="700px"  >
<table border=0 cellpadding=5 cellspacing=5>
        <label style="font-size:26px; font-family:Verdana, Geneva, sans-serif ; color:#009;  ">DATOS DEL DIFUNTO</label> 
         <tr> <th> Nombres: </th> <td> <input type=text name=xnom_dif size=25 value="<?php echo $xnom_dif; ?>" readonly="yes"> </td> </tr>
         <tr> <th> Primer Apellido: </th> <td> <input type=text name=xpriape_dif size=25 value="<?php echo $xpriape_dif; ?>" readonly="yes"> </td> </tr>
 		 <tr> <th> Segundo Apellido: </th> <td> <input type=text name=xseguape_dif size=25 value="<?php echo $xseguape_dif; ?>" readonly="yes"></td> </tr>
		 <tr> <th> Fecha de Entierro: </th> <td><input type="date" name=xfentierro size=10 value="<?php echo $xfentierro; ?>" readonly="yes"></td> </tr>
         <tr> <th> Fecha de Autorizacion: </th> <td><input type=text name=xfautorizacion size=25  value="<?php echo $xfautorizacion; ?>" readonly="yes"></td> </tr>
     </table>
      
		<label style="font-size:26px; font-family:Verdana, Geneva, sans-serif ; color:#009;  ">DATOS DEL SOLICITANTE</label>

       <table border=0 cellpadding=5 cellspacing=5>
         <tr> <th> D.N.I. del Solicitante: </th> <td> <input type=text name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>" readonly="yes"> </td> </tr>
         <tr> <th> Nombres y Apellidos: </th> <td> <input type=text name=xnom_sol size=70 value="<?php echo $xnom_sol; ?>" readonly="yes"> </td> </tr>
         <tr> <th> Direccion: </th> <td> <input type=text name=xdir_sol size=70 value="<?php echo $xdir_sol; ?>" readonly="yes"> </td> </tr>
         <tr> <th> Telefono o Celular: </th> <td> <input type=text name=xcel_sol size=25 value="<?php echo $xcel_sol; ?>" readonly="yes"> </td> </tr>       
       </table>
                


       <table border=0 cellpadding=5 cellspacing=5>
         <label style="font-size:26px; font-family:Verdana, Geneva, sans-serif; color:#009; ">DATOS DEL NICHO</label>
         <tr> <th> Codigo del Nicho: </th> <td> <input type=text name=xid_nicho size=25 value="<?php echo $xid_nicho; ?>" readonly="yes"> </td> </tr>
         <tr> <th> Numero de Nicho: </th> <td> <input type=text name=xnro_nicho size=25 value="<?php echo $xnro_nicho; ?>" readonly="yes"> </td> </tr>
         <input type="hidden" name=xid_sol size=15 value="<?php echo $xid_sol;  ?>" readonly="YES" >
         <tr> <th> Monto Pagar: </th> <td> <input type=text name=xcost_nicho size=25 value="<?php echo "$xcost_nicho".".00"; ?>" readonly="yes"> Nuevos Soles</td> </tr>
         <tr> <th> Sede: </th> <td> <input type=text name=xnom_cem size=70 value="<?php echo $xnom_cem; ?>" readonly="yes"> </td> </tr>
         <tr> <th> Pabellon: </th> <td> <input type=text name=xnom_pab size=70  value="<?php echo $xnom_pab; ?>" readonly="yes"> </td> </tr>
         
         <tr> 
         <td colspan="2"> <input type=submit  name=xenvio  onclick = "this.form.action = 'aviso_comprar_nicho_ticket.php'" value="Obtener Ticket"  > <input type=submit size=25 onclick = "this.form.action = 'generar_convenio.php'" value="Generar convenio" ></td>
           		 
           </tr>
         
         <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly="YES" >
    
       </table>
           
   
                
    </form>
    </div></div>
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script><script>
$(document).ready(function()
  { $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
</script><script>
$(document).ready(function()
  { $('#BetaSignup2').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>