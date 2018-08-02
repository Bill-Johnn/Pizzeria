<?php require_once("header_admin.php") ?>


<div id="body">
		<div class="cem">
        <h8>Registro de Usuarios</h8>
        <hr>

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>

<?php

  $xc = conectar();

  $sql = "SELECT * FROM usuario order by nom_usu";
  $res = mysqli_query($xc, $sql );    
  echo " <div align=center>
  		<table id='newspaper-b'>
         
		  <a href=usuario_nuevo.php >Nuevo Usuario</a>
		  </tr>
		  <thead>
         <tr>
              <th scope='col'>Codigo de Usuario</th>
              <th scope='col'>Clave de Usuario</th>
			  <th scope='col'>Nombre de Usuario</th>
			  <th scope='col'>Pertenece a:</th>
			  <th scope='col'>Acción</th>
              
          </tr>
		  </thead>
       ";
  while ( $fila = mysqli_fetch_array($res) ) {
     $xid_usuario = $fila[0];
	 $xnom_usu = $fila[1];
     $xcla_usu= $fila[3];
	 $xtipo_usu= $fila[4];
	
     echo "<tbody>
	 <tr> 
	 <td>$xid_usuario</td>
	 <td>$xnom_usu</td> 
	 <td>$xcla_usu</td>
	 <td>$xtipo_usu</td>
      <td> <a href=usuario_editar.php?xid_usu=$xid_usuario>Editar</a>&nbsp;&nbsp;
                     <a href=usuario_eliminar.php?xid_usu=$xid_usuario>Eliminar</a>
     </td> </tr>
	 </tbody>";
  } 
  echo "</table>
  
       <div>";

  desconectar( $xc );
 
?>


<?php require_once("footer.php") ?>