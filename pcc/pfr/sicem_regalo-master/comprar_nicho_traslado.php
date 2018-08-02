<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>
<?php
     $xc    = conectar(); 
	  $xid_dif=leerParam("xid_dif","");
	  $xid_nicho_ini=leerParam("xid_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$fecha_hoy=date('Y-m-d');
	 $sql   = "SELECT id_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$xnro_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho_fin = $fila[0];

$sql = "INSERT INTO `pend_tras` (`id_dif`, `id_nicho_ini`, `id_nicho_fin`,`fech_tras`,`estado`) VALUES ('$xid_dif','$xid_nicho_ini','$xid_nicho_fin','$fecha_hoy','POR PAGAR')";
mysqli_query($xc,$sql);
$id=mysql_insert_id();


		 $sql5 = "SELECT id_dif,nom_dif,fech_sep,dni_sol,priape_dif,segape_dif,id_sol FROM difunto WHERE id_nicho='$xid_nicho_ini'";
	 // echo "$sql5";
	//  die();
	  $res5 = mysqli_query($xc,$sql5 );
	  $fila5= mysqli_fetch_array($res5);
	  $xid_dif=$fila5[0];
	  $xnom_dif=$fila5[1];
	  $xfentierro=$fila5[2];
	  $xdni_sol=$fila5[3];
	  $xpriape_dif=$fila5[4];
	  $xseguape_dif=$fila5[5];
	  $xid_sol=$fila5[6];
	  
	  $sql6="SELECT nom_sol, tel_sol, dir_sol FROM solicitante WHERE id_sol='$xid_sol'";
	  //echo "$xdni_sol";
	  //die();
	  $res6=mysqli_query($xc,$sql6 );
	  $fila6= mysqli_fetch_array($res6);
	  $xnom_sol=$fila6[0];

		$sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho_fin"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
		  $xnro_fila_fin=$fila[5];	
		  $xid_pab_fin=$fila[4];
		  $xcost_nicho_fin=$fila[2];
		  $xnro_nicho_fin=$fila[3];
		  
		  $sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab_fin'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab_fin=$fila1[0];
	  $xid_cem_fin=$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem_fin'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem_fin=$fila2[0];
	  /////////////////////////////////////////////------------
	  
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho_ini"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
		  $xnro_fila_ini=$fila[5];	
		  $xid_pab_ini=$fila[4];
		  $xcost_nicho_ini=$fila[2];
		  $xnro_nicho_ini=$fila[3];
		  
		  $sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab_ini'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab_ini=$fila1[0];
	  $xid_cem_ini=$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem_ini'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem_ini=$fila2[0];
	  
		
		desconectar($xc);
				?>
           <div id="body">
		<div class="cem">
			<h8>ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $id; ?></h8>   
            			<div id="muestra" align='center'>

                            <table id='newspaper-b' align=center border="2px"> 
                            
                            <thead>
                                <tr  align='center' >
                                    <th scope='col' colspan="11">TRASLADO DE NICHO ------- ACERQUESE A CAJA CON EL CODIGO NUMERO <?php echo $id; ?></th>
                                   
                                    
                                </tr>
                              
                                <tr  align='center' >
                                    <th scope='col'>PAGO </th>
                                    <th scope='col'>SOLICITANTE</th>
                                    <th scope='col'>DIFUNTO</th>
                                    <th scope='col'>NICHO INICIAL</th>
                                    <th scope='col'>FILA INICIAL</th>
                                    <th scope='col'>PABELL&Oacute;N INICIAL</th>
                                    <th scope='col'>CEMENTERIO INICIAL</th>
                                    <th scope='col'>NICHO FINAL</th>
                                    <th scope='col'>FILA FINAL</th>
                                    <th scope='col'>PABELL&Oacute;N FINAL</th>
                                    <th scope='col'>CEMENTERIO FINAL</th>
                                   
                                    
                                </tr>
                                </thead>
                           
                            
                                <tr  align='center'>
                                    
                                    <th><?php echo "$xcost_nicho_fin"; ?></th>
                                    <th><?php echo "$xnom_sol"; ?></th>
                                    <th><?php echo "$xnom_dif  $xpriape_dif  $xseguape_dif"; ?></th>
                                    <th><?php echo "$xnro_nicho_ini"; ?></th>
                                    <th><?php echo "$xnro_fila_ini"; ?></th>
                                    <th><?php echo "$xnom_pab_ini"; ?></th>
                                    <th><?php echo "$xnom_cem_ini"; ?></th>
                                    <th><?php echo "$xnro_nicho_fin"; ?></th>
                                    <th><?php echo "$xnro_fila_fin"; ?></th>
                                    <th><?php echo "$xnom_pab_fin"; ?></th>
                                    <th><?php echo "$xnom_cem_fin"; ?></th>                                 
                                   
                                </tr>
				
               			 </table>
                </div>
                
                 <div style="position:absolute; top:300px; left:1200px">  
                
                <input type="image"  src="img/imprimir.jpg" value="Imprimir Ticket" onclick="javascript:imprSelec('muestra');function imprSelec(muestra)
            {var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();};" />
               </div>
          
    </div></div>




<?php require_once("footer.php") ?>