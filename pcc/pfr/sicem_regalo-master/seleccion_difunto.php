<?php require_once("header.php") ?>
<?php require_once("crear.php") ?>

<?php
  $xc=conectar();
  $xid_pab = leerParam('pabellon','' );
  $xid_dif=leerParam("xid_dif","");
  $xid_nicho=leerParam("xid_nicho","");
 // echo "$xid_pab";
 // die();
  $sql   = "SELECT nom_pab, id_cem, tot_fil, tot_col ,tipo_numer FROM pabellon WHERE id_pab='$xid_pab' "; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  $xnom_pab=$fila[0];
  $xid_cem=$fila[1];
  $xtot_fil=$fila[2];
  $xtot_col=$fila[3];
  $xtipo_pab=$fila[4];
  
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
   <?php
  
  
  if($xtipo_pab=='A')
  {
				echo "<table border='10'>";
				$fila=$xtot_fil;
				$cont=1;
				 for($i=1; $i<=$xtot_fil ; $i++){
					 
					 echo "<tr>  ";
					 
					for($j=1; $j<=$xtot_col ; $j++){
						$sql   = "SELECT est_nicho, cost_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$cont"; 
						 $res   = mysqli_query($xc, $sql );
						 $filas  = mysqli_fetch_array($res);
						 $xest_nicho = $filas[0];
						 $xcost_nicho= $filas[1];						
						
						if($xest_nicho=='O' || $xest_nicho=='P' || $xest_nicho=='T')
						 {
						
						echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
										<input disabled type=submit style='width:94px; height:87px; background:#BDBDBD' name=xnro_nicho value=".$cont."> 
										<input type=hidden   name=xid_pab value=".$xid_pab.">
										 
									</form>
							</td>";  
						 }
						 elseif($xest_nicho=='D')
						 {
							
							 echo "<td align='center' width='110px' height='90px'><form action=aviso_comprar_nicho_traslado.php method=post>
										<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont.">
										$/. $xcost_nicho 
										<input type=hidden   name=xid_pab value=".$xid_pab.">
										<input type=hidden   name=xid_nicho value=".$xid_nicho.">
										<input type=hidden name=xid_dif value=".$xid_dif.">
									</form>
							</td>"; 
						 }
		
			
						
						$cont=$cont+1;
							 
					} 
					echo "</tr>";
					$fila=$fila-1;
				}
				echo "</table> ";
	  
	  }
  
  if($xtipo_pab=='B')
  {
		echo "<table border='10'>";
	 $fila=$xtot_fil;
	 $cont=$xtot_col*$xtot_fil;
	
	 for($i=1; $i<=$xtot_fil ; $i++){
		
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			$sql   = "SELECT est_nicho, cost_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$cont"; 
	 		 $res   = mysqli_query($xc, $sql );
	 		 $filas = mysqli_fetch_array($res);
	 		 $xest_nicho = $filas[0];
			 $xcost_nicho= $filas[1];
			 
			if($xest_nicho=='O' || $xest_nicho=='P' || $xest_nicho=='T')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input disabled type=submit style='width:94px; height:87px; background:#BDBDBD' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
							 
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='D')
			 {
				
				 echo "<td align='center' width='110px' height='90px'><form action=aviso_comprar_nicho_traslado.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont.">
							$/. $xcost_nicho 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
							<input type=hidden   name=xid_nicho value=".$xid_nicho.">
							<input type=hidden name=xid_dif value=".$xid_dif.">
						</form>
				</td>"; 
			 }
			$cont=$cont-1;			 
			
		}  
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> ";

	  }
  
  if($xtipo_pab=='C')
  {
	 echo "<table border='10'>";
	 $fila=$xtot_fil;
	$cont=$xtot_col*$xtot_fil;
	 for($i=1; $i<=$xtot_fil ; $i++){
		$contador=$cont-($xtot_col*$i)+1;
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			
			$sql   = "SELECT est_nicho, cost_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$contador"; 
	 		 $res   = mysqli_query($xc, $sql );
	 		 $filas  = mysqli_fetch_array($res);
	 		 $xest_nicho = $filas[0];
			 $xcost_nicho= $filas[1];
			 
							 
			 
			 if($xest_nicho=='O' || $xest_nicho=='P' || $xest_nicho=='T')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input disabled type=submit style='width:94px; height:87px; background:#BDBDBD' name=xnro_nicho value=".$contador."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
							 
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='D')
			 {
				
				 echo "<td align='center' width='110px' height='90px'><form action=aviso_comprar_nicho_traslado.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$contador.">
							$/. $xcost_nicho 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
							<input type=hidden   name=xid_nicho value=".$xid_nicho.">
							<input type=hidden name=xid_dif value=".$xid_dif.">
						</form>
				</td>"; 
			 }
			$contador++;
			 
			
		}  
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> "; 
	  
	  }
  
  if($xtipo_pab=='D')
  {
	  echo "<table border='10'>";
	$fila=$xtot_fil;
	 for($i=1; $i<=$xtot_fil ; $i++){
		 $cont=$i;
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			$sql   = "SELECT est_nicho, cost_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$cont"; 
	 		 $res   = mysqli_query($xc, $sql );
	 		 $filas  = mysqli_fetch_array($res);
	 		 $xest_nicho = $filas[0];
			 $xcost_nicho= $filas[1];
			 
							 
			 
			 if($xest_nicho=='O' || $xest_nicho=='P' || $xest_nicho=='T')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input disabled type=submit style='width:94px; height:87px; background:#BDBDBD' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
							 
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='D')
			 {
				
				 echo "<td align='center' width='110px' height='90px'><form action=aviso_comprar_nicho_traslado.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont.">
							$/. $xcost_nicho 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
							<input type=hidden   name=xid_nicho value=".$xid_nicho.">
							<input type=hidden name=xid_dif value=".$xid_dif.">
						</form>
				</td>"; 
			 }
			$cont=$cont+$xtot_fil;
			 
			
		}  
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> ";
	  }


  desconectar($xc);
   
  
  ?>
 
  
  
		</div>
	</div>
    
<?php require_once("footer.php") ?>
