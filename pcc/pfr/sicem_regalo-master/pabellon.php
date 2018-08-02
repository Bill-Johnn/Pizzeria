<?php require_once("header_admin.php") ?>


<div id="body">
		<div class="cem">
        <h8>Registro de Pabellones</h8>
        <hr>

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php

	$xid_cem  = leerParam("xid_cem","");
 
  $xc = conectar();

  $sql = "SELECT * FROM pabellon WHERE id_cem=$xid_cem order by nom_pab";
  $res = mysqli_query($xc, $sql );    
  echo " <div align=center>
  		<table id='newspaper-b'>
         
		  <a href=pabellon_nuevo.php?xid_cem=$xid_cem>Nuevo Pabellon</a>
		  </tr>
		  <thead>
         <tr>
              <th scope='col'>Id Pabellon</th>
              <th scope='col'>Nombre de Pabellon</th>
			  <th scope='col'>Nro de Filas</th>
			  <th scope='col'>Nro de Columnas</th>
			  <th scope='col'>Tipo de Numeración</th>
			  <th scope='col'>Acción</th>
              
          </tr>
		  </thead>
       ";
  while ( $fila = mysqli_fetch_array($res) ) {
     $xid_pab = $fila[0];
	 $xnom_pab = $fila[1];
     $xtot_fil= $fila[3];
	 $xtot_col= $fila[4];
	 $xtipo_numer= $fila[5];
	
     echo "<tbody>
	 <tr> 
	 <td>$xid_pab</td>
	 <td>$xnom_pab</td> 
	 <td>$xtot_fil</td>
	 <td>$xtot_col</td>
	 <td>$xtipo_numer</td>
      <td> <a href=pabellon_editar.php?xid_pab=$xid_pab>Editar</a>&nbsp;&nbsp;
     </td> </tr>
	 </tbody>";
  } 
  echo "</table>
  
       <div>";

  desconectar( $xc );
 
?>


<?php require_once("footer.php") ?>