<?php require_once("header.php") ?>

<?php

$xc    = conectar(); 
	$xid_nicho=leerParam("xid_nicho","");
	
 $sql = "UPDATE nicho SET est_nicho='D' WHERE id_nicho=$xid_nicho";
  $res = mysqli_query($xc, $sql );
  

  
  desconectar( $xc );
 ?>
 <div id="body">
		<div class="cem">
			<h8>PROCESO EXITOSO</h8>
            
                     
                        
    </div></div>
 


<?php require_once("footer.php") ?>