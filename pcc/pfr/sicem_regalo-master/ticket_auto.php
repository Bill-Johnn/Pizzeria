<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php
  

        $xid_nicho = leerParam("xid_nicho","");
		$xnom_dif=leerParam("xnom_dif","");
	   	$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xnom_sol=leerParam("xnom_sol","");
		$xmonto_auto=leerParam("xmonto_auto","");
		$xmonto_auto_reja=leerParam("xmonto_auto_reja","");
		
		
		$xc=conectar();
			
		
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
		 $xnro_nicho=$fila[3]; 
		 $xid_pab=$fila[4];	  
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
	  
	  if($xmonto_auto>$xmonto_auto_reja)
	  
		  $xautorizacion='LAPIDA';
		 
		 else
		 $xautorizacion='REJA';
		 
		 desconectar($xc);
				?>
           <div id="body">
		<div class="cem">
			<h8>ACÉRQUESE A CAJA: </h8>   
            
            	<div id="muestra" align='center'>

                            <table id='newspaper-b' align=center border="2px"> 
                            
                            <thead>
                                <tr  align='center' >
                                    <th scope='col' colspan="7">PAGO DE DERECHO POR COLOCACIÓN DE <?php echo "$xautorizacion"; ?></th> 
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
                                    
                                    <th><?php echo "$xmonto_auto"."$xmonto_auto_reja".".00"; ?></th>
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
   
   <div style="position:absolute; top:300px; left:1000px">  
    <form method="post" action="consulta_nicho.php">
    <input type="HIDDEN" name=xid_nicho value="<?php echo $xid_nicho; ?>">
	<input type="submit" value="CONTINUAR">

    </form>
    
   </div>
            
          
    </div></div>
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
                

<?php require_once("footer.php") ?>