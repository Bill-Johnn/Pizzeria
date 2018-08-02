<?php require_once("header_admin.php") ?>


<div id="body">
		<div class="cem">
        <h8>Registro de Cementerios</h8>
        <hr>

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php

  $xc = conectar();

  $sql = "SELECT * FROM cementerio order by nom_cem";
  $res = mysqli_query($xc, $sql );    
  echo " <div align=center>
  		<table id='newspaper-b'>
         
		  <a href=cementerio_nuevo.php >Nuevo Cementerio</a>
		  </tr>
		  <thead>
         <tr>
              <th scope='col'>Id de Cementerio</th>
              <th scope='col'>Nombre de Cementerio</th>
			  <th scope='col'>Acción</th>
              
          </tr>
		  </thead>
       ";
  while ( $fila = mysqli_fetch_array($res) ) {
     $xid_cem = $fila[0];
	 $xnom_cem = $fila[1];

     echo "<tbody>
	 <tr> 
	 <td>$xid_cem</td>
	 <td>$xnom_cem</td> 
	 
      <td> <a href=cementerio_editar.php?xid_cem=$xid_cem>Editar</a>&nbsp;&nbsp;
     </td> </tr>
	 </tbody>";
  } 
  echo "</table>
  
       <div>";

  desconectar( $xc );
 
?>


<?php require_once("footer.php") ?>