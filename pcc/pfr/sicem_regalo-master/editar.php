<?php require_once("header.php") ?>
<?php
 $xcod  = $_SESSION['codigo'];
    $xid_nicho=leerParam("xid_nicho","");
		 $xc    = conectar(); 
	  $sql   = "SELECT id_nicho, est_nicho, cost_nicho, ima_nicho , nro_nicho FROM nicho WHERE id_nicho='$xid_nicho'"; 
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
	  desconectar($xc);
?>
		
       	
     					
                
	<div align="left" style="float:right">
				<form width="800px" style="background-color:#36F">
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
                             <input type="hidden" name=xid_nicho value="<?php echo $xid_nicho;?>">
                            
                              
                           </table>
                    <input type=submit onclick = "this.form.action = 'editar.php'" value=" Editar "> 
				</form>
         </div>   
         <div style="float:left">
         	<?php
							$xc=conectar();
							$result = mysqli_query("SELECT id_nicho FROM nicho WHERE id_nicho='$xid_nicho' "); 
							if ($row = mysqli_fetch_array($result)){ 
								$idni=$row[0];
								echo "$idni";
								?>
                                <img src="imagen_mostrar.php?nombre=<?php echo "$idni" ;?>">
             <?php }?>
         </div>    
		
    
<?php require_once("footer.php") ?>