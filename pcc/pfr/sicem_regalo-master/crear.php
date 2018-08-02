<?php


function crear_pabellon_nuevo_A($xtot_fil,$xtot_col,$xid_pab) {
     $xc = conectar();
	 echo "<table border='10'>";
	$fila=$xtot_fil;
	$cont=1;
	 for($i=1; $i<=$xtot_fil ; $i++){
		 
		 echo "<tr>  ";
		 
		for($j=1; $j<=$xtot_col ; $j++){
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post> 
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont.">
							<input type=hidden name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			$sql="INSERT into `nicho` (`id_pab`,`nro_nicho`,`nro_fil`,`nro_col`) VALUES ('$xid_pab','$cont','$fila','$j')";
			//echo "$sql + + +";
			//die();
			mysqli_query($xc,$sql );
			
			$cont=$cont+1;
				 
		} 
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> ";
	
}

function crear_pabellon_nuevo_B($xtot_fil,$xtot_col,$xid_pab) {
     $xc = conectar();
	 echo "<table border='10'>";
	 $fila=$xtot_fil;
	 $cont=$xtot_col*$xtot_fil;
	
	 for($i=1; $i<=$xtot_fil ; $i++){
		
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post> 
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont.">
							<input type=hidden name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			$sql="INSERT into `nicho` (`id_pab`,`nro_nicho`,`nro_fil`,`nro_col`) VALUES ('$xid_pab','$cont','$fila','$j')";
			//echo "$sql + + +";
			//die();
			mysqli_query($xc,$sql );
			$cont=$cont-1;			 
			
		}  
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> ";
	
}

function crear_pabellon_nuevo_C($xtot_fil,$xtot_col,$xid_pab) {
     $xc = conectar();
	 echo "<table border='10'>";
	 $fila=$xtot_fil;
	$cont=$xtot_col*$xtot_fil;
	 for($i=1; $i<=$xtot_fil ; $i++){
		$contador=$cont-($xtot_col*$i)+1;
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post> 
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$contador.">
							<input type=hidden name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			$sql="INSERT into `nicho` (`id_pab`,`nro_nicho`,`nro_fil`,`nro_col`) VALUES ('$xid_pab','$contador','$fila','$j')";
			//echo "$sql + + +";
			//die();
			mysqli_query($xc,$sql );
			$contador++;
			 
			
		}  
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> ";
	
}

function crear_pabellon_nuevo_D($xtot_fil,$xtot_col,$xid_pab) {
     $xc = conectar();
	 echo "<table border='10'>";
	$fila=$xtot_fil;
	 for($i=1; $i<=$xtot_fil ; $i++){
		 $cont=$i;
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post> 
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont.">
							<input type=hidden name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			$sql="INSERT into `nicho` (`id_pab`,`nro_nicho`,`nro_fil`,`nro_col`) VALUES ('$xid_pab','$cont','$fila','$j')";
			//echo "$sql + + +";
			//die();
			mysqli_query($xc,$sql );
			$cont=$cont+$xtot_fil;
			 
			
		}  
		echo "</tr>";
		$fila=$fila-1;
	}
	echo "</table> ";
	
}

function crear_pabellon_existente_A($xtot_fil,$xtot_col,$xid_pab) {
	$xc = conectar();
     echo "<table border='10'>";
	$cont=1;
	 for($i=1; $i<=$xtot_fil ; $i++){
		 
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			$sql   = "SELECT est_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$cont"; 
	 		 $res   = mysqli_query($xc,$sql );
	 		 $fila  = mysqli_fetch_array($res);
	 		 $xest_nicho = $fila[0];
			 if($xest_nicho=='D')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='O')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#B22222' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='P')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#FF8000' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
			 elseif($xest_nicho=='T')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#8A0868' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
		
			
			 
			$cont=$cont+1;
		}  
		
		echo "</tr>";
	}
	echo "</table> <p></p>";

}

function crear_pabellon_existente_B($xtot_fil,$xtot_col,$xid_pab) {
	$xc = conectar();
     echo "<table border='10'>";
	$cont=$xtot_col*$xtot_fil;
	 for($i=1; $i<=$xtot_fil; $i++){
			
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
						
			$sql   = "SELECT est_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$cont"; 
	 		 $res   = mysqli_query($xc,$sql );
	 		 $fila  = mysqli_fetch_array($res);
	 		 $xest_nicho = $fila[0];
			 if($xest_nicho=='D')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='O')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#B22222' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='P')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#FF8000' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
			 elseif($xest_nicho=='T')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#8A0868' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }	
		
			$cont=$cont-1;
			 
			
		}  
		echo "</tr>";
	}
	echo "</table> <p></p>";

}

function crear_pabellon_existente_C($xtot_fil,$xtot_col,$xid_pab) {
	$xc = conectar();
     echo "<table border='10'>";
	$cont=$xtot_col*$xtot_fil;
	 for($i=1; $i<=$xtot_fil; $i++){
		$contador=$cont-($xtot_col*$i)+1;	
		 echo "<tr>  ";
		 
		for($j=1; $j<=$xtot_col ; $j++){
		
			$sql   = "SELECT est_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$contador"; 
	 		 $res   = mysqli_query($xc,$sql );
	 		 $fila  = mysqli_fetch_array($res);
	 		 $xest_nicho = $fila[0];
			 if($xest_nicho=='D')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$contador."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='O')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#B22222' name=xnro_nicho value=".$contador."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='P')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#FF8000' name=xnro_nicho value=".$contador."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
			 elseif($xest_nicho=='T')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#8A0868' name=xnro_nicho value=".$contador."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
			
			$contador++;
			 
			
		}  
		echo "</tr>";
	}
	echo "</table> <p></p>";

}

function crear_pabellon_existente_D($xtot_fil,$xtot_col,$xid_pab) {
	$xc = conectar();
     echo "<table border='10'>";
	
	 for($i=1; $i<=$xtot_fil ; $i++){
		 $cont=$i;
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			$sql   = "SELECT est_nicho FROM nicho WHERE id_pab='$xid_pab' AND nro_nicho=$cont"; 
	 		 $res   = mysqli_query($xc,$sql );
	 		 $fila  = mysqli_fetch_array($res);
	 		 $xest_nicho = $fila[0];
			 
			 if($xest_nicho=='D')
			 {
			
			echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#32CD32' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='O')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#B22222' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>";  
			 }
			 elseif($xest_nicho=='P')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#FF8000' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
			 elseif($xest_nicho=='T')
			 {
				 echo "<td align='center' width='110px' height='90px'><form action=consulta_nicho.php method=post>
							<input type=submit style='width:94px; height:87px; background:#8A0868' name=xnro_nicho value=".$cont."> 
							<input type=hidden   name=xid_pab value=".$xid_pab.">
						</form>
				</td>"; 
			 }
		
			$cont=$cont+$xtot_fil;
			 
			
		}  
		echo "</tr>";
	}
	echo "</table> <p></p>";

}


?>