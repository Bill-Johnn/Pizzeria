<?php
function crear_A($xtot_fil,$xtot_col) {
     echo "<table border='3'>";
	$cont=1;
	 for($i=1; $i<=$xtot_fil ; $i++){
		 
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
						 
			echo "<td align='center' width='26px' height='24px'><form>
							<input type=submit style='width:26px; height:24px; background:#32CD32' name=xnro_nicho value=".$cont."> 
						</form>
				</td>";  
						
			 
			$cont=$cont+1;
		}  
		
		echo "</tr>";
	}
	echo "</table> <p></p>";

}

function crear_B($xtot_fil,$xtot_col) {
     echo "<table border='3'>";
	$cont=$xtot_col*$xtot_fil;
	 for($i=1; $i<=$xtot_fil; $i++){
			
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
		
			
			echo "<td align='center' width='26px' height='24px'><form>
							<input type=submit style='width:26px; height:24px; background:#32CD32' name=xnro_nicho value=".$cont."> 
						</form>
				</td>";  
			
			$cont=$cont-1;
			 
			
		}  
		echo "</tr>";
	}
	echo "</table> <p></p>";

}

function crear_C($xtot_fil,$xtot_col) {
     echo "<table border='3'>";
	$cont=$xtot_col*$xtot_fil;
	 for($i=1; $i<=$xtot_fil; $i++){
		$contador=$cont-($xtot_col*$i)+1;	
		 echo "<tr>  ";
		 
		for($j=1; $j<=$xtot_col ; $j++){
		
			
			
			echo "<td align='center' width='26px' height='24px'><form >
							<input type=submit style='width:26px; height:24px; background:#32CD32' name=xnro_nicho value=".$contador."> 
						</form>
				</td>";  
			 
			$contador++;
			 
			
		}  
		echo "</tr>";
	}
	echo "</table> <p></p>";

}

function crear_D($xtot_fil,$xtot_col) {
     echo "<table border='3'>";
	
	 for($i=1; $i<=$xtot_fil ; $i++){
		 $cont=$i;
		 echo "<tr>  ";
		for($j=1; $j<=$xtot_col ; $j++){
			
			
				 echo "<td align='center' width='26px' height='24px'><form>
							<input type=submit style='width:26px; height:24px; background:#32CD32' name=xnro_nicho value=".$cont."> 
						</form>
				</td>"; 
			
			$cont=$cont+$xtot_fil;
			 
			
		}  
		echo "</tr>";
	}
	echo "</table> <p></p>";

}


?>