<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php
  

       $xnom_dif = leerParam("xnom_dif","");
	    $xid_sol = leerParam("xid_sol","");
		$xpriape_dif=leerParam("xpriape_dif","");
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
		$xc=conectar();
		$sql = "INSERT INTO `pen_conv` (`nom_dif`, `priape_dif`, `seguape_dif`,`fentierro`,`fautorizacion`,`dni_sol`,`nom_sol`,`dir_sol`,`id_nicho`,`id_pabellon`,`cel_sol`,`nro_nicho`,`cost_nicho`,`est_pendiente`,`descripcion`,`id_sol`) VALUES ('$xnom_dif','$xpriape_dif','$xseguape_dif','$xfentierro','$xfautorizacion','$xdni_sol','$xnom_sol','$xdir_sol','$xid_nicho','$xid_pab','$xcel_sol','$xnro_nicho','$xcost_nicho','POR PAGAR','Sesion de Uso Temporal','$xid_sol')";
		
		//echo"$sql";

		mysqli_query($xc,$sql);
		
$sql2="SELECT count(*) FROM solicitante WHERE dni_sol='$xdni_sol' AND id_sol='$xid_sol'";
//echo "$sql2";
//die();
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
//echo "$sql1 +";
//		die();
		
		}
		
		$sql4="SELECT id_pend_conv FROM pen_conv WHERE id_nicho='$xid_nicho' AND dni_sol='$xdni_sol' AND id_sol='$xid_sol'";
		$res4= mysqli_query($xc,$sql4 );
		$fila4=mysqli_fetch_array($res4);				
		$xcod_ticket=$fila4[0];
		
		
		$sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
		  $xnro_fila=$fila[5];	
		  
		  $sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab=$fila1[0];
	  $xid_cem=$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem=$fila2[0];
	  
		
		
		desconectar($xc);
				?>
           <div id="body">
		<div class="cem">
			<h8>ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $xcod_ticket; ?></h8>   
            
            	<div id="muestra" align='center'>

                            <table id='newspaper-b' align=center border="2px"> 
                            
                            <thead>
                                <tr  align='center' >
                                    <th scope='col' colspan="7">COMPRA DE NICHO ------- ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $xcod_ticket; ?></th>
                                   
                                    
                                </tr>
                              
                                <tr  align='center' >
                                    <th scope='col'>PAGO </th>
                                    <th scope='col'>SOLICITANTE</th>
                                    <th scope='col'>DIFUNTO</th>
                                    <th scope='col'>NICHO</th>
                                    <th scope='col'>FILA</th>
                                    <th scope='col'>PABELL&Oacute;N</th>
                                    <th scope='col'>CEMENTERIO</th>
                                   
                                    
                                </tr>
                                </thead>
                           
                            
                                <tr  align='center'>
                                    
                                    <th><?php echo "$xcost_nicho"; ?></th>
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