<?php require_once("header_admin.php") ?>
<?php require_once("crear_admin.php") ?>
<?php
  $xc=conectar();
  $xid_pab = leerParam('pabellon','' );
 // echo "$xid_pab";
 // die();
  $sql   = "SELECT nom_pab, id_cem, tot_fil, tot_col , tipo_numer FROM pabellon WHERE id_pab='$xid_pab'"; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  $xnom_pab=$fila[0];
  $xid_cem=$fila[1];
  $xtot_fil=$fila[2];
  $xtot_col=$fila[3];
  $xtipo_numer=$fila[4];
  
  $sql1="SELECT count(*) FROM nicho WHERE id_pab='$xid_pab'";
  $res_sql1=mysqli_query($xc,$sql1 );
  $fila1=mysqli_fetch_array($res_sql1);
  $xnum=$fila1[0];
  
  $sql2   = "SELECT nom_cem FROM cementerio WHERE id_cem='$xid_cem'"; 
  $res2   = mysqli_query($xc,$sql2 );
  $fila2  = mysqli_fetch_array($res2);
  $xnom_cem=$fila2[0];
  
    ?>
  <div id="body">
		<div class="cem">
			<h8><?php echo " Cementerio: $xnom_cem  --- Pabellón: $xnom_pab"?></h8>
			
			  <p>&nbsp;</p>
  <div>
    <table width="500px" border="0">
  <tr>
    <td bgcolor="#32CD32"></td>
    <td>DISPONIBLE</td>
    
  </tr>
  <tr>
    <td bgcolor="#B22222"></td>
    <td>OCUPADO</td>
  </tr>
  <tr>
    <td bgcolor="#FF8000"></td>
    <td>NICHO EN TRAMITE</td>
  </tr>
  <tr>
    <td bgcolor="#8A0868" width="30px"></td>
    <td width="120">LIBRE POR TRASLADO</td>
  </tr>
</table>

    </div>
    
    <div>
    
     <table><tr> <th> Editar Costo: </th> 
                <?php                  		 
					
						for($i=$xtot_fil;$i>0;$i--){?>
						 
                         <form method=post  action="nicho_editar_costo.php" width="600px">
									<?php echo "
                                    
                                        <input type=hidden name=xid_pab value=$xid_pab>
                                        <td><input type=submit  name=xboton size=25 value='Fila $i'></td>
                                        ";
                 					?>
                		 </form>
 						 <?php }?>
			 </tr></table>		
					
    </div>
    <p>&nbsp;</p>
  <?php
  
  
 if($xnum==0)
 {
	 if($xtipo_numer=='A'){
		 crear_pabellon_nuevo_A($xtot_fil,$xtot_col,$xid_pab);
	}
	 if($xtipo_numer=='B'){
		 crear_pabellon_nuevo_B($xtot_fil,$xtot_col,$xid_pab);
	}
	if($xtipo_numer=='C'){
		 crear_pabellon_nuevo_C($xtot_fil,$xtot_col,$xid_pab);
	}
	if($xtipo_numer=='D'){
		 crear_pabellon_nuevo_D($xtot_fil,$xtot_col,$xid_pab);
	}
 }
 else
 {	
 	if($xtipo_numer=='A'){
		 crear_pabellon_existente_A($xtot_fil,$xtot_col,$xid_pab);
	}
	if($xtipo_numer=='B'){
		 crear_pabellon_existente_B($xtot_fil,$xtot_col,$xid_pab);
	}
	if($xtipo_numer=='C'){
		 crear_pabellon_existente_C($xtot_fil,$xtot_col,$xid_pab);
	}
	if($xtipo_numer=='D'){
		 crear_pabellon_existente_D($xtot_fil,$xtot_col,$xid_pab);
	}
	 
 }
  
  desconectar($xc);
   
  
  ?>
 
  
  
		</div>
	</div>
    
<?php require_once("footer.php") ?>
