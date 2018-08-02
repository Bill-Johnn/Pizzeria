<?php require_once("header.php") ?>
<?php
	$xid_pab=leerParam("xid_pab","");
	$xnro_nicho=leerParam("xnro_nicho","");
	 $xc    = conectar(); 
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho, ima_nicho , nro_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$xnro_nicho"; 
	  $res   = mysqli_query($xc, $sql );
	  $fila  = mysqli_fetch_array($res);
	  $xid_nicho = $fila[0];
	  $xest_nicho=$fila[1];
	  $xcost_nicho=$fila[2];
	  $xima_nicho=$fila[3];
	  $xnro_nicho=$fila[4];
	  
	   $sql1   = "SELECT nom_pab, id_cem, tot_fil, tot_col FROM pabellon WHERE id_pab='$xid_pab'"; 
	  $res1   = mysqli_query($xc, $sql1 );
	  $fila1  = mysqli_fetch_array($res1);
	  $xnom_pab=$fila1[0];
	  $xid_cem=$fila1[1];
	  
	  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
	  $res2   = mysqli_query($xc,$sql2 );
	  $fila2  = mysqli_fetch_array($res2);
	  $xnom_cem=$fila2[0];
?>
		<script type="text/javascript" src="formly.js"></script>
        <link rel="stylesheet" href="formly.css" type="text/css" />
        </script>
        
        <?
	 /* ?>
      <div id="body">
		<div class="cem">
			<h8><?php echo " Cementerio: $xnom_cem  --- Pabellón: $xnom_pab --- Nicho N° $xnro_nicho"?></h8>
			
			  <p>&nbsp;</p>
              
          </div>
          </div>
        <?php
	  
	  	  
	 if($xest_nicho=='X')
	 {*/?>
    		
     					
                
	
				<form id="BetaSignup" width="600px">
                <h2>Nicho Disponible</h2>
					<h2>Nicho Nro : <?php echo "$xnro_nicho"; ?></h2>
					 <table border=0 cellpadding=5 cellspacing=5>
                            <tr> <th>Nombre de difunto: </th> <td><input type="text" value="<?php echo $xid_pab;?>" readonly="YES">
                            </td> </tr>
                             <tr> <th> D.N.I. de Solicitante: </th> <td> <input type=text size=8 value="<?php echo $xnro_nicho;  ?>" readonly="YES">
                            </td> </tr>
                             <tr> <th> Fecha de Sepultura: </th> <td> <input type=text size=70 value="<?php echo $xtitulo; ?>" readonly="YES"> </td> </tr>
                             <tr> <th> Precio de Nicho: </th> <td> <input type=text size=15 value="<?php echo $xestdoc;  ?>" readonly="YES">
                            </td> </tr>
                            <tr> <th> Otros: </th> <td> <textarea type=text cols="40" rows="5" readonly="YES" ><?php echo $xasunto;  ?></textarea>
                             </td> </tr>
                            
                              
                           </table>
                    <input type=submit value="Entendido" /> 
				</form>
                
				
     	
       
        				<?php /*
							$xc=conectar();
							$result = mysqli_query("SELECT ima_nicho FROM nicho WHERE id_nicho='$xid_nicho' "); 
							if ($row = mysqli_fetch_array($result)){ 
								?>
                                <img src="imagen_mostrar.php?nombre=707">
                               <?php }?>
							
					
                            
                    
     
	<?php }
	 else
	 {?>
		
	<form action="index.html" method="post">
					<h2>Información de Difunto</h2>
                    <h2>Nicho Nro : <?php echo "$xnro_nicho"; ?></h2>
					<label>Nombre de difunto</label>
					<input type="text" value="<?php echo "$xid_pab"; ?>" class="txtfield">
					<label>D.N.I. de Solicitante</label>
					<input type="text" value="<?php echo "$xnro_nicho";  ?>" class="txtfield">
					<label>Fecha de Sepultura</label>
					<input type="text" value="" class="txtfield">
					<label>Precio de Nicho</label>
					<input type="text" value="" class="txtfield" >
					<label>Otros</label>
					<textarea></textarea>
					<input type="submit" value="Submit" class="btn">
				</form>
     
	<?php }*/ ?>

	<script>
                $(document).ready(function()
                  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
                </script>
    
<?php require_once("footer.php") ?>