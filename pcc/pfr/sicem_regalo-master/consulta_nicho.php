<?php require_once("header.php") ?>
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />

<?php
	$xid_pab=leerParam("xid_pab","");
	$xnro_nicho=leerParam("xnro_nicho","");
	$xid_nicho=leerParam("xid_nicho","");
	$fecha_hoy=date('Y-m-d');
	 $xc    = conectar(); 
	
	
	if($xid_nicho)
	{
	$sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho , id_pab ,nro_fil FROM nicho WHERE id_nicho=$xid_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xnro_nicho=$fila[3];
	  $xid_pab=$fila[4];
	  $xnro_fila=$fila[5];	
		
	}
	
	else{


	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho , nro_nicho ,nro_fil FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$xnro_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xnro_nicho=$fila[3];
	  $xnro_fila=$fila[4];
//	  echo "$xnro_nicho + ";
//	  die();
	  
	  }
	  
	 
	   $sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab=$fila1[0];
	  $xid_cem=$fila1[1];
	  
	  
	   
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem=$fila2[0];
	  
	  
	  
	  $sql5 = "SELECT id_dif,nom_dif,fech_sep,dni_sol,priape_dif,segape_dif,id_sol FROM difunto WHERE id_nicho='$xid_nicho'";
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
	  $xcel_sol=$fila6[1];
	  $xdir_sol=$fila6[2];
	  
	  $sql1 = "SELECT count(*) FROM convenio WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol'";
	  $res1 = mysqli_query($xc, $sql1 );    
	  $fila1 = mysqli_fetch_array($res1);
	  $xcan = $fila1[0];
	  
		$xmonto_auto=leerParam("xcosto_lapida","");
		$xmonto_auto_reja=leerParam("xcosto_reja","");
		$xfech_auto=date('Y-m-d');
		$xtipo_auto=leerParam("xtipo_auto","");

		if($xmonto_auto){
		
		$sql20 = "INSERT INTO `autorizacion` (`dni_sol`,`id_dif`,`fech_auto`,`tipo_auto`,`monto_auto`,`est_auto`,`id_sol`) VALUES ('$xdni_sol','$xid_dif','$xfech_auto','$xtipo_auto','$xmonto_auto','POR PAGAR','$xid_sol')";
		$res20=mysqli_query($sql20);

		
		header("Location:ticket_auto.php?xid_nicho=$xid_nicho&xmonto_auto=$xmonto_auto&xnom_sol=$xnom_sol&xnom_dif=$xnom_dif&xpriape_dif=$xpriape_dif&xseguape_dif=$xseguape_dif");
	  }
	  
	  if($xmonto_auto_reja){
		
		$sql20 = "INSERT INTO `autorizacion` (`dni_sol`,`id_dif`,`fech_auto`,`tipo_auto`,`monto_auto`,`est_auto`,`id_sol`) VALUES ('$xdni_sol','$xid_dif','$xfech_auto','$xtipo_auto','$xmonto_auto_reja','POR PAGAR','$xid_sol')";
		$res20=mysqli_query($sql20);
		header("Location:ticket_auto.php?xid_nicho=$xid_nicho&xmonto_auto_reja=$xmonto_auto_reja&xnom_sol=$xnom_sol&xnom_dif=$xnom_dif&xpriape_dif=$xpriape_dif&xseguape_dif=$xseguape_dif");	  }
	    
	  desconectar($xc);
//	  echo "<div id='body'>		<div class='about'>";
	  if($xest_nicho=='D')
	  {
		  ?>
          
          
            <div id="body">
                    <div class="cem">
                        <h8>Nicho <?php echo $xnro_nicho; ?> Disponible --> Pabellon <?php echo $xnom_pab; ?></h8>

                           <p><p><p> 
                    		<form method=post id="BetaSignup" action="comprar_nicho.php" width="560px" >
                                    <table border=0 cellpadding=5 cellspacing=5>
                                    <tr> <th> Id de nicho: </th> <td> <input type=text name=xid_nicho size=25 value="<?php echo $xid_nicho; ?>" readonly> </td> </tr>
                                    <tr> <th> Costo de Nicho: </th> <td> <input type=text name=xcost_nicho size=25 value="<?php echo "$xcost_nicho"; ?>" readonly>.00 Nuevos Soles</td></th> </tr>    
                                    
                                         <tr><th> <input type=submit  name=xenvio     value="Comprar Nicho "  ></th></tr>
                                         </table>
                                                  <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                                                   <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                                                    <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                                                    <input type="hidden" name=xcost_nicho size=15 value="<?php echo $xcost_nicho;  ?>" readonly >
                         </form>
                         			 
         
        		  <script>
                        $(document).ready(function()
                        { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
                </script>
</div></div>


<div style="position:absolute; top:310px; left:115px">
<form method="post" action="prueba.php">
 <input type="hidden" name=pabellon size=15 value="<?php echo $xid_pab;  ?>" readonly >
                <input type="image"  src="img/regresar.jpg"/>
</form>
</div>



          <?php
		  
	  }
	  		  
		 if($xest_nicho=='O' && $xcan==0)
		 
		 {
			 $xc=conectar();
			 
			  $sql1 = "SELECT count(*) FROM autorizacion WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol' AND tipo_auto='LAPIDA' AND est_auto='PAGADO'";
			  $res1 = mysqli_query($xc, $sql1 );    
			  $fila1 = mysqli_fetch_array($res1);
			  if($fila1[0]>0)
			  {
				  $lapida='SI';
			  }
			  else
			  {
				  $lapida='NO';
			  }
			   $sql123 = "SELECT count(*) FROM autorizacion WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol' AND tipo_auto='REJA' AND est_auto='PAGADO'";
			  $res123 = mysqli_query( $xc,$sql123 );    
			  $fila123 = mysqli_fetch_array($res123);
			  if($fila123[0]>0)
			  {
				  $reja='SI';
			  }
			   else
			  {
				  $reja='NO';
			  }
			  
			 desconectar($xc);
			?>
									<div id="body">
									<div class="cem">
										<h8>Información del Nicho <?php echo $xnro_nicho; ?></h8>
									  <div style="position:absolute; top:244; left:685px">
									<form method=post id="BetaSignup1" action="" width="600px"  title="Difunto" >
									 <table border=0 cellpadding=5 cellspacing=5>
									 <tr> <th> Codigo del Difunto: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xid_dif; ?>" readonly> </td> </tr>
									 <tr> <th> Nombre del Difunto: </th> <td> <input type=text name=xorigen size=25 value="<?php echo "$xnom_dif "."$xpriape_dif "."$xseguape_dif"; ?>" readonly> </td></th>
									 <tr> <th> Fecha de Sepultura: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xfentierro; ?>" readonly> </td><td><input type="button" onclick="window.open('actualizar_difunto.php?xid_dif=<?php echo "$xid_dif" ;?>&xnom_dif=<?php echo "$xnom_dif" ;?>&xpriape_dif=<?php echo "$xpriape_dif" ;?>&xseguape_dif=<?php echo "$xseguape_dif" ;?>&xfentierro=<?php echo "$xfentierro" ;?>&xid_nicho=<?php echo "$xid_nicho" ;?>','nuevaVentana','width=600, height=400')" value=" Editar Datos "/> </td></th>
									 </tr>    
									 </table>
									
							</form>
							
							 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
									  </div>
                                      
                                      <div style="position:absolute; top:310px; left:10px">
<form method="post" action="prueba.php">
 <input type="hidden" name=pabellon size=15 value="<?php echo $xid_pab;  ?>" readonly >
                <input type="image"  src="img/regresar.jpg"/>
</form>
</div>

							
							<div style="position:absolute; top:552px; left:685px">
										<form method=post id="BetaSignup2" action="" width="600px"  title="Apoderado" >
							
							
								   <table border=0 cellpadding=5 cellspacing=5>
								   
									 <tr> <th> Dni del Apoderado: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>" readonly> </td></tr>
									 <tr> <th> Nombre del Apoderado: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xnom_sol; ?>" readonly> </td></th>
									 <tr> <th> Telefono: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xcel_sol; ?>" readonly> </td></th>
									 <tr> <th> Direccion: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xdir_sol; ?>" readonly> </td><td><input type="button" onclick="window.open('actualizar_dni_apoderado.php?xid_sol=<?php echo "$xid_sol" ;?>&xdni_sol=<?php echo "$xdni_sol" ;?>&xnom_sol=<?php echo "$xnom_sol" ;?>&xcel_sol=<?php echo "$xcel_sol" ;?>&xdir_sol=<?php echo "$xdir_sol" ;?>','nuevaVentana','width=600, height=400')" value=" Editar Datos "/> </td></th>
									 </tr>    
								   </table>
									
								  		</form>
							  
															 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup2').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
							</div>
							
							
							<div style="position:absolute; top:915px; left:685px">
							 
									 <form method=post id="BetaSignup10" action="traspaso.php" width="600px"  title="TRASLADO" >
							
											<input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
											<input type="hidden" name=xid_dif size=15 value="<?php echo $xid_dif;  ?>" readonly >
											 <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
											<input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
											<input type="hidden" name=xcost_nicho size=15 value="<?php echo $xcost_nicho;  ?>" readonly >
														
											   <input type=submit  name=xenvio     value="Realizar Traslado"  >
									</form>
							  
												<script>
												  $(document).ready(function()
												  { $('#BetaSignup10').formly({'onBlur':false, 'theme':'Light'}); });
												   </script> 
							
							</div>
                            
                                                        
                                <div style="position:absolute; top:244px; left:155px;">
    
                				<?php
							//campo de imagen!!!
                                $xc=conectar();
                                $result = mysqli_query($xc,"SELECT id_ima_nicho FROM nicho WHERE id_nicho='$xid_nicho' "); 
                                if ($row = mysqli_fetch_array($result))
                                { 
                                    $idni=$row[0];
                                    //echo "$idni";
                                    
                                    ?>
                                   <?php }?>
                          
                                   <script type="text/javascript">
                                        <!--
                                        function ventanaNueva(){ 
                                            window.open('nueva.html','nuevaVentana','width=300, height=400')
                                        }
                                        //-->
                                    </script>
                                    <form  id="BetaSignup4"  width="500px"  title="Imagen del Nicho" >
                                        <table border=0 cellpadding=5 cellspacing=5>
                                         <tr>  <td> <img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435"> </td> </tr> 
                                        </table>
                                        
          								<input type="button" onclick="window.open('editar_imagen.php?xid_nicho=<?php echo "$xid_nicho" ;?>','nuevaVentana','width=300, height=400')" value=" Editar Imagen "/>
                                     
                                 </form>
                                 
                                 <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup4').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
                                 
               	                   
               			</div>
                   
                   	   
                        <div  style=" position:absolute; top:790px; left:155px;" >
                        <form method=post id="BetaSignup7" action="constancia_word.php" width="500px"  title="Constancia:" >
                        	<input type="hidden" name=xnom_dif size=15 value="<?php echo $xnom_dif;  ?>" readonly >
                           <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                           <input type="hidden" name=xpriape_dif size=15 value="<?php echo $xpriape_dif;  ?>" readonly >
                           <input type="hidden" name=xseguape_dif size=15 value="<?php echo $xseguape_dif;  ?>" readonly >
                            <input type="hidden" name=xnro_fila size=15 value="<?php echo $xnro_fila ;  ?>" readonly >
                            <input type="hidden" name=xnom_pab size=15 value="<?php echo $xnom_pab;  ?>" readonly >
                            <input type="hidden" name=xfentierro size=15 value="<?php echo $xfentierro;  ?>" readonly >
                           
                        <input type=submit  name=xenvio     value="Generar constancia "  >
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
            
            
            
           
            
            
            
            
            
           <?php
				   if ($lapida=='SI' && $reja=='SI')
				   {
					   /* <tr><td> <input type=text name=xcosto_lapida size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>	*/
					   ?>
            <div  style=" position:absolute; top:963px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
           
             <div  style=" position:absolute; top:1155px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                        	
                        
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>
			 
             
             

<?php	
				   }
				   if($lapida=='SI' && $reja=='NO')
				   {
					 ?>
                     <div  style=" position:absolute; top:963px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
                     
                   <div  style=" position:absolute; top:1150px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             
                        	<tr><td> <input type=text name=xcosto_reja size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>  
                     
                     
                     <?php  
					}
					if($lapida=='NO' && $reja=='SI')
				   {
					   ?>
					   <div  style=" position:absolute; top:963px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								<tr><td> <input type=text name=xcosto_lapida size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                            
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
           
                       <div  style=" position:absolute; top:1157px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                        	
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>  
                       
					   
					   
					   
					   <?php
				   }
				   if($lapida=='NO' && $reja=='NO')
				   {
					   ?>
					   
					   <div  style=" position:absolute; top:963px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								<tr><td> <input type=text name=xcosto_lapida size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                            
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
					   
					   <div  style=" position:absolute; top:1152px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             
                        	<tr><td> <input type=text name=xcosto_reja size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>
					   
					   <?php
				   
				   }
				   
		}
		  

 if ( $xcan > 0 ) {
	 
	 
	 $xc    = conectar(); 
	  $sql1 = "SELECT id_conv FROM convenio WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol'";
	  $res1 = mysqli_query($xc,$sql1 );    
	  $fila1 = mysqli_fetch_array($res1);
	  $xid_convenio = $fila1['id_conv'];
	  
	  
	  $sql122 = "SELECT estado FROM deudas WHERE id_conv='$xid_convenio'";
	  $res122 = mysqli_query($xc,$sql122);    
	?> 
     <div id="body">
									<div class="cem">
										<h8>Información del Nicho <?php echo $xnro_nicho; ?></h8> 
	
	<?php
	  
	  while($fila5=mysqli_fetch_array($res122))
	  {

		  if($fila5[0]=='PAGADO'){$est=1;}
		  else{
			  $est=2;
		  break;}
		}
		

		if($est==1)
		{?>
       
       
       
       
        <div style="position:absolute; top:900px; left:685px">
							 
									 <form method=post id="BetaSignup10" action="traspaso.php" width="600px"  title="Traslado" >
							
											<input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
											<input type="hidden" name=xid_dif size=15 value="<?php echo $xid_dif;  ?>" readonly >
											 <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
											<input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
											<input type="hidden" name=xcost_nicho size=15 value="<?php echo $xcost_nicho;  ?>" readonly >
														
											   <input type=submit  name=xenvio     value="Realizar Traslado"  >
									</form>
							  
												<script>
												  $(document).ready(function()
												  { $('#BetaSignup10').formly({'onBlur':false, 'theme':'Light'}); });
												   </script> 
							
							</div>
        
       
        
        <?php }
	  
	 
	 
	 
	 ?>
     
     <div style="position:absolute; top:310px; left:25px">
<form method="post" action="prueba.php">
 <input type="hidden" name=pabellon size=15 value="<?php echo $xid_pab;  ?>" readonly >
                <input type="image"  src="img/regresar.jpg"/>
</form>
</div>
     
     						
									  <div style="position:absolute; top:244; left:685px">
									<form method=post id="BetaSignup1" action="" width="600px"  title="Difunto" >
									 <table border=0 cellpadding=5 cellspacing=5>
									 <tr> <th> Codigo del Difunto: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xid_dif; ?>" readonly> </td> </tr>
									 <tr> <th> Nombre del Difunto: </th> <td> <input type=text name=xorigen size=25 value="<?php echo "$xnom_dif "."$xpriape_dif "."$xseguape_dif"; ?>" readonly> </td></th>
									 <tr> <th> Fecha de Sepultura: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xfentierro; ?>" readonly> </td><td><input type="button" onclick="window.open('actualizar_difunto.php?xid_dif=<?php echo "$xid_dif" ;?>&xnom_dif=<?php echo "$xnom_dif" ;?>&xpriape_dif=<?php echo "$xpriape_dif" ;?>&xseguape_dif=<?php echo "$xseguape_dif" ;?>&xfentierro=<?php echo "$xfentierro" ;?>&xid_nicho=<?php echo "$xid_nicho" ;?>','nuevaVentana','width=600, height=400')" value=" Editar Datos "/> </td></th>
									 </tr>    
									 </table>
									
							</form>
							
							 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
									  </div>
							
														
								
							
                            <div style="position:absolute; top:545px; left:685px">
										<form method=post id="BetaSignup2" action="" width="600px"  title="Apoderado" >
							
							
								   <table border=0 cellpadding=5 cellspacing=5>
								   
									 <tr> <th> Dni del Apoderado: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>" readonly> </td></tr>
									 <tr> <th> Nombre del Apoderado: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xnom_sol; ?>" readonly> </td></th>
									 <tr> <th> Telefono: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xcel_sol; ?>" readonly> </td></th>
									 <tr> <th> Direccion: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xdir_sol; ?>" readonly> </td><td><input type="button" onclick="window.open('actualizar_dni_apoderado.php?xid_sol=<?php echo "$xid_sol" ;?>&xdni_sol=<?php echo "$xdni_sol" ;?>&xnom_sol=<?php echo "$xnom_sol" ;?>&xcel_sol=<?php echo "$xcel_sol" ;?>&xdir_sol=<?php echo "$xdir_sol" ;?>','nuevaVentana','width=600, height=400')" value=" Editar Datos "/> </td></th>
									 </tr>    
								   </table>
									
								  		</form>
							  
															 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup2').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
							</div>
							
							
							
                     <div  style=" position:absolute; top:244px; left:155px;" >
                <form method=post id="BetaSignup3" action="pagar_cuotas_ver.php" width="500px"  title="Convenio:" >
                <input type="hidden" name=xid_conv value="<?php echo $xid_convenio; ?>">
                <input type="hidden" name=xid_nicho value="<?php echo $xid_nicho; ?>">
                <input type=submit  name=xenvio     value="Ver Detalles del convenio"  >
                </form>
                    <script>
                                                        $(document).ready(function()
                                                        { $('#BetaSignup3').formly({'onBlur':false, 'theme':'Light'}); });
                                                </script> 
                </div>
                
                <div style="position:absolute; top:417px; left:155px;">

         	<?php
							$xc=conectar();
							$result = mysqli_query($xc,"SELECT id_ima_nicho FROM nicho WHERE id_nicho='$xid_nicho' "); 
							if ($row = mysqli_fetch_array($result))
							{ 
								$idni=$row[0];
								//echo "$idni";
								
								?>
                               
                               <script type="text/javascript">
									<!--
									function ventanaNueva(){ 
										window.open('nueva.html','nuevaVentana','width=300, height=400')
									}
									//-->
								</script>
                                <form  id="BetaSignup4"  width="500px"  title="Imagen del Nicho" >
 									<table border=0 cellpadding=5 cellspacing=5>
                                     <tr>  <td> <img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435"> </td> </tr> 
                                    </table>
                                    
      				<input type="button" onclick="window.open('editar_imagen.php?xid_nicho=<?php echo "$xid_nicho" ;?>','nuevaVentana','width=300, height=400')" value=" Editar Imagen "/>
                                 
  							 </form>
                  
             <?php }?>
             
             
             					<script>
                                        $(document).ready(function()
                                        { $('#BetaSignup4').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
             </div>
          
             <div  style=" position:absolute; top:963px; left:155px;" >
                        <form method=post id="BetaSignup7" action="constancia_word.php" width="500px"  title="Constancia:" >
                        	<input type="hidden" name=xnom_dif size=15 value="<?php echo $xnom_dif;  ?>" readonly >
                           <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                           <input type="hidden" name=xpriape_dif size=15 value="<?php echo $xpriape_dif;  ?>" readonly >
                           <input type="hidden" name=xseguape_dif size=15 value="<?php echo $xseguape_dif;  ?>" readonly >
                            <input type="hidden" name=xnro_fila size=15 value="<?php echo $xnro_fila ;  ?>" readonly >
                            <input type="hidden" name=xnom_pab size=15 value="<?php echo $xnom_pab;  ?>" readonly >
                            <input type="hidden" name=xfentierro size=15 value="<?php echo $xfentierro;  ?>" readonly >
                           
                        <input type=submit  name=xenvio     value="Generar constancia "  >
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
            
            
            
           <?php $xc=conectar();
			 
			  $sql1 = "SELECT count(*) FROM autorizacion WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol' AND tipo_auto='LAPIDA' AND est_auto='PAGADO'";
			  $res1 = mysqli_query($xc, $sql1 );    
			  $fila1 = mysqli_fetch_array($res1);
			  if($fila1[0]>0)
			  {
				  $lapida='SI';
			  }
			  else
			  {
				  $lapida='NO';
			  }
			   $sql123 = "SELECT count(*) FROM autorizacion WHERE dni_sol='$xdni_sol' AND id_dif='$xid_dif' AND id_sol='$xid_sol' AND tipo_auto='REJA' AND est_auto='PAGADO'";
			  $res123 = mysqli_query($xc,$sql123 );    
			  $fila123 = mysqli_fetch_array($res123);
			  if($fila123[0]>0)
			  {
				  $reja='SI';
			  }
			   else
			  {
				  $reja='NO';
			  }
			  
			 desconectar($xc);
            ?>
            
            
            <?php
				   if ($lapida=='SI' && $reja=='SI')
				   {
					   /* <tr><td> <input type=text name=xcosto_lapida size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>	*/
					   ?>
            <div  style=" position:absolute; top:1120px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
           
             <div  style=" position:absolute; top:1300px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                        	
                        
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>
			 
             
             

<?php	
				   }
				   if($lapida=='SI' && $reja=='NO')
				   {
					 ?>
                     <div  style=" position:absolute; top:1120px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
                     
                   <div  style=" position:absolute; top:1300px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             
                        	<tr><td> <input type=text name=xcosto_reja size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>  
                     
                     
                     <?php  
					}
					if($lapida=='NO' && $reja=='SI')
				   {
					   ?>
					   <div  style=" position:absolute; top:1120px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								<tr><td> <input type=text name=xcosto_lapida size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                            
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
           
                       <div  style=" position:absolute; top:1300px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             <tr><td><input type=submit size=25 onclick = "this.form.action = 'autorizacion_otros_word.php'" value="Generar Autorización"><td></tr>
                        	
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>  
                       
					   
					   
					   
					   <?php
				   }
				   if($lapida=='NO' && $reja=='NO')
				   {
					   ?>
					   
					   <div  style=" position:absolute; top:1120px; left:155px;" >
                        <form method=post id="BetaSignup8" width="500px"  title="Autorizacion de Lapida:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho; ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xnom_sol; ?>">
                            <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                            <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="LAPIDA" readonly >
             
      								<tr><td> <input type=text name=xcosto_lapida size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                            
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
					   
					   <div  style=" position:absolute; top:1300px; left:155px;" >
                        <form method=post id="BetaSignup9" width="500px"  title="Autorizacion de Reja:" >
                        	 <table border=0 cellpadding=5 cellspacing=5>
                             <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                           <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>">
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol; ?>" readonly >
                            <input type="hidden" name=xid_dif size=25 value="<?php echo $xid_dif; ?>">
                             <input type="hidden" name=xdir_sol size=25 value="<?php echo $xdir_sol; ?>">
                             <input type="hidden" name=xid_sol size=25 value="<?php echo $xid_sol; ?>">
                            <input type="hidden" name=xtipo_auto size=15 value="REJA" readonly >
    	
                             
                        	<tr><td> <input type=text name=xcosto_reja size=25 value:"Colocar Costo"></td><td><input type=submit size=25 onclick = "this.form.action = 'consulta_nicho.php'" value="Solicitar Autorizacion"></td></tr>
                           </table>
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div></div>
					   
					   <?php
				   
				   }
		?>

<?php
 }?>
 
             
         <?php
		 
		 
		 
         if($xest_nicho=='P')
		 {
		 ?>
         
         <div id="body">
									<div class="cem">
										<h8>Información del Nicho <?php echo $xnro_nicho; ?></h8>
									  <div style="position:absolute; top:244; left:685px">
									<form method=post id="BetaSignup1" action="" width="600px"  title="Difunto" >
									 <table border=0 cellpadding=5 cellspacing=5>
									 <tr> <th> Codigo del Difunto: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xid_dif; ?>" readonly> </td> </tr>
									 <tr> <th> Nombre del Difunto: </th> <td> <input type=text name=xorigen size=25 value="<?php echo "$xnom_dif "."$xpriape_dif "."$xseguape_dif"; ?>" readonly> </td></th>
									 <tr> <th> Fecha de Sepultura: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xfentierro; ?>" readonly> </td></th>
									 </tr>    
									 </table>
								
							</form>
							
							 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
									  </div>
							
							<div style="position:absolute; top:596px; left:685px">
										<form method=post id="BetaSignup2" action="" width="600px"  title="Apoderado" >
							
							
								   <table border=0 cellpadding=5 cellspacing=5>
								   
									 <tr> <th> Dni del Apoderado: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>" readonly> </td> </tr>
									 <tr> <th> Nombre del Apoderado: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xnom_sol; ?>" readonly> </td></th>
									 <tr> <th> Telefono: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xcel_sol; ?>" readonly> </td></th>
									 <tr> <th> Direccion: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xdir_sol; ?>"> </td></th>
									 </tr>    
								   </table>
									
								
							</form>
							  
															 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup2').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
							</div>
							
							
							
     
   
                          
                <div style="position:absolute; top:244px; left:36px;">

         	<?php
							$xc=conectar();
							$result = mysqli_query("SELECT id_ima_nicho FROM nicho WHERE id_nicho='$xid_nicho' "); 
							if ($row = mysqli_fetch_array($result))
							{ 
								$idni=$row[0];
								//echo "$idni";
								
								?>
                               
                               <script type="text/javascript">
									<!--
									function ventanaNueva(){ 
										window.open('nueva.html','nuevaVentana','width=300, height=400')
									}
									//-->
								</script>
                                <form  id="BetaSignup4"  width="500px"  title="Imagen del Nicho" >
 									<table border=0 cellpadding=5 cellspacing=5>
                                     <tr>  <td> <img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435"> </td> </tr> 
                                    </table>
                                    
      				<input type="button" onclick="window.open('editar_imagen.php?xid_nicho=<?php echo "$xid_nicho" ;?>','nuevaVentana','width=300, height=400')" value=" Editar Imagen "/>
                                 
  							 </form>
                  
             <?php }?>
             
             
             					<script>
                                        $(document).ready(function()
                                        { $('#BetaSignup4').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
             </div>
             
  
                      
				<div  style=" position:absolute; top:790px; left:36px;" >

					<?php
					
					$sql15   = "SELECT cuota_ini FROM pen_conv WHERE dni_sol='$xdni_sol' AND nom_sol='$xnom_sol' AND id_nicho='$xid_nicho' AND id_sol='$xid_sol'"; 
					  $res15   = mysqli_query( $sql15 );
					  $fila15 = mysqli_fetch_array($res15);
					  $xcuota_ini=$fila15[0];
                    ?>

                        <form method=post id="BetaSignup7" action="cancelar_pago.php" width="500px"  title="Acciones" >
                        
                        
                        	<input type="hidden" name=xnom_dif size=15 value="<?php echo $xnom_dif;  ?>" readonly >
                            <input type="hidden" name=xid_sol size=15 value="<?php echo $xid_sol;  ?>" readonly >
                            <input type="hidden" name=xnro_nicho size=15 value="<?php echo $xnro_nicho;  ?>" readonly >
                            <input type="hidden" name=xpriape_dif size=15 value="<?php echo $xpriape_dif;  ?>" readonly >
                            <input type="hidden" name=xseguape_dif size=15 value="<?php echo $xseguape_dif;  ?>" readonly >
                            <input type="hidden" name=xnro_fila size=15 value="<?php echo $xnro_fila ;  ?>" readonly >
                            <input type="hidden" name=xnom_pab size=15 value="<?php echo $xnom_pab;  ?>" readonly >
                            <input type="hidden" name=xfentierro size=15 value="<?php echo $xfentierro;  ?>" readonly >
                            <input type="hidden" name=xfautorizacion size=15 value="<?php echo $fecha_hoy;  ?>" readonly >
                            <input type="hidden" name=xdni_sol size=15 value="<?php echo $xdni_sol;  ?>" readonly >
                            <input type="hidden" name=xnom_sol size=15 value="<?php echo $xnom_sol;  ?>" readonly >
                            <input type="hidden" name=xdir_sol size=15 value="<?php echo $xdir_sol;  ?>" readonly >
                            <input type="hidden" name=xcel_sol size=15 value="<?php echo $xcel_sol;  ?>" readonly >
                            <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                            <input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly >
                            <input type="hidden" name=xcost_nicho size=15 value="<?php echo $xcost_nicho;  ?>" readonly >
                            <input type="hidden" name=xnom_cem size=15 value="<?php echo $xnom_cem  ?>" readonly >
                            <input type="hidden" name=xnom_pab size=15 value="<?php echo $xnom_pab;  ?>" readonly >
                            <input type="hidden" name=xcuota_ini size=15 value="<?php echo $xcuota_ini;  ?>" readonly >
                            
                                                  
                           
                           
                        <input type=submit  name=xenvio  value="Cancelar Pago"  >
                        <input type=submit size=25 onclick = "this.form.action = 'generar_convenio.php'" value="Generar Convenio">
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
                              <?php
			  } 
			  
			  
			  if($xest_nicho=='T')
		 {
		 ?>
         
         
         <div id="body">
							<div class="cem">
										<h8>Información del Nicho <?php echo $xnro_nicho; ?></h8>
                                        
                                        
                                        <div style="position:absolute; top:310px; left:25px">
<form method="post" action="prueba.php">
 <input type="hidden" name=pabellon size=15 value="<?php echo $xid_pab;  ?>" readonly >
                <input type="image"  src="img/regresar.jpg"/>
</form>
</div>
                                        
                                        		
							<div style="position:absolute; top:244px; left:685px">
                            
                            <?php 
							
							$xc=conectar();
							$sql="SELECT * FROM traslado WHERE id_nicho_ini='$xid_nicho' ORDER BY fech_tras desc";
 							$res=mysqli_query($xc,$sql);
							$fila=mysqli_fetch_array($res);
							$xid_dif=$fila[0];
							
							$sql="SELECT id_sol FROM difunto WHERE id_dif='$xid_dif'";
 							$res=mysqli_query($xc,$sql);
							$fila=mysqli_fetch_array($res);
							$xid_sol=$fila[0];
							
							$sql6="SELECT nom_sol, tel_sol, dir_sol, dni_sol FROM solicitante WHERE id_sol='$xid_sol'";
							//  echo "$xdni_sol";
							  //die();
							  $res6=mysqli_query($xc,$sql6 );
							  $fila6= mysqli_fetch_array($res6);
							  $xnom_sol=$fila6[0];	  
							  $xcel_sol=$fila6[1];
							  $xdir_sol=$fila6[2];
							  $xdni_sol=$fila6[3];
							 desconectar($xc);
							?>
										<form method=post id="BetaSignup2" action="" width="600px"  title="Apoderado" >
							
							
								   <table border=0 cellpadding=5 cellspacing=5>
								   
									 <tr> <th> Dni del Apoderado: </th> <td> <input type=text name=xcoddoc size=25 value="<?php echo $xdni_sol; ?>" readonly> </td> </tr>
									 <tr> <th> Nombre del Apoderado: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xnom_sol; ?>" readonly> </td></th>
									 <tr> <th> Telefono: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xcel_sol; ?>" readonly> </td></th>
									 <tr> <th> Direccion: </th> <td> <input type=text name=xorigen size=25 value="<?php echo $xdir_sol; ?>"> </td></th>
									 </tr>    
								   </table>
									
							
							</form>
							  
															 <script>
																	$(document).ready(function()
																	{ $('#BetaSignup2').formly({'onBlur':false, 'theme':'Light'}); });
															</script>
							
							</div>
							
							
							
     
   
                          
                <div style="position:absolute; top:244px; left:36px;">

         	<?php
							$xc=conectar();
							$result = mysqli_query($xc,"SELECT id_ima_nicho FROM nicho WHERE id_nicho='$xid_nicho' "); 
							if ($row = mysqli_fetch_array($result))
							{ 
								$idni=$row[0];
								//echo "$idni";
								
								?>
                               
                               <script type="text/javascript">
									<!--
									function ventanaNueva(){ 
										window.open('nueva.html','nuevaVentana','width=300, height=400')
									}
									//-->
								</script>
                                <form  id="BetaSignup4"  width="500px"  title="Imagen del Nicho" >
 									<table border=0 cellpadding=5 cellspacing=5>
                                     <tr>  <td> <img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>" height="350" width="435"> </td> </tr> 
                                    </table>
                                    
      				<input type="button" onclick="window.open('editar_imagen.php?xid_nicho=<?php echo "$xid_nicho" ;?>','nuevaVentana','width=300, height=400')" value=" Editar Imagen "/>
                                 
  							 </form>
                  
             <?php }?>
             
             
             					<script>
                                        $(document).ready(function()
                                        { $('#BetaSignup4').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
             </div>
             
  
                      
				<div  style=" position:absolute; top:790px; left:36px;" >

                        <form method=post id="BetaSignup7" action="aviso_desocupar_nicho.php" width="500px"  title="Desocupar" >
                        
                            <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                        
                        <input type=submit  name=xenvio  value="Desocupar"  >
                        
                        </form>
                            <script>
                                        $(document).ready(function()
                                        { $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
                                </script> 
			</div>
                              <?php
			  } 
	  
	  
	  
	