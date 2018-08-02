<?php require_once("header_admin.php") ?>
 <div id="body">
		<div class="cem">
<h8>Editar Costo</h8>
<hr>

<?php
  
   

/*SOLICITANTE*/

		
		$xid_pab=leerParam("xid_pab","");
		$xboton=leerParam("xboton","");
		$xboton=substr($xboton, -1, 1);
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnro_fila=leerParam("xnro_fil","");
		?>
       <script type="text/javascript" src="formly.js"></script>
        <link rel="stylesheet" href="formly.css" type="text/css" />
        </script>
 
		<form method=post id="BetaSignup" action="nicho_editar_costo.php" width="400px">
									<?php echo "
                                    <tr> <th> Editar Costo: </th> 
										<input type=text name=xcost_nicho size=15>
										<input type=hidden name=xid_pab value=$xid_pab>
										<input type=hidden name=xnro_fil value=$xboton>
                                        <td><input type=submit size=25 value='Editar'></td>
                                         </tr>";
                 					?>
         </form>
         <script>
		$(document).ready(function()
		  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
		</script>
	<?php
if($xcost_nicho){
  $xc = conectar();

	  $sql = "UPDATE nicho SET cost_nicho='$xcost_nicho'  WHERE id_pab='$xid_pab' AND nro_fil='$xnro_fila'";
   mysqli_query($xc, $sql );

  desconectar( $xc );
  header ("location:nicho_muestra.php?pabellon=$xid_pab");
}


?>

<?php require_once("footer.php") ?>
