<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>
<?php
  
/*DIFUNTO*/
$xid_sol = leerParam("xid_sol","");
		$xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");

/*SOLICITANTE*/
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");

/*NICHO*/
		$xid_nicho = leerParam("xid_nicho","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnom_cem=leerParam("xnom_cem","");
		$xnom_pab=leerParam("xnom_pab","");
		
		$xnom_alcalde=leerParam("xnom_alcalde","");
		$xdni_alcalde=leerParam("xdni_alcalde","");
		$xdir_alcalde=leerParam("xdir_alcalde","");
		
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");
		
		$xmonto_cuota=($xcost_nicho-$xcuota_ini)/$xnro_cuotas;
			
		$xc=conectar();
		
		
		$sql1="DELETE FROM pen_conv WHERE id_nicho='$xid_nicho'";
		mysqli_query($xc,$sql1 );
		
		
		
		$sql = "INSERT INTO `pen_conv` (`nom_dif`, `priape_dif`, `seguape_dif`,`fentierro`,`fautorizacion`,`dni_sol`,`nom_sol`,`dir_sol`,`id_nicho`,`id_pabellon`,`cel_sol`,`nro_nicho`,`cost_nicho`,`nro_cuotas`,`monto_cuota`,`est_pendiente`,`cuota_ini`,`nom_alcalde`,`dir_alcalde`,`dni_alcalde`,`descripcion`,`id_sol`) VALUES ('$xnom_dif','$xpriape_dif','$xseguape_dif','$xfentierro','$xfautorizacion','$xdni_sol','$xnom_sol','$xdir_sol','$xid_nicho','$xid_pab','$xcel_sol','$xnro_nicho','$xcost_nicho','$xnro_cuotas','$xmonto_cuota','POR PAGAR','$xcuota_ini','$xnom_alcalde','$xdir_alcalde','$xdni_alcalde','Compra por convenio','$xid_sol')";
		
		mysqli_query($xc,$sql);
		
		
		
		$sql2="SELECT count(*) FROM solicitante WHERE dni_sol='$xdni_sol' AND id_sol='$xid_sol'";
		$res2=mysqli_query($xc,$sql2 );
 		$fila2=mysqli_fetch_array($res2);
		$xcantidad=$fila2[0];
		if($xcantidad>0)
		{
			
		}
		else
		{
	$sql1 = "INSERT INTO `solicitante` (`dni_sol`, `nom_sol`, `tel_sol`, `dir_sol`, `id_sol`) VALUES ('$xdni_sol', '$xnom_sol', '$xcel_sol', '$xdir_sol', '$xid_sol')";
			mysqli_query($xc, $sql1 );
		}
		
		
		$sql4="SELECT id_pend_conv FROM pen_conv WHERE id_nicho='$xid_nicho' AND nom_dif = '$xnom_dif' AND priape_dif = '$xpriape_dif' AND seguape_dif = '$xseguape_dif'";
		$res4= mysqli_query($xc,$sql4 );
		$fila4=mysqli_fetch_array($res4);				
		$xcod_ticket=$fila4[0];

	$sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
		  $xnro_fila=$fila[5];	

		desconectar($xc);
				?>
                
    <div id="body">
		<div class="cem">
			<h8>ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $xcod_ticket; ?></h8>   
            
            
            <div id="muestra" align='center'>

                            <table id='newspaper-b' align=center border="2px"> 
                            
                            <thead>
                                <tr  align='center' >
                                    <th scope='col' colspan="7">COMPRA DE NICHO POR CONVENIO ------- ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $xcod_ticket; ?> </th>
                                   
                                    
                                </tr>
                              
                                <tr  align='center' >
                                    <th scope='col'>CUOTA INICIAL </th>
                                    <th scope='col'>SOLICITANTE</th>
                                    <th scope='col'>DIFUNTO</th>
                                    <th scope='col'>NICHO</th>
                                    <th scope='col'>FILA</th>
                                    <th scope='col'>PABELL&Oacute;N</th>
                                    <th scope='col'>CEMENTERIO</th>
                                   
                                    
                                </tr>
                                </thead>
                           
                            
                                <tr  align='center'>
                                    
                                    <th><?php echo "$xcuota_ini"; ?></th>
                                    <th><?php echo "$xnom_sol"; ?></th>
                                    <th><?php echo "$xnom_dif  $xpriape_dif  $xseguape_dif"; ?></th>
                                    <th><?php echo "$xnro_nicho"; ?></th>
                                    <th><?php echo "$xnro_fila"; ?></th>
                                    <th><?php echo "$xnom_pab"; ?></th>
                                    <th><?php echo "$xnom_cem"; ?></th>
                                                                     
                                   
                                </tr>
				
               			 </table>
    </div>
    
                 <div style="position:absolute; top:300px; left:1000px">  
                
                <input type="image"  src="img/imprimir.jpg" value="Imprimir Ticket" onclick="javascript:imprSelec('muestra');function imprSelec(muestra)
            {var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();};" />
               </div>
          
    </div></div>
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
                

<?php require_once("footer.php") ?>